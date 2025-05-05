<?php

namespace app\controllers;

use core\App;
use core\Message;
use core\Utils;


class PanelZalogowanegoCtrl {
    
    public function action_panelZalogowanego() {
        
        $variable = 123;
        
        App::getMessages()->addMessage(new Message("Hello world message", Message::INFO));
        Utils::addInfoMessage("Or even easier message :-)");
        
        App::getSmarty()->assign("value",$variable);   
        App::getSmarty()->display("PanelAutor.tpl");
        
    }
    
}
