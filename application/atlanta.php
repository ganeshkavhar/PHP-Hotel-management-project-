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
	
class Atlanta
{
	public $Config;
	
	public function __Construct()
	{		
		$this->InitializeConfig();
		
		$this->InitializeDatabase();
		
		$this->InitializeClasses();
	}
	
	public function Initialize($Class, $Variable = '')
	{
		if(class_exists($Class))
		{
			$Class = new $Class($Variable);
		}
		
		return $Class;
	}
	
	private function InitializeConfig()
	{
		foreach(glob('configuration/*.php') as $Config)
		{
			require $Config;
		}
		
		$this->Config = $Configuration;
		
		return date_default_timezone_set($this->Config['website']['timezone']);
	}
	
	private function InitializeClasses()
	{
		foreach(glob('application/classes/*.php') as $Classes)
		{
			require $Classes;
		}
		
		foreach(glob('application/classes/common/*.php') as $Commons)
		{
			require $Commons;
		}
	}
	
	private function InitializeDatabase()
	{
		require('application/classes/database/class.mysqli.php');
		
		DB::$hostname = $this->Config['database']['hostname'];
		DB::$username = $this->Config['database']['username'];
		DB::$password = $this->Config['database']['password'];
		DB::$database = $this->Config['database']['database'];
		
		return DB::InitializeConnection();
	}
}
?>