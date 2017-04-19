<?php
/**
 * SlaxWeb Framework Application Configuration
 *
 * Application configuration options
 *
 * @package   SlaxWeb\Framework
 * @author    Tomaz Lovrec <tomaz.lovrec@gmail.com>
 * @copyright 2016 (c) Tomaz Lovrec
 * @license   MIT <https://opensource.org/licenses/MIT>
 * @link      https://github.com/slaxweb/
 * @version   0.6
 */
/*
 * Default version for installing components
 */
$configuration["defaultVersion"] = "dev-develop";

/*
 * Component repository base URL
 *
 * !DO NOT CHANGE!
 */
$configuration["baseUrl"] = "https://packagist.org/packages/";

/*
 * Component settings
 *
 * Changes in the bellow array can lead to unstable and/or unsecure application,
 * or break installation of certain packages. Proceed with caution!
 */
$configuration["componentSettings"] = [
    "database"      =>  [
        "version"       =>  "dev-release/0.6.0",
        "installFlags"  =>  "--ignore-platform-reqs"
    ],
    "view"          =>  [
        "version"       =>  "dev-release/0.6.0",
        "installFlags"  =>  "--ignore-platform-reqs"
    ],
    "session"       =>  [
        "version"       =>  "dev-release/0.6.0",
        "installFlags"  =>  "--ignore-platform-reqs"
    ],
    "cache"         =>  [
        "version"       =>  "dev-release/0.1.0",
        "installFlags"  =>  "--ignore-platform-reqs"
    ]
];
