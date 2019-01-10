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
	
class Router
{
	private $page;
	
	public function __Construct($page)
	{
		$this->page = $page;
		
		if(!file_exists('application/controllers/'.$this->page.'.php'))
		{
			$this->page = 'document_404';
		}
	}
	
	public function Rendering()
	{
		return require('application/controllers/'.$this->page.'.php');
	}
}
?>