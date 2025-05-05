<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\RoleUtils;
use core\SessionUtils;
use core\ParamUtils;
use app\forms\LoginForm;


class LoginCtrl {
    
    private $form;
    
    public function __construct() {
    //stworzenie potrzebnych obiektów
    $this->form = new LoginForm();
    }
    
        public function validate() {
        $this->form->login = ParamUtils::getFromRequest('login');
        $this->form->pass = ParamUtils::getFromRequest('pass');

        //nie ma sensu walidować dalej, gdy brak parametrów
        if (!isset($this->form->login))
            return false;

        // sprawdzenie, czy potrzebne wartości zostały przekazane
        if (empty($this->form->login)) {
            Utils::addErrorMessage('Nie podano loginu');
        }
        if (empty($this->form->pass)) {
            Utils::addErrorMessage('Nie podano hasła');
        }

        //nie ma sensu walidować dalej, gdy brak wartości
        if (App::getMessages()->isError())
            return false;
        // sprawdzenie, czy dane logowania poprawne
        // (takie informacje najczęściej przechowuje się w bazie danych)
        $records = App::getDB()->select("użytkownicy", "*",[ "login" => $this->form->login]);
        $ile = App::getDB()->count("użytkownicy",[ "login" => $this->form->login]);
        if($ile>=1) {
            $hash = $records[0]["haslo"];
            if(password_verify($this->form->pass, $hash)) $id = $records[0]["id"];
        }
        else
            $id=0;
        
        $this->form->id = $id;

        if($id>=1){
            //sprawdzenie, czy użytkownik ma aktywne konto:
            $aktywne = App::getDB()->count("użytkownicy", ["AND" => [
                "id" => $id,
                "data_usuniecia_konta" => null
                ]]);
            
            if($aktywne>0)
            {
                $records = App::getDB()->select("asoc_rola_user", ["[>]rola" => ["rola_id" => "id"]], "*",["użytkownicy_id" => $id,]);
                foreach($records as $wiersz){
                   $rolaNazwa = $wiersz["nazwa"];
                   $idRola = $wiersz["rola_id"];

                   if(!$wiersz["kiedy_odebrano"])
                   {
                       RoleUtils::addRole($rolaNazwa);
                   }
             
                }
            }
            else
            {
                Utils::addErrorMessage('Konto zostało zablokowane!');
            }

        } else {
            Utils::addErrorMessage('Niepoprawny login lub hasło');
        }

        return !App::getMessages()->isError();
    }

    public function action_loginShow() {
        $this->generateView();
    }


    public function generateView() {
        App::getSmarty()->assign('form', $this->form); // dane formularza do widoku
        App::getSmarty()->display('Logowanie.tpl');
    }
    
    public function action_logowanie() {
                      
        if ($this->validate()) {
            //zalogowany => przekieruj na główną akcję (z przekazaniem messages przez sesję)
            Utils::addErrorMessage('Poprawnie zalogowano do systemu');
            SessionUtils::store('login', $this->form->login);
            SessionUtils::store('id', $this->form->id);
            App::getRouter()->redirectTo("glowna");
        } else {
            //niezalogowany => pozostań na stronie logowania
            $this->generateView();
        }
    }
    
        public function action_rejestracja() {
            
            $this->form->login = ParamUtils::getFromRequest('login');
            $this->form->pass1 = ParamUtils::getFromRequest('pass1');
            $this->form->pass2 = ParamUtils::getFromRequest('pass2');
            $this->form->email = ParamUtils::getFromRequest('email');
            $this->form->nazwa = ParamUtils::getFromRequest('nazwa');

            //nie ma sensu walidować dalej, gdy brak parametrów
            if (!isset($this->form->login))
                return false;

            // sprawdzenie, czy potrzebne wartości zostały przekazane
            if (empty($this->form->login)) {
                Utils::addErrorMessage('Nie podano loginu!');
            }
            if (empty($this->form->pass1)) {
                Utils::addErrorMessage('Nie podano hasła!');
            }
            if (empty($this->form->pass2)) {
                Utils::addErrorMessage('Nie potwierdzono hasła!');
            }            
             if (empty($this->form->email)) {
                Utils::addErrorMessage('Nie podano maila!');
            }
              if (empty($this->form->nazwa)) {
                Utils::addErrorMessage('Nie podano nazwy!');
            }            

            //nie ma sensu walidować dalej, gdy brak wartości
            if (App::getMessages()->isError()){$this->generateView();
            return false;}

            // sprawdzenie, czy dane logowania poprawne
            if($this->form->pass1 != $this->form->pass2) {Utils::addErrorMessage('Hasła się różnią!');}
            
            $sprawdz = '/^[a-zA-Z0-9.\-_]+@[a-zA-Z0-9\-.]+\.[a-zA-Z]{2,20}$/';
            if(!preg_match($sprawdz, $this->form->email)) Utils::addErrorMessage('Adres e-mail nieprawidłowy!');

            $record = App::getDB()->select("użytkownicy", ["id"],["login" => $this->form->login]);
            $istnienieLoginu = $record[0]["id"];
            if(isset($istnienieLoginu)) {Utils::addErrorMessage('Podany login już istnieje, wypróbuj inny!');}
            
            if (App::getMessages()->isError()){$this->generateView();
            return false;           }
            
            $data = date("Y-m-d");
            
            $passwordPrzed = $this->form->pass1;
            $hashed_password = password_hash($passwordPrzed, PASSWORD_DEFAULT);

            App::getDB()->insert("użytkownicy",[
            "login" => $this->form->login,
            "haslo" => $hashed_password,
            "email" => $this->form->email,
            "widoczna_nazwa" => $this->form->nazwa,
            "data_utworzenia_konta" => $data,
            "aktywny" => 1,
           ]);
            
            $najnowszeID = App::getDB()->id();
            
            App::getDB()->insert("asoc_rola_user",[
            "kiedy_nadano" => $data,
            "rola_id" => 3,
            "użytkownicy_id" => $najnowszeID
           ]);
            
            Utils:: addInfoMessage('Zostałeś zarejestrowany! Możesz się zalogować.');
            $this->generateView();
    }
    
    public function action_logout(){

    //unieważnij sesję
    session_destroy();
    // i przekieruj do wybranej akcji (tej domyślnej po wylogowaniu)
    App::getRouter()->redirectTo("blog");

}
    
}


