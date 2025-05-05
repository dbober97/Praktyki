<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\RoleUtils;
use core\SessionUtils;
use core\ParamUtils;
use app\forms\CzytelnikNowyArtForm;


class PanelCzytelnikNowyKomCtrl {
    
    private $form;
    
    public function __construct() {
    //stworzenie potrzebnych obiektów
    $this->form = new CzytelnikNowyArtForm();
    }
    
public function validate() {
        $this->form->tresc = ParamUtils::getFromRequest('tresc');

        //nie ma sensu walidować dalej, gdy brak parametrów
        if (empty($this->form->tresc)) {
            Utils::addErrorMessage('Nie podano żadnej treści!');
        }

         //nie ma sensu walidować dalej, gdy brak wartości
        if (App::getMessages()->isError()){
        return false;}
        else return true;
    }
    
    public function validateDodajKom() {
        $this->form->idArt = intval(ParamUtils::getFromCleanURL(1, true, 'Błędne wywołanie aplikacji'));
        return !App::getMessages()->isError();
    }
    
    public function generateView() {
    App::getSmarty()->assign('form2', $this->form); // dane formularza do widoku
    App::getSmarty()->display('PanelCzytelnikNowyKom.tpl');
     }
    
    
    public function action_nowyKomentarz() {
        $this->validateDodajKom();
        $this->generateView();
    }
    
    
    public function action_opublikujKomentarz() {
        
        $data = date("Y-m-d");
         
        if ($this->validate() && $this->validateDodajKom()) {
            App::getDB()->insert("komentarze",[
            "data_dodania" => $data,
            "tresc_komentarza" => $this->form->tresc,
            "artykuly_id" => $this->form->idArt,
            "użytkownicy_id" => SessionUtils::load("id", true),
           ]);
            
            $najnowszeID = App::getDB()->id();
            
            Utils:: addInfoMessage('Poprawnie dodano komentarz do bazy');
            //SessionUtils::store('idKom', $this->najnowszeID);
            App::getRouter()->redirectTo("panelCzytelnik");
            
        } else {
            $this->generateView();
        }
        
    }
    
}
