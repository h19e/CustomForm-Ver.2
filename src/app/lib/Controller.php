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
	
	public function forward($module = null,$action = null)
	{
        if ($module == null || $action == null) {
            $module = $this->module;
            $action = $this->action;    
        }

        
		$filePath = APP_DIR . '/modules/' . $module . '/actions/' . $action . '.php';
		if (file_exists($filePath)) {
			include_once $filePath;
		} else {
			throw new Exception;
		}

		$className = 'Action_' . $action;
		$actionInstance = new $className;
		
		if ($actionInstance->execute() !== false) {
		    $view = new View();		
		    $templatePath = APP_DIR . '/modules/' . $module . '/views/' . $action . '.tpl.php';
		    include $templatePath;
        }

	}
	
}
		 
