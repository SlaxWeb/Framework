<?php
/**
 * SlaxWeb Framework Front Controller
 *
 * This is the Front Controller of the SlaxWeb Framework. It handles all
 * incoming requests and prints response back to the caller.
 *
 * @package   SlaxWeb\Framework
 * @author    Tomaz Lovrec <tomaz.lovrec@gmail.com>
 * @copyright 2016 (c) Tomaz Lovrec
 * @license   MIT <https://opensource.org/licenses/MIT>
 * @link      https://github.com/slaxweb/
 * @version   0.3
 */
// require the composer autoloader
require_once __DIR__ . "/../vendor/autoload.php";

// are we running on windows?
$dirSep = strtoupper(substr(PHP_OS, 0, 3)) === "WIN" ? "\\" : "/";

// load the application class
$app = new SlaxWeb\Bootstrap\Application(
    __DIR__,
    __DIR__ . "{$dirSep}..{$dirSep}app"
);

// register providers
$app->register(new SlaxWeb\Hooks\Service\Provider);
$app->register(new SlaxWeb\Config\Service\Provider);
$app->register(new SlaxWeb\Logger\Service\Provider);
$app->register(new SlaxWeb\Router\Service\Provider);

// initialize the app
$app->init();

// start application
$app->run($app["request.service"], $app["response.service"]);

// print the output
$app["response.service"]->send();
