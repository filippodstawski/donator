<?php

class Load {
    
    private $translate;
    
    public function __construct(){
        
        $this->translate = new Translate();
        
    }

    
    //@todo layout - tablica o wymiarach ['content'], ['vars'] - zmienne - przygotowane w baseController na postawie tego jaki layout jest przypisany do strony
    public function view($name, $layout, $vars = null, $title = null) {
        $file = SITE_PATH . 'views/' . $name . 'View.tpl';
        $layout = SITE_PATH . 'layout/' . $layout->getSource() . '.tpl';

        if (is_readable($file)) {

            $file = file_get_contents($file);
            $layout = file_get_contents($layout);

            $layout = str_replace('{*TITLE*}', $title, $layout);
            $content = str_replace('{*CONTENT*}', $file, $layout);
            
            $pattern = "/{:[^}]*:}/";
            preg_match_all($pattern,$content,$matches);
            
            foreach($matches[0] as $key => $match){
                $toChange = $this->translate->sentence(substr($match, 2, -2));
                $content = str_replace($match, $toChange, $content);
            }
            
            $pattern = "/{'[^}]*'}/";
            preg_match_all($pattern,$content,$matches);
            
            foreach($matches[0] as $key => $match){
                $toChange = substr($match, 2, -2);
                $parameters = explode(".",$toChange);
                $field = $parameters[1];
                $element = $parameters[0];
                //$toChange = $vars[$element]->get($field);
                $content = str_replace($match, $toChange, $content);
            }            
            
            print($content);
            
            return true;
        }
        throw new Exception('View issues');
    }

    public function model($name) {
        $model = $name . 'Model';
        $modelPath = SITE_PATH . 'models/' . $model . '.php';

        if (is_readable($modelPath)) {
            require_once($modelPath);

            if (class_exists($model)) {
                $registry = Registry::getInstance();
                $registry->$name = new $model;
                return true;
            }
        }
        throw new Exception('Model issues.');
    }
    
    public function prepareLayout($layout){
        
        $content = $this->getFullContent($layout->getContent());
        $layoutPage = $this->getFullContent($layout);
        
        $fullContent = str_replace('{*CONTENT*}', $content, $layoutPage);
        $fullContent = str_replace('{*TITLE*}', $layout->getTitle(), $fullContent);
        
        return $fullContent;
        
    }
    
    public function getFullContent($page){
        
        if(isset($page->getContent())){
            $content = SITE_PATH . 'views/' . $name . 'View.tpl';
        }else{
            $content = SITE_PATH . 'layout/' . $layout->getSource() . '.tpl';
        } 
        
        $pattern = "/{'[^}]*'}/";
        preg_match_all($pattern, $content, $matches);

        foreach ($matches[0] as $key => $match) {
            $toChange = substr($match, 2, -2);
            $parameters = explode(".", $toChange);
            $field = $parameters[1];
            $element = $parameters[0];
            $toChange = $page->getObject($element)->get($field);
            $content = str_replace($match, $toChange, $content);
        }
        
        foreach ($page->getFragments() as $key => $fragment){
            
        $pattern = "/{'[^}]*'}/";
        preg_match_all($pattern, $content, $matches);

            foreach ($matches[0] as $key => $match) {
                $toChange = substr($match, 2, -2);
                $parameters = explode(".", $toChange);
                $field = $parameters[1];
                $element = $parameters[0];
                $toChange = $fragment->getObject($element)->get($field);
                $content = str_replace($match, $toChange, $content);
            }
            
        }
        
        $content = getTranslationContent($content);
        
    }
    
    public function getTranslationContent($content){
        
        $pattern = "/{:[^}]*:}/";
        preg_match_all($pattern, $content, $matches);

        foreach ($matches[0] as $key => $match) {
            $toChange = $this->translate->sentence(substr($match, 2, -2));
            $content = str_replace($match, $toChange, $content);
        }
        
        return $content;
        
    }

}
