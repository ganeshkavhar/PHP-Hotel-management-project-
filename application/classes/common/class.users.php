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
	
class Users
{
	public static $data;
	
	private static function GetBase()
	{
		return $GLOBALS['Atlanta']; //Load the base. (Class Atlanta)
	}
	
	public static function GetUserData($id)
	{
		return self::$data = DB::Query('SELECT * FROM `users` WHERE `id` = "'.$id.'"')->fetch_object();
	}
	
	//Output: Users::$data->username - Users::$data->password
	
	public static function GetData($key, $id = 0)
	{
		if($id = 0 || self::$data->id == $id)
		{
			return self::GetUserData(self::$data->id)->$key;
		}
		
		return DB::Result(DB::Query('SELECT `'.$key.'` FROM `users` WHERE `id` = "'.$id.'" LIMIT 1'));
	}
	
	public static function ValidName($username)
	{
		return preg_match('/^[a-zA-Z0-9._:,-]+$/i', $username) && !preg_match('/mod-/i', $username);
	}
	
	public static function ValidEmail($email)
	{
		return preg_match("/^[a-z0-9_\.-]+@([a-z0-9]+([\-]+[a-z0-9]+)*\.)+[a-z]{2,7}$/i", $email);
	}
	
	public static function NameTaken($username)
	{
		return DB::Query('SELECT null FROM `users` WHERE `username` = "'.$username.'" LIMIT 1')->num_rows > 0;
	}

	public static function EmailTaken($email)
	{
		return DB::Query('SELECT null FROM `users` WHERE `mail` = "'.$email.'" LIMIT 1')->num_rows > 0;
	}
}
?>