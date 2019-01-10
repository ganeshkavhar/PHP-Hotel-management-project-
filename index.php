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

/**
 * Grab Environment
 */  
require('application/bootstrap.php');

/**
 * Call Page Request
 */
$Page = isset($_GET['page']) ? $_GET['page'] : 'index';

/**
 * Initialize Rendering
 */
$Atlanta->Initialize('Router', $Page)->Rendering();

/**
 * Output Template
 */
$Atlanta->Initialize('Template')->GetParsedTemplate();
?>