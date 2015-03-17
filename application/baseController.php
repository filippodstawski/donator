<?php
	abstract class baseController{
		
		protected $_registry;
		protected $load;
                public $layout;
                
		public function __construct(){
			$this->_registry = Registry::getInstance();
			$this->load = new Load;
                        
                        $this->layout = new Page("main");
		}
		abstract public function index();

		final public function __get($key){
			if($return = $this->_registry->$key){
				return $return;
			}
			return false;
		}	
                
	}
?>
