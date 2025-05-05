<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\RoleUtils;
use core\SessionUtils;
use core\ParamUtils;
use app\forms\AutorForm;


class PanelAutorCtrl {
    
    private $form;
    private $records; //rekordy pobrane z bazy danych
    private $ileArt; //zlicza ilosc art w bazie autora
    
    public function __construct() {
    //stworzenie potrzebnych obiektów
    $this->form = new AutorForm();
    }
    
    public function validate() {
        $this->form->parametrWyszukiwania = ParamUtils::getFromRequest('tytul');
        return !App::getMessages()->isError();
    }
    
    public function generateView() {
    App::getSmarty()->assign('form', $this->form); // dane formularza do widoku
    App::getSmarty()->display('PanelAutor.tpl');
     }
    
    public function action_panelAutor() {

        $this->validate();

        // 2. Przygotowanie mapy z parametrami wyszukiwania (nazwa_kolumny => wartość)
        //$search_params = []; //przygotowanie pustej struktury (aby była dostępna nawet gdy nie będzie zawierała wierszy)
        //if (isset($this->form->parametrWyszukiwania) && strlen($this->form->parametrWyszukiwania) > 0) {
           // $search_params['parametrWyszukiwania[~]'] = $this->form->parametrWyszukiwania . '%'; // dodanie symbolu % zastępuje dowolny ciąg znaków na końcu
        //}

        // 3. Pobranie listy rekordów z bazy danych
        // W tym wypadku zawsze wyświetlamy listę osób bez względu na to, czy dane wprowadzone w formularzu wyszukiwania są poprawne.
        // Dlatego pobranie nie jest uwarunkowane poprawnością walidacji (jak miało to miejsce w kalkulatorze)
        //przygotowanie frazy where na wypadek większej liczby parametrów
        //$num_params = sizeof($search_params);
        //if ($num_params > 1) {
        //    $where = ["AND" => &$search_params];
       // } else {
        //    $where = &$search_params;
        //}
        //dodanie frazy sortującej po nazwisku
       // $where ["ORDER"] = "tytul";
        //wykonanie zapytania

        try {
            $this->records = App::getDB()->select("artykuly", "*", ["użytkownicy_id" => SessionUtils::load("id", true), "ORDER" => ["data_publikacji"=>"DESC"], "tytul[~]" => '%' . $this->form->parametrWyszukiwania . '%']);
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }
        
        $this->ileArt = App::getDB()->count("artykuly", "*", ["użytkownicy_id" => SessionUtils::load("id",true), "tytul[~]" => '%' . $this->form->parametrWyszukiwania . '%']); //SessionUtils::load("login",true)
              


        // 4. wygeneruj widok
        App::getSmarty()->assign('form', $this->form); // dane formularza (wyszukiwania w tym wypadku)
        App::getSmarty()->assign('listaArt', $this->records);  // lista rekordów z bazy danych
        App::getSmarty()->assign('ileArt', $this->ileArt);
        App::getSmarty()->display('PanelAutor.tpl');
    }
    
    
    public function action_wyszukajArtykul() {
         
        //App::getSmarty()->display("PanelAutor.tpl");
        
    }
    
}
