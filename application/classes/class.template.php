<?php
/*
 * Project: Atlanta
 * Content Management System
 * ---------------------------------
 * @author  Nick Monsma
 * @website http://blackcoders.eu
 * ---------------------------------
 * Licensed to:
 * The GNU Public License v3.0
 * ---------------------------------
 */
	
class Template
{
	public static $template;
	public static $parameters = array();
	
	public function __Construct()
	{
		// Base Parameters
	}
	
	public function AddGeneric($template)
	{
		$template = 'templates/'.$template.'.tpl';
		
		return self::$template .= $this->GetBaseFile($template);
	}
	
	public function AddParam($key, $value)
	{
		if(is_object($key) || is_object($value) || is_resource($key) || is_resource($value))
		{
			return false;
		}
		
		return self::$parameters[$key] = $value;
	}
	
	protected function GetBaseFile($file)
	{
		if(!file_exists($file))
		{
			trigger_error('Page base doesn\'t exists ('.$file.')', E_USER_ERROR);
		}
		
		ob_start();
		require_once $file;
		return ob_get_clean();
	}
	
	protected function FilterParameters($template)
	{
		foreach(self::$parameters as $key => $value)
		{
			$template = str_replace('[$'.$key.']', $value, $template);
		}
		
		return $template;
	}
	
	public final function GetParsedTemplate()
	{
		echo $this->FilterParameters(self::$template);
	}
}
?>