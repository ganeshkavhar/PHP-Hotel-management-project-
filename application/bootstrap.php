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

session_start();
error_reporting(E_ALL | E_NOTICE);

/*
 * Grab The Base
 */
require('atlanta.php');

/*
 * Initialize The Base
 */
$Atlanta = new Atlanta();

/*
 * Check Cloudflare Connection
 */
if(isset($_SERVER['HTTP_CF_CONNECTING_IP'])) 
{
	$_SERVER['REMOTE_ADDR'] = $_SERVER['HTTP_CF_CONNECTING_IP']; 
}

/*
 * Initialize Definitions
 */
define('IP', $_SERVER['REMOTE_ADDR']);
define('PATH', $Atlanta->Config['website']['path']);
define('SITE_NAME', $Atlanta->Config['website']['name']);
?>