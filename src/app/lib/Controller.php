<?php

class Controller 
{
	
	static private $instance = null;

	private function __construct()
	{
		$parameter = Parameter::getInstance();
		$this->module = $parameter->get('MO',"Top");
		$this->action = $parameter->get('AC',"Index");		
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
		$filePath = APP_DIR . '/modules/' . $this->module . '/actions/' . $this->action . '.php';
		if (file_exists($filePath)) {
			include_once $filePath;
		} else {
			throw new Exception;
		}

		$className = 'Action_' . $this->action;
		$actionInstance = new $className;
		
		$actionInstance->execute();
	    
		$view = new View();		
		$templatePath = APP_DIR . '/modules/' . $this->module . '/views/' . $this->action . '.tpl.php';
		include $templatePath;

	}
	
}
		 
