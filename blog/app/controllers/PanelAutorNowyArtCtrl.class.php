<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\RoleUtils;
use core\SessionUtils;
use core\ParamUtils;
use app\forms\AutorForm;


class PanelAutorNowyArtCtrl {
    
    private $form;
    private $records; //rekordy pobrane z bazy danych
    
    public function __construct() {
    //stworzenie potrzebnych obiektów
    $this->form = new AutorForm();
    }
    
public function validate() {
        $this->form->tytul = ParamUtils::getFromRequest('tytul');
        $this->form->tresc = ParamUtils::getFromRequest('tresc');
        $this->form->wybranaKategoria = ParamUtils::getFromRequest('wybranaKategoria');
        //$this->form->komentarze = ParamUtils::getFromRequest('komentarze');
        //$this->form->artykulWidoczny = ParamUtils::getFromRequest('artykulWidoczny');

        //nie ma sensu walidować dalej, gdy brak parametrów
        if (!isset($this->form->tytul) || !isset($this->form->tresc))
            return false;

        // sprawdzenie, czy potrzebne wartości zostały przekazane
        if (empty($this->form->tytul)) {
            Utils::addErrorMessage('Nie podano tytułu!');
        }
        if (empty($this->form->tresc)) {
            Utils::addErrorMessage('Nie podano żadnej treści!');
        }
        
        if (empty($this->form->wybranaKategoria)) {
            Utils::addErrorMessage('Nie podano kategorii!');
        }

         //nie ma sensu walidować dalej, gdy brak wartości
        if (App::getMessages()->isError()){
        return false;}
        else return true;
    }
    
    public function generateView() {
    App::getSmarty()->assign('form', $this->form); // dane formularza do widoku
    App::getSmarty()->display('PanelAutorNowyArt.tpl');
     }
    
    
    public function action_nowyArtykul() {
        $this->generateView(); 
    }
    
    
    public function action_nowaKategoria() {
         
        $this->generateView();
        
    }
    
    public function action_zapiszArtykul() {
        
        $data = date("Y-m-d");
        if(isset($_POST['artykulWidoczny'])) $this->form->artykulWidoczny=1; else $this->form->artykulWidoczny=0;
        if(isset($_POST['komentarze'])) $this->form->komentarze=1; else $this->form->komentarze=0;
        
        $prolog_tresc =  $this->form->tresc;
        ///w ten sposób odseparowany będzie wstęp (jeśli podano) od głównej treści
         
        if ($this->validate()) {
            App::getDB()->insert("artykuly",[
            "tytul" => $this->form->tytul,
            "data_publikacji" => $data,
            "tresc_artykulu" => $this->form->tresc,
            "aktywny" => $this->form->artykulWidoczny,
            "czy_komentarze_dozwolone" => $this->form->komentarze,
            "użytkownicy_id" => SessionUtils::load("id", true),
           ]);
            
            $najnowszeID = App::getDB()->id();
            
            App::getDB()->insert("asoc_artykul_kategoria",[
            "kiedy_dodano" => $data,
            "kategorie_artykuly_id" => $this->form->wybranaKategoria,
            "artykuly_id" => $najnowszeID
           ]);
            
            Utils:: addInfoMessage('Poprawnie dodano artykul do bazy');
            App::getRouter()->redirectTo("panelAutor");
            
        } else {
            $this->generateView();
        }
        
    }
    
}
