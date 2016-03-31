<?php
/**
 * SlaxWeb Framework Bootstrap
 *
 * The Bootstrap is the first thing getting executed in the Framework. It
 * initiates the application, and starts it. It returns the instance of the
 * application to the requestor, so it can print the response with the response
 * object.
 *
 * @package   SlaxWeb\Framework
 * @author    Tomaz Lovrec <tomaz.lovrec@gmail.com>
 * @copyright 2016 (c) Tomaz Lovrec
 * @license   MIT <https://opensource.org/licenses/MIT>
 * @link      https://github.com/slaxweb/
 * @version   0.4
 */
// require the composer autoloader
$loader = require_once __DIR__ . "/../vendor/autoload.php";

// load the application class
$app = new SlaxWeb\Bootstrap\Application(
    __DIR__,
    __DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "app"
);

// register providers
$app->register(new SlaxWeb\Hooks\Service\Provider);
$app->register(new SlaxWeb\Config\Service\Provider);
$app->register(new SlaxWeb\Logger\Service\Provider);
$app->register(new SlaxWeb\Router\Service\Provider);

// expose autoloader to the DIC
$app["autoloader.service"] = function () use ($loader) {
    return $loader;
};

// initialize the app
$app->init();

// start application
$app->run($app["request.service"], $app["response.service"]);

return $app;
