<?php

class Parameter
{
	static private $instance = null;
	private $data = array();

	
	private function __construct()
	{
		foreach ($_GET as $key=>$value) {
			$this->data[$key] = $value;
		}

		foreach ($_POST as $key=>$value) {
			$this->data[$key] = $value;
		}
	}

	static public function getInstance()
	{
		if (is_null(self::$instance)) {
			self::$instance = new self;
		}
		return self::$instance;
	}

	public function get($key,$default = null)
	{
		if (isset($this->data[$key])) {
			return $this->data[$key];
		} else {
			return $default;
		}
	}
	
	public function set($key,$value)
	{
		if (isset($this->data[$key])) {
			new Exception;
		}
		$this->data[$key] = $value;
	}
	
	public function overWrite($key,$value)
	{
		$this->data[$key] = $value;
	}

	
}


	
		
