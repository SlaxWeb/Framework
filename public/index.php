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
 * @version   0.6
 */
// get the app instance
$app = require_once "../bootstrap/web.php";

// start application
$app->run($app["request.service"], $app["response.service"]);
