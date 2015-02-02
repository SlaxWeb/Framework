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
// define TEMPLATEPATH constant pointing to the Templates directory
define("TEMPLATEPATH", APPPATH . "/Template/View");
// define TWIGCACHE constant pointing to the Twig Cache directory
define("TWIGCACHE", APPPATH . "/Template/Cache");

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
$loader->add("View\\", APPPATH);

/**
 * Initiate the router
 */
$uri = "";
$method = "";
// check if request is from CLI
if (php_sapi_name() === "cli") {
    array_shift($argv);
    $uri = implode("/", $argv);
    $method = "CLI";
} else {
    // normal WEB request
    $uri = $_SERVER["REQUEST_URI"];
    $method = $_SERVER["REQUEST_METHOD"];
}
$router = new \SlaxWeb\Router\Router([
    "uri"       =>  $uri,
    "method"    =>  $method
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
