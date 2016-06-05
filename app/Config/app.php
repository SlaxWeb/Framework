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
 * @version   0.4
 */
/*
 * Application environment
 *
 * Available values are:
 * - development
 * - staging
 * - production
 *
 * This setting does not control logging or whatsoever, you may reference it bellow however.
 * The framework will output all error and exception messages directly in 'development'
 * environment, but will not do so in 'stagint' nor 'production' environments.
 */
$configuration["environment"] = "development";

/*
 * Routes settings
 *
 * routes.load: Should the Application load the Route Collections?
 *
 * routesList: List of Route Collection Classes. Those need to be autoloaded
 *             or loaded in any other way. The SlaxWeb Framework will not
 *             attempt to load those classes, it only registers them against
 *             the Dependency Injection Container!
 */
$configuration["routes.load"] = true;
$configuration["routesList"] = [
    \App\Routes\DefaultCollection::class // remove only if you have routes elsewhere, no routes no app!
];

/*
 * Provider settings
 *
 * provider.register: Should the Service Providers of the application be
 *                    registered?
 *
 * providerList: List of Service Provider Classes. Those need to be autoloaded
 *               or loaded in any other way. The SlaxWeb Framework will not
 *               attempt to load those classes, it only registers them against
 *               the Dependency Injection Container!
 */
$configuration["provider.register"] = true;
$configuration["providerList"] = [
    \App\Provider\Sample::class // safe to remove, presentational purposes only
];

/*
 * Hooks settings
 *
 * hooks.load: Should the Hook Definitions be loaded?
 *
 * hooksList: List of Hook Definition Classes. Those need to be autoloaded or
 *            loaded in another way. The SlaxWeb Framework will not attempt to
 *            load those classes.
 */
$configuration["hooks.load"] = true;
$configuration["hooksList"] = [];

/**
 * Commands
 *
 * commandsList: List of Slaxer Command Classes that will be registered at
 * booting.
 */
$configuration["commandsList"] = [];
