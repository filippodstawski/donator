<?php

class indexController extends baseController {

    public function __construct() {
        parent::__construct();
    }

    public function index() {

        $this->load->model('posts');
        
        $vars['nazwa_zerowego_obiektu'] = $this->posts->getEntries();
        $title = "Index";
        
        //$this->layout - do przygotowania
        
        $this->load->view('index', $this->layout, $vars, $title);
        
    }

}
