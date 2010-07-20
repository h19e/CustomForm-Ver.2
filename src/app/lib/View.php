<?php

class View
{
	public function __construct()
	{
		$this->parameter = Parameter::getInstance();
	}

	public function display($key)
	{
		echo $this->parameter->get($key);
	}

	public function get($key)
	{
		return $this->parameter->get($key);
	}
}
