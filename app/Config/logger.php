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
 * Default logger for the application
 *
 * Suggested you put the name of your application here.
 */
$configuration["defaultLogger"] = "SlaxWebApp";

/*
 * Defines a path where all the loggers will write their log files. This directory
 * has to be writable.
 */
$configuration["logFilePath"] = __DIR__ . "/../Logs/";

/*
 * Settings for all available loggers
 *
 * SlaxWeb Framework provides multiple loggers, one for your app(which name you must change here as well if you
 * changed it above), one for the system, and one for the Slaxer CLI tool.
 *
 * The structure is:
 * Logger Name =>
 *      Logger Handler Type =>
 *          Logger Handler Input parameters
 *
 * Available types(constant = Monolog Handler - description):
 * - Log::L_TYPE_FILE = StreamHandler - file logger
 *
 * Logger Handler Input parameters are passed to the Logger Handler of * the Monolog component. Please refer
 * to the Monolog documentation for further information what each logger handler requires.
 */
$configuration["loggerSettings"] = [
    "SlaxWebApp"    =>  [
        Log::L_TYPE_FILE    =>  [
            "App-" . date("Ymd") . ".log", // log path and filename
            Logger::DEBUG // log level
        ]
    ],
    "System"    =>  [
        Log::L_TYPE_FILE    =>  [
            "System-" . date("Ymd") . ".log", // log path and filename
            Logger::DEBUG // log level
        ]
    ],
    "Slaxer"    =>  [
        Log::L_TYPE_FILE    =>  [
            "Slaxer-" . date("Ymd") . ".log", // log path and filename
            Logger::DEBUG // log level
        ]
    ]
];
