<?php

namespace app\controllers;

use core\App;
use core\Message;
use core\Utils;
use core\RoleUtils;
use core\SessionUtils;
use core\ParamUtils;
use app\forms\GlownaForm;


class BlogCtrl {
    
    private $form;
    private $records; 
    private $obrazki;
    private $ileArt;
    
    public function __construct() {
    //stworzenie potrzebnych obiektów
    $this->form = new GlownaForm();
    }
    
    public function validate() {
    
    $this->form->parametrWyszukiwania = ParamUtils::getFromRequest('tytul');
    $this->form->page = ParamUtils::getFromRequest('page');
    if(isset($this->form->page) == 0 or $this->form->page == "") $this->form->page = 1;
    else
    {
        if(is_numeric($this->form->page))
        {
            $this->form->page = intval($this->form->page);
            if($this->form->page <= 0) $this->form->page = 1;
        }
        else 
        {
            $this->form->page = 1;    
        }
    }
    
    return !App::getMessages()->isError();
    }


    
    public function action_blog() {
        
        $this->validate();
        
        //należy przygotować rekordy z artykułami widocznymi na stronie głownej i przesłać do glowna tpl
        $this->ileArt = App::getDB()->count("artykuly", "*", [ "artykuly.aktywny" => "1", "artykuly.tytul[~]" => '%' . $this->form->parametrWyszukiwania . '%', ]);
        $stronki = ceil($this->ileArt/$this->form->ileArtStrona);
        if($this->form->page > $stronki) $this->form->page = $stronki;
        
        try {
            $this->records = App::getDB()->select("artykuly", ["[>]użytkownicy" => ["użytkownicy_id" => "id"]],  ["artykuly.id(id)", "data_publikacji", "tytul", "tresc_artykulu", "artykuly.aktywny", "czy_komentarze_dozwolone", "użytkownicy.id(uz_id)", "użytkownicy.widoczna_nazwa"], ["ORDER" => ["artykuly.data_publikacji"=>"DESC"], "artykuly.aktywny" => "1", "artykuly.tytul[~]" => '%' . $this->form->parametrWyszukiwania . '%', "LIMIT" => [($this->form->page-1) * $this->form->ileArtStrona ,$this->form->ileArtStrona]]);
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }
        
                    try {
            $this->obrazki = App::getDB()->select("artykuly", ["[>]asoc_artykul_kategoria" => ["id" => "artykuly_id"]],  ["artykuly.id(id)", "kategorie_artykuly_id"], ["ORDER" => ["artykuly.data_publikacji"=>"DESC"], "artykuly.aktywny" => "1"]);
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }
        
         
        App::getSmarty()->assign('form', $this->form); // dane formularza (wyszukiwania w tym wypadku)
        App::getSmarty()->assign("sumaArt",$this->ileArt);
        App::getSmarty()->assign("ileStron",$stronki);
        App::getSmarty()->assign("page",$this->form->page);
        App::getSmarty()->assign("kat",$this->obrazki);
        App::getSmarty()->assign("wpis",$this->records);   
        App::getSmarty()->display("Blog.tpl");
    
}

    public function action_blogFragment() {
        
        $this->validate();
        
        //należy przygotować rekordy z artykułami widocznymi na stronie głownej i przesłać do glowna tpl
        $this->ileArt = App::getDB()->count("artykuly", "*", [ "artykuly.aktywny" => "1", "artykuly.tytul[~]" => '%' . $this->form->parametrWyszukiwania . '%', ]);
        $stronki = ceil($this->ileArt/$this->form->ileArtStrona);
        if($this->form->page > $stronki) $this->form->page = $stronki;
        
        try {
            $this->records = App::getDB()->select("artykuly", ["[>]użytkownicy" => ["użytkownicy_id" => "id"]],  ["artykuly.id(id)", "data_publikacji", "tytul", "tresc_artykulu", "artykuly.aktywny", "czy_komentarze_dozwolone", "użytkownicy.id(uz_id)", "użytkownicy.widoczna_nazwa"], ["ORDER" => ["artykuly.data_publikacji"=>"DESC"], "artykuly.aktywny" => "1", "artykuly.tytul[~]" => '%' . $this->form->parametrWyszukiwania . '%', "LIMIT" => [($this->form->page-1) * $this->form->ileArtStrona ,$this->form->ileArtStrona]]);
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }
        
                    try {
            $this->obrazki = App::getDB()->select("artykuly", ["[>]asoc_artykul_kategoria" => ["id" => "artykuly_id"]],  ["artykuly.id(id)", "kategorie_artykuly_id"], ["ORDER" => ["artykuly.data_publikacji"=>"DESC"], "artykuly.aktywny" => "1"]);
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }
        
         
        App::getSmarty()->assign('form', $this->form); // dane formularza (wyszukiwania w tym wypadku)
        App::getSmarty()->assign("sumaArt",$this->ileArt);
        App::getSmarty()->assign("ileStron",$stronki);
        App::getSmarty()->assign("page",$this->form->page);
        App::getSmarty()->assign("kat",$this->obrazki);
        App::getSmarty()->assign("wpis",$this->records);   
        App::getSmarty()->display("Blog_fragment.tpl");
    
}

  
        }
