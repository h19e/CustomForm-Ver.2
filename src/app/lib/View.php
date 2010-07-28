<?php

class View
{
	public function __construct()
	{
		$this->parameter = Parameter::getInstance();
	}

	public function display($key,$array = null)
	{
        if ($array == null) {
		    echo htmlspecialchars($this->parameter->get($key));
	    } else {
            echo htmlspecialchars($array[$key]);
        }
    }

    public function dateDisplay($key,$array = null)
    {
        if ($array == null) {
		    list($date,$time) = explode(" ",$this->parameter->get($key));
            echo $date;
	    } else {
            list($date,$time) = explode(" ",$array[$key]);
            echo $date;
        }
    } 

	public function get($key)
	{
		return $this->parameter->get($key);
	}

	public function inject($name)
	{
		$view = new View();
		include APP_DIR . '/components/' . str_replace('_'.'/',$name) . '.tpl.php';
	}


	
}
