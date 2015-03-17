<?php

	class postsModel extends baseModel{
		
		public function getEntries(){
    
                        try{
                            
                            $return = array();
                            //$return[0] = array('hashtag'=>'{*var1*}','text'=>'info1');     
                            
                            $test = new Object(1, 'foo');
                            
                            $return = $test;  
                            
                        } catch (Exception $ex) {

                            echo $ex->getMessage();
                            
                        }
			return $return;
		}
	}
?>
