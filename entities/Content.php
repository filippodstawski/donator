<?php

/**
 * Description of Content
 *
 * @author Filip
 */
class Content {
    
    private $source;
    private $object;
    
    public function __construct($source){
        
        $this->source = $source;
        
    }
    
    public function fetch($object){
        
        $this->object = $object;
        
    }
    
}
