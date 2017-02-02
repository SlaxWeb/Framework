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
