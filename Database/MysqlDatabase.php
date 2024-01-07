<?php 
namespace Database;

use PDO;

abstract class MysqlDatabase implements DatabaseInterface
{
    //Connexion object instance
    private static $DbInstance;

    // Get connexion to Mysql Database with PDO object

    public function getConnexionObject(){
        if (is_null(self::$DbInstance)) {
            $identifiants = $this->getIdentifiantConnexion();

            $dbName = $identifiants['dbname'];
            $dbUser = $identifiants['username'];
            $password = $identifiants['password'];
            $dsn = "mysql:dbname=$dbName;host=localhost";
            self::$DbInstance = new PDO($dsn, $dbUser, $password);
        }
        return self::$DbInstance;
    }

    //Query Data from database without parameters

    public function query($sql, $class_name = null)
    {
        
    }

    public function prepare($sql, ...$params)
    {
        
    }

    //Get connexion identifiants

    private function getIdentifiantConnexion(){
        $DbDataConnexion = require_once dirname(__DIR__)."/DbDataConnexion.php";
        return $DbDataConnexion;
    }
}
