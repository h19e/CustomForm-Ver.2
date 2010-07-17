<?php

class Controller 
{

	private function __construct()
	{
		
	}

	static public function getInstance()
	{
		if (is_null(self::$instance)) {
			self::$instance = new self;
		}
		return self::$instance;
	}
	
	public function forward()
	{
		$filePath = Env::APP_DIR . '/modules/' . $this->module . '/actions/' . $this->action . '.php';
		if (file_exists($filePath)) {
			include_once $filePath;
		} else {
			throw new Exception;
		}

		$className = 'Action_' . $this->action;
		$actionInstance = new $className;
		
		$actionInstance->execute();
	}
	
}
		 
