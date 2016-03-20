<?php
/**
 * SlaxWeb Framework Logger Config
 *
 * Contains configuration options for the Logger.
 *
 * @package   SlaxWeb\Framework
 * @author    Tomaz Lovrec <tomaz.lovrec@gmail.com>
 * @copyright 2016 (c) Tomaz Lovrec
 * @license   MIT <https://opensource.org/licenses/MIT>
 * @link      https://github.com/slaxweb/
 * @version   0.3
 */
use Monolog\Logger;
use SlaxWeb\Logger\Helper as Log;

/*
 * Name of the logger
 *
 * This name will be attached to all log messages.
 */
$configuration["name"] = "SlaxWebApp";

/*
 * Type of logger
 *
 * Defines the Monolog Handler that will be used for logging messages.
 * Available types(constant - description - Monolog Handler):
 * - Log::L_TYPE_FILE - file logger - StreamHandler
 */
$configuration["loggerType"] = Log::L_TYPE_FILE;

/*
 * Additional logger arguments
 *
 * The arguments found in the bellow array are passed to the Logger Handler of
 * the Monolog component. Please refer to the Monolog documentation.
 */
$configuration["handlerArgs.{$configuration["loggerType"]}"] = [
    __DIR__ . "/../Logs/Log-" . date("Ymd") . ".log", // log path and filename
    Logger::DEBUG // log level
];
