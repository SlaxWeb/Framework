<?php
/**
 * SlaxWeb Framework Web Bootstrap
 *
 * Bootstrap file for the web instance, loaded by the web request handlers.
 *
 * @package   SlaxWeb\Framework
 * @author    Tomaz Lovrec <tomaz.lovrec@gmail.com>
 * @copyright 2016 (c) Tomaz Lovrec
 * @license   MIT <https://opensource.org/licenses/MIT>
 * @link      https://github.com/slaxweb/
 * @version   0.4
 */
// load bootstrap
$app = require_once "framework.php";

// register router
$app->register(new SlaxWeb\Router\Service\Provider);

// initialize the app
$app->init();

// return the application instance
return $app;
