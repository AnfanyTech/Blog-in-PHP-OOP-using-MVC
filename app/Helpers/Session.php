<?php 
namespace App\Helpers;

class Session {
     
   public function __construct()
   {
     if ( session_status() === PHP_SESSION_NONE ) {
          session_start();
     }
   }

   public function setSession($key, $message){
        $_SESSION[$key] = $message;
   }

   public function getSession($key){
        return $_SESSION[$key];
   }

   public function verifySessionExist($key){
         return isset($_SESSION[$key]) && ! is_null($_SESSION[$key]);
   }

   public function unsetSession($key, $url){
     unset($_SESSION[$key]);
     header("Location:".$url);
     exit();
   }

   

   
}
