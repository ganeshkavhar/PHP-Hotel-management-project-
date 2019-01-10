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
	
class DB
{
	public static $link;
	
	public static $hostname;
	public static $username;
	public static $password;
	public static $database;
	
	public static $port = 3306;
	public static $encoding = 'latin1';
	
	public static function InitializeConnection($hostname = null, $username = null, $password = null, $database = null)
	{
		if($hostname == null) $hostname = self::$hostname;
		if($username == null) $username = self::$username;
		if($password == null) $password = self::$password;
		if($database == null) $database = self::$database;
		
		self::$link = new mysqli($hostname, $username, $password, $database, self::$port);
		
		if(self::$link->connect_error)
		{
			trigger_error(self::$link->connect_error, E_USER_ERROR);
		}
		
		self::$link->set_charset(self::$encoding);
	}
	
	public static function Query($value)
	{
		return self::$link->query($value);
	}
	
	public static function Result($value)
	{
		foreach($value->fetch_row() as $result)
		{
			$return = (isset($result) ? $result : false);
		}
		
		return $return;
	}
	
	public static function Clean($value)
	{
		return self::$link->real_escape_string($value);
	}
}
?>