<?php
	abstract class baseModel{
            
            public $pdo;
            
            public function __construct(){
                
                $db = new DatabaseConnector();
                $this->pdo = $db->getDB();
                
            }
            
	}
