<?php
/**
 * Description of DatabaseConnector
 *
 * @author Filip
 */
class DatabaseConnector {
    
    public $dbh;
    
    public function __construct(){
        
        try {
            $this->dbh = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASS);
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }        

    }
    
    public function getDB(){
        
        return $this->dbh;
        
    }

}
