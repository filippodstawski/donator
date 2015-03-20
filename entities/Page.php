<?php

/**
 * Description of Page
 *
 * @author Filip
 */
class Page {
    
    private $objects;
    private $source;
    private $fragments;
    private $content;
    
    public function __construct($source){
        $this->source = $source;
        $this->objects = new ArrayObject();
        $this->fragments = new ArrayObject();
    }
    
    public function setSource($source){
        $this->source = $source;
    }
    
    public function getSource(){
        return $this->source;
    }
    
    public function addObject($object,$offset){
        $this->objects[$offset] = $object;
    }
    
    public function addFragment($fragment,$offset){
        $this->objects[$offset] = $fragment;
    }
    
    public function setContent($content){
        $this->content = $content;
    }
    
}
