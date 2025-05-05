<?php

namespace app\controllers;

use core\App;
use core\Message;
use core\Utils;
use core\RoleUtils;
use core\SessionUtils;
use core\ParamUtils;
use app\forms\PelnaStronaForm;


class PelnaStronaCtrl {
    
    private $form;
    private $records; 
    private $obrazki;
    private $komentarze;
    
    public function __construct() {
    //stworzenie potrzebnych obiektów
    $this->form = new PelnaStronaForm();
    }
    
    public function action_pelnaStrona() {
        
        //należy przygotować rekordy z artykułami widocznymi na stronie głownej i przesłać do blog tpl
        
        $idWpis = intval(ParamUtils::getFromCleanURL(1, false, 'Błędne wywołanie aplikacji'));
        try {
            $this->records = App::getDB()->select("artykuly", ["[>]użytkownicy" => ["użytkownicy_id" => "id"]],  ["artykuly.id(id)", "data_publikacji", "tytul", "tresc_artykulu", "artykuly.aktywny", "czy_komentarze_dozwolone", "użytkownicy.id(uz_id)", "użytkownicy.widoczna_nazwa"], ["ORDER" => ["artykuly.data_publikacji"=>"DESC"], "artykuly.id" => $idWpis]);
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }
        
        try {
            $this->obrazki = App::getDB()->select("artykuly", ["[>]asoc_artykul_kategoria" => ["id" => "artykuly_id"]],  ["artykuly.id(id)", "kategorie_artykuly_id"], ["ORDER" => ["artykuly.data_publikacji"=>"DESC"], "artykuly.aktywny" => "1", "artykuly.id" => $idWpis]);
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }
        
        try {
            $this->komentarze = App::getDB()->select("komentarze", ["[>]użytkownicy" => ["użytkownicy_id" => "id"]],  ["data_dodania", "tresc_komentarza", "widoczna_nazwa"], ["ORDER" => ["data_dodania"=>"DESC"], "komentarze.aktywny" => "1", "artykuly_id" => $idWpis]);
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }
        
        App::getSmarty()->assign("kat",$this->obrazki);  
        App::getSmarty()->assign("komentarze",$this->komentarze); 
        App::getSmarty()->assign("wpis",$this->records);   
        App::getSmarty()->display("PelnaStrona.tpl");
        
    }
    
}
