<?php

/*
	Template Class
	Handles all templating tasks - displaying templates, alerts & errors
*/

class Template
{
	private $data;
	private $alertTypes;
	
	/*
		Constructor
	*/
	function __construct() {}
	
	/*
		Functions
	*/
	function load($url)
	{
		include($url);
	}
	
	function redirect($url)
	{
		header("Location: $url");
	}
	
	/*
		Get / Set Data
	*/
	function setData($name, $value)
	{
		$this->data[$name] = htmlentities($value, ENT_QUOTES);
	}
	
	function getData($name)
	{
		if (isset($this->data[$name]))
		{
			return $this->data[$name];
		}
		else
		{
			return '';
		}
	}
	
	/*
		Get / Set Alerts
	*/
	function setAlertTypes($types)
	{
		$this->alertTypes = $types;
	}
	function setAlert($value, $type = null)
	{
		if ($type == '') { $type = $this->alertTypes[0]; }
		$_SESSION[$type][] = $value;
	}
	function getAlerts()
	{
		$data = '';
		foreach($this->alertTypes as $alert)
		{
			if (isset($_SESSION[$alert]))
			{
				foreach($_SESSION[$alert] as $value)
				{
					$data .= '<li class="'. $alert .'">' . $value . '</li>';
				}
				unset($_SESSION[$alert]);
			}
		}
		return $data;
	}
}

