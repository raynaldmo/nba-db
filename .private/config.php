<?php
/**
 * Created by PhpStorm.
 * User: raynald
 * Date: 7/29/15
 * Time: 5:06 PM
 */

/*
 *  Configuration file does the following things:
 *  - Has site settings in one location.
 */

// set time zone to use date/time functions without warnings
date_default_timezone_set('America/Los_Angeles');

$root = $_SERVER['DOCUMENT_ROOT'];
$host = $_SERVER['HTTP_HOST'];
$re = '/.*192\.168/';

if (preg_match($re, $host)){
  // Flag variable for site status:
  define('LIVE', false);
} else {
  define('LIVE', true);
}

// report all errors
error_reporting(E_ALL);

// Always log errors
ini_set('log_errors', '1');

// error handler:
set_error_handler ('my_error_handler');