<?php

	error_reporting(E_ALL);
        ini_set('display_errors', '1');

	define('SITE_PATH',realpath(dirname(__FILE__)).'/');
        
	/*Require necessary files.*/
        require_once(SITE_PATH.'config.php');
        require_once(SITE_PATH.'application/Translate.php');
	require_once(SITE_PATH.'application/request.php');
	require_once(SITE_PATH.'application/router.php');
	require_once(SITE_PATH.'application/baseController.php');
	require_once(SITE_PATH.'application/baseModel.php');
	require_once(SITE_PATH.'application/load.php');
	require_once(SITE_PATH.'application/registry.php');
	require_once(SITE_PATH.'controllers/errorController.php');
        require_once(SITE_PATH.'util/Util.php');
        require_once(SITE_PATH.'util/DatabaseConnector.php');
        require_once(SITE_PATH.'entities/Object.php');
        require_once(SITE_PATH.'entities/Page.php');
        require_once(SITE_PATH.'entities/Fragment.php');
        
	try{
		Router::route(new Request);
	}catch(Exception $e){
		$controller = new errorController;
		$controller->error($e->getMessage());
	}
