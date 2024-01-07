<?php 
namespace Database;

interface DatabaseInterface{

    // Get Connexion object
    public function getConnexionObject();

    //Query Data from database without parameters

    public function query($sql, $class_name = null);

    //fetch Data from database with parameters

    public function prepare($sql, ...$params);


}