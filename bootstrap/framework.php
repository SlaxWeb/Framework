<?php
/**
 * SlaxWeb Framework Bootstrap
 *
 * The Bootstrap is the first thing getting executed in the Framework. It
 * initiates the application It returns the instance of the application to the
 * requestor, so it can start the application and print the response with the
 * response object.
 *
 * @package   SlaxWeb\Framework
 * @author    Tomaz Lovrec <tomaz.lovrec@gmail.com>
 * @copyright 2016 (c) Tomaz Lovrec
 * @license   MIT <https://opensource.org/licenses/MIT>
 * @link      https://github.com/slaxweb/
 * @version   0.4
 */
// check system environment
if (($env = getenv("SWF_ENV")) === "development") {
    ini_set("error_reporting", E_ALL);
    ini_set("display_errors", 1);
} else {
    ini_set("error_reporting", 0);
    ini_set("display_errors", 0);
}

// require the composer autoloader
$loader = require_once __DIR__ . "/../vendor/autoload.php";

// load the application class
$baseDir = realpath(__DIR__ . DIRECTORY_SEPARATOR . "..") . DIRECTORY_SEPARATOR;
$app = new SlaxWeb\Bootstrap\Application("{$baseDir}public", "{$baseDir}app");

// if system environment not set, check configured environment
if ($env === false && $app["config.service"]["app.environment"] === "development") {
    ini_set("error_reporting", E_ALL);
    ini_set("display_errors", 1);
}

// set environment to application properties
$app["environment"] = $env ?: $app["config.service"]["app.environment"];

// register providers
$app->register(new \SlaxWeb\Bootstrap\Service\HooksProvider);
$app->register(new \SlaxWeb\Bootstrap\Service\LoggerProvider);
$app->register(new \SlaxWeb\Bootstrap\Service\RouterProvider);
$app->register(new \SlaxWeb\Bootstrap\Service\OutputProvider);

// initialize the app
$app->init();

// expose autoloader to the DIC
$app["autoloader.service"] = function () use ($loader) {
    return $loader;
};

return $app;
