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
	
class Core
{
	private static function GetBase()
	{
		return $GLOBALS['Atlanta']; //Load the base. (Class Atlanta)
	}
	
	public static function Location($page)
	{
		
	}
	
	public static function Hash($password)
	{		
		return sha1($password . self::GetBase()->Config['website']['blowfish']);
	}
	
	public static function Maintenance()
	{
		return (DB::Result(DB::Query('SELECT `maintenance` FROM `cms_config` LIMIT 1')) == 1) ? true : false;
	}
}
?>