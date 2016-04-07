<?php
/**
 * SlaxWeb Framework Slaxer Bootstrap
 *
 * Bootstrap file for the CLI instance, loaded by slaxer.
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

// register the Slaxer Service Provider
$app->register(new SlaxWeb\Slaxer\Service\Provider);

// return the application instance
return $app;
