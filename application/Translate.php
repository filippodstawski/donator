<?php

/**
 * Description of Translate
 *
 * @author Filip
 */

class Translate {
    
    private $lang;
    
    public function __construct(){
        
        require_once(SITE_PATH.'lib/translates.php');
        $this->lang = $pl;
        
    }
    
    public function sentence($id){
        
        return $this->lang[$id];
        
    }
    
}
