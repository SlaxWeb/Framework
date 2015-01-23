<?php
/**
 * Load the system Composer Autoloader.
 */
require_once "../vendor/autoload.php";

/**
 * Set up some global constants
 */
// Application directory
$appDir = "app";
// Public directory
$pubDir = "public";

// Define FCPATH constant pointing to Fron Controller (this file)
define("FCPATH", dirname(__FILE__) . "/");
// Define APPPATH constant pointing to Application directory
define("APPPATH", FCPATH . "{$appDir}/");
// define PUBPATH constant pointing to Public directory
define("PUBPATH", FCPATH . "{$pubDir}/");

/**
 * Load the config
 */
require_once APPPATH . "config/config.php";
