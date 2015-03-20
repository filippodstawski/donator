<?php
/**
 * Description of Object
 *
 * @author Filip
 */
class Object {
    
    private $pdo;
    
    private $id;
    private $genre;
    
    public function __construct($id, $genre){
        
        $this->id = $id;
        $this->genre = $genre;
        
        $db = new DatabaseConnector();
        $this->pdo = $db->getDB();
        
    }
    
    public function get($field){
        
        try{
            
            $sth = $this->pdo->prepare('SELECT '.$field.' FROM '.$this->genre.' WHERE id='.$this->id);

            $sth->execute();
            $result = $sth->fetch(PDO::FETCH_ASSOC);            
            
        } catch (Exception $ex) {

            echo $ex->getMessage();
            
        }
       
        return $result[$field];
        
    }
    
}
