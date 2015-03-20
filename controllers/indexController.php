<?php

class indexController extends baseController {

    public function __construct() {
        parent::__construct();
    }

    public function index() {

        $this->load->model('posts');
        
        $index = new Page('index');
        
        $vars = $this->posts->getEntries();
        $title = "Index";
        
        $index->addObject($vars, 'nazwa_zerowego_obiektu');
        
        $fragment = new Page('indexFragment');
        
        $fragment->addObject($vars, 'objekt_frag');
        
        //$this->layout - do przygotowania
        
        $this->load->view('index', $this->layout, $vars, $title);
        
    }

}
