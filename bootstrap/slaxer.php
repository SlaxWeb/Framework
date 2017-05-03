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
 * @version   0.6
 */
// load bootstrap
$app = require "framework.php";

// register the Slaxer Service Provider and Component Commands Provider
$app->register(new SlaxWeb\Slaxer\Service\Provider);
$app->register(new SlaxWeb\Bootstrap\Service\ComponentCommandsProvider);

// prepare commands to be injected into slaxer
$app["slaxerCommands"] = array_merge(
    $app["slaxerCommands"] ?? [],
    $app["config.service"]["provider.commandsList"] ?? [],
    $app["config.service"]["component.commands"] ?? []
);

// disable output service
$app["output.service"]->setEnabled(false);

// return the application instance
return $app;
