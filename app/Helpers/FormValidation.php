<?php 
namespace App\Helpers;

class FormValidation {
     
    private $errors = [];

    
    public function validatUsername($username){
        if (!preg_match("#[a-zA-Z0-9_-]{3,}#", $username)) {
            $this->errors['username'] = "Votre nom d'utilisateur doit etre d'au moins 3 caractères alphanumériques.";
        }
    }

    public function validatEmail($email){
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->errors['email'] = "Email manquant ou invalide.";
         }
    }

    public function confirmPassord($password, $passwordConfirm){
        if(! preg_match("#[a-zA-Z0-9_&@\#-]{5,}#", $password) || $password !== $passwordConfirm){
            $this->errors['password'] = "Votre mot de passe doit comporter au moins 5 caractères et etre confirmé.";
        }
    }
    
    public function setErrors($key, $message){
       $this->errors[$key] = $message;
    }
    

    public function getErrors(){
        return $this->errors;
    }

    public function generateToken(){
        $token = substr(str_shuffle("azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN0123456789"), 1, 50);
        return $token;
    }
}
