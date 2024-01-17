<?php 
namespace Database;

use PDO;

abstract class MysqlDatabase implements DatabaseInterface
{
    
    /**
     * Connexion object instance
     *
     * @var static
     */
    private static $DbInstance;


    /**
     * Get connexion to Mysql Database with PDO object
     *
     * @return [type]
     * 
     */
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

    

    /**
     * fetch Data from database without parameters
     *
     * @param mixed $sql
     * @param null $class_name
     * 
     * @return PDOStatement
     * 
     */
    public function query($sql, $class_name = null)
    {
        if (! is_null($class_name)) {
            $pdoStat =  $this->getConnexionObject()->query($sql, PDO::FETCH_CLASS, get_called_class());
        }
           $pdoStat =  $this->getConnexionObject()->query($sql, PDO::FETCH_OBJ);
       return $pdoStat;
    }

    
    /**
     * fetch Data from database with parameters
     *
     * @param mixed $sql
     * @param mixed ...$params
     * 
     * @return PDOStatement
     * 
     */
    public function prepare($sql, ...$params)
    {
        $pdoStat =  $this->getConnexionObject()->prepare($sql);

            $pdoStat->execute($params);

            $pdoStat->setFetchMode(PDO::FETCH_CLASS, get_called_class());
            return $pdoStat;
    }


    /**
     * Get connexion data to database
     *
     * @return array
     * 
     */
    private function getIdentifiantConnexion(){
        $DbDataConnexion = require_once dirname(__DIR__)."/DbDataConnexion.php";
        return $DbDataConnexion;
    }
}
