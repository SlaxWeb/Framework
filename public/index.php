<?php
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
define("APPPATH", FCPATH . "../{$appDir}/");
// define PUBPATH constant pointing to Public directory
define("PUBPATH", FCPATH . "../{$pubDir}/");

/**
 * Load the config
 */
require_once APPPATH . "config/config.php";

/**
 * Load the system Composer Autoloader.
 */
$loader = require_once FCPATH . "../vendor/autoload.php";
// Add some stuff to the Autoloader
$loader->add("Controller\\", APPPATH);
$loader->add("Model\\", APPPATH);
