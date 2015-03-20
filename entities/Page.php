<?php

/**
 * Description of Page
 *
 * @author Filip
 */
class Page {
    
    private $objects;
    private $source;
    private $content;
    
    public function __construct($source){
        $this->source = $source;
        $this->objects = new ArrayObject();
    }
    
    public function setSource($source){
        $this->source = $source;
    }
    
    public function getSource(){
        return $this->source;
    }
    
    public function addObject($object){
        $this->objects->append($object);
    }
    
    public function setContent($content){
        $this->content = $content;
    }
    
}
