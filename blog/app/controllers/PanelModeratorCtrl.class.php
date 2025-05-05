<?php

namespace app\controllers;

use core\App;
use core\Message;
use core\Utils;
use core\RoleUtils;
use core\SessionUtils;
use core\ParamUtils;
use app\forms\ModeratorForm;


class PanelModeratorCtrl {
    
    private $form;
    
    public function __construct() {
    //stworzenie potrzebnych obiektów
    $this->form = new ModeratorForm();
    }
    
    public function action_panelModerator() {
        $this->form->parametrWyszukiwania = ParamUtils::getFromRequest('tytul');
        
        try {
            $this->records = App::getDB()->select("komentarze", ["[>]artykuly" => ["artykuly_id" => "id"]],  ["data_dodania", "data_modyfikacji", "artykuly.tytul", "tresc_komentarza", "komentarze.aktywny", "komentarze.id", "komentarze.użytkownicy_id"], ["ORDER" => ["data_dodania"=>"DESC"], "tytul[~]" => '%' . $this->form->parametrWyszukiwania . '%']);
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }
        
        $this->ileKom = App::getDB()->count("komentarze", ["[>]artykuly" => ["artykuly_id" => "id"]], "*", ["tytul[~]" => '%' . $this->form->parametrWyszukiwania . '%']); //SessionUtils::load("login",true)
              
    
        App::getSmarty()->assign('form', $this->form); // dane formularza (wyszukiwania w tym wypadku)
        App::getSmarty()->assign('listaKom', $this->records);  // lista rekordów z bazy danych
        App::getSmarty()->assign('ileKom', $this->ileKom);
        App::getSmarty()->display("PanelModerator.tpl");
        
    }
    
       public function action_panelModeratorFragment() {
        $this->form->parametrWyszukiwania = ParamUtils::getFromRequest('tytul');
        
        try {
            $this->records = App::getDB()->select("komentarze", ["[>]artykuly" => ["artykuly_id" => "id"]],  ["data_dodania", "data_modyfikacji", "artykuly.tytul", "tresc_komentarza", "komentarze.aktywny", "komentarze.id", "komentarze.użytkownicy_id"], ["ORDER" => ["data_dodania"=>"DESC"], "tytul[~]" => '%' . $this->form->parametrWyszukiwania . '%']);
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }
        
        $this->ileKom = App::getDB()->count("komentarze", ["[>]artykuly" => ["artykuly_id" => "id"]], "*", ["tytul[~]" => '%' . $this->form->parametrWyszukiwania . '%']); //SessionUtils::load("login",true)
              
    
        App::getSmarty()->assign('form', $this->form); // dane formularza (wyszukiwania w tym wypadku)
        App::getSmarty()->assign('listaKom', $this->records);  // lista rekordów z bazy danych
        App::getSmarty()->assign('ileKom', $this->ileKom);
        App::getSmarty()->display("PanelModerator_fragment.tpl");
        
    }
    
    public function action_panelModeratorZmiana() {
        
        $status;
        
        $idKomen = intval(ParamUtils::getFromCleanURL(1, false, 'Błędne wywołanie aplikacji'));
        
       $opcja = 'kom' . $idKomen;      
        if(isset($_POST[ $opcja ])) 
        {
            if($_POST[ $opcja ] == "aktywuj") $status=1;
            if($_POST[ $opcja ] == "odrzuc") $status=0;
        }
        
        $data = date("d.m.Y, H:i:s");
        $info = "Zaktualizowano widoczność komentarzy, dziękujemy! \n";
        Utils:: addInfoMessage($info);
        Utils:: addInfoMessage($data);
       
        
        
        App::getDB()->update("komentarze", ["aktywny" => $status], [
                    "id" => $idKomen
                ]);
        
       $this->action_panelModerator();
    
    }
    
}
