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
 * @version   0.3
 */
/*
 * Should the Service Providers of the application be registered?
 */
$configuration["application.provider.register"] = true;

/*
 * Service Providers List
 *
 * List of Service Provider Classes. Those need to be autoloaded or loaded in
 * any other way. The SlaxWeb Framework will not attempt to load those classes,
 * it only registers them against the Dependency Injection Container!
 */
$configuration["application.providerList"] = [
    "\\App\\Provider\\Routes" // remove only if you have routes elsewhere
];
