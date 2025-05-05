<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\RoleUtils;
use core\SessionUtils;
use core\ParamUtils;
use app\forms\CzytelnikForm;
use core\Message;


class PanelCzytelnikCtrl {
 
    private $form;
    private $records; //rekordy pobrane z bazy danych
    private $ileKom; //zlicza ilosc art w bazie autora
    private $records_art; //rekordy pobrane z bazy danych
    private $ileArt;
    
    public function __construct() {
    //stworzenie potrzebnych obiektów
    $this->form = new CzytelnikForm();
    }
    
    public function validate() {
        $this->form->parametrWyszukiwaniaArt = ParamUtils::getFromRequest('tytulArt');
        $this->form->parametrWyszukiwania = ParamUtils::getFromRequest('tytul');
        //return !App::getMessages()->isError();
    }
    
    
    public function action_panelCzytelnik() {
        
        $this->validate();
        //"tytul[~]" => '%' . $this->form->parametrWyszukiwania . '%'
        try {
            $this->records = App::getDB()->select("komentarze", ["[>]artykuly" => ["artykuly_id" => "id"]],  ["data_dodania", "data_modyfikacji", "artykuly.tytul", "tresc_komentarza", "komentarze.aktywny"], ["komentarze.użytkownicy_id" => SessionUtils::load("id", true), "ORDER" => ["data_dodania"=>"DESC"]]);
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }
        
        $this->ileKom = App::getDB()->count("komentarze", "*", ["użytkownicy_id" => SessionUtils::load("id",true)]); //SessionUtils::load("login",true)
              

        
        
        try {
            $this->records_art = App::getDB()->select("artykuly", "*", ["ORDER" => ["data_publikacji"=>"DESC"], "tytul[~]" => '%' . $this->form->parametrWyszukiwaniaArt . '%', "czy_komentarze_dozwolone" => '1', "aktywny" => "1"] );
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }
        
        $this->ileArt = App::getDB()->count("artykuly", "*", ["tytul[~]" => '%' . $this->form->parametrWyszukiwaniaArt . '%', "czy_komentarze_dozwolone" => '1', "aktywny" => "1"]); //SessionUtils::load("login",true)
              
        
        

        // 4. wygeneruj widok
        App::getSmarty()->assign('form', $this->form); // dane formularza (wyszukiwania w tym wypadku)
        App::getSmarty()->assign('listaKom', $this->records);  // lista rekordów z bazy danych
        App::getSmarty()->assign('ileKom', $this->ileKom);
        App::getSmarty()->assign('listaArt', $this->records_art);  // lista rekordów z bazy danych
        App::getSmarty()->assign('ileArt', $this->ileArt);
        App::getSmarty()->display('PanelCzytelnik.tpl');
        
    }
    
}
