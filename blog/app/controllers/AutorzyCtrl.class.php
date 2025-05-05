<?php

namespace app\controllers;

use core\App;
use core\Message;
use core\Utils;


class AutorzyCtrl {
    
    public function action_autorzy() {
        
        App::getSmarty()->display("Autorzy.tpl");
        
    }
    
}
