<?php
/**
 * Set up some global constants
 */
// Application directory
$appDir = "app";
// Public directory
$pubDir = "public";
// Vendor directory
$venDir = "vendor";

// Define FCPATH constant pointing to Front Controller (this file)
define("FCPATH", dirname(__FILE__) . "/");
// Define APPPATH constant pointing to Application directory
define("APPPATH", FCPATH . "../{$appDir}/");
// define PUBPATH constant pointing to Public directory
define("PUBPATH", FCPATH . "../{$pubDir}/");
// define VENPATH constant pointing to the Vendor directory
define("VENPATH", FCPATH . "../{$venDir}/");

/**
 * Load the config
 */
require_once APPPATH . "config/config.php";

/**
 * Load the system Composer Autoloader
 */
$loader = require_once FCPATH . "../vendor/autoload.php";
// Add some stuff to the Autoloader
$loader->add("Controller\\", APPPATH);
$loader->add("Model\\", APPPATH);

// Temporarily add Router here until it becomes a package
$loader->add("SlaxWeb\\Router\\", VENPATH . "slaxweb/router");

/**
 * Initiate the router
 */
$router = new \SlaxWeb\Router\Router([
    "uri"       =>  $_SERVER["REQUEST_URI"],
    "method"    =>  $_SERVER["REQUEST_METHOD"]
]);
// Load the routes and process them
require_once(APPPATH . "config/routes.php");
$route = $router->process();

// Process the action
if (is_object($route["action"]) && $route["action"] instanceof Closure) {
    call_user_func_array($route["action"], $route["params"]);
} else {
    $class = "\\Controller\\{$route["action"][0]}";
    $controller = new $class();
    call_user_func_array([$controller, $route["action"][1]], $route["params"]);
}
