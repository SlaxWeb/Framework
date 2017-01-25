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

/**
 * Controller class namespace
 *
 * The namespace in which the Controller classes are defined.
 *
 * NOTE: If you change the autoloader config, you have to change this configuration
 * as well. If you fail to do so, the "Controller Class Loader" will no longer work.
 */
$configuration["controllerNamespace"] = "\\App\\Controller\\";

/*
 * Segment-based URI matching
 *
 * Segment-based URI matching converts an URI string to different segments,that
 * are delimited by forward slashes. The first segment is translated into a Controller
 * class name, second segment into a method name, and further segments into parameters.
 * By default this is disabled and has to be enabled here.
 */
$configuration["segmentBasedMatch"] = false;

/*
 * Segment-based URI matching default controller method
 *
 * If the URI holds only one segment, and therefore does not supply a controller
 * method, the Router will attempt to execute this method instead.
 */
$configuration["segmentBasedDefaultMethod"] = "index";

/*
 * Segment-based URI prepend
 *
 * The Router will, per default, take the first URI segment as the Controller name.
 * If a 'prepend' is defined here, then only URIs that begin with that prepend will
 * be used for Segment-based URI matching, effectively pushing the "first segment"
 * back.
 */
$configuration["segmentBasedUriPrepend"] = "";

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
