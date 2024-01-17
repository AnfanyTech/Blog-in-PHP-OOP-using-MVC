<?php 
namespace App\Helpers;

class Redirection {
     
    public function redirect($url){
        return header($url);
    }

    
}
