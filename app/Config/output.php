<?php
/**
 * SlaxWeb Framework Output Component Configuration
 *
 * Main configuration file for the outptu component.
 *
 * @package   SlaxWeb\Framework
 * @author    Tomaz Lovrec <tomaz.lovrec@gmail.com>
 * @copyright 2016 (c) Tomaz Lovrec
 * @license   MIT <https://opensource.org/licenses/MIT>
 * @link      https://github.com/slaxweb/
 * @version   0.6
 */
/*
 * Enables or disables the Output component, and must be set to bool(true) in order
 * to enable the component.
 */
$configuration["enable"] = false;

/*
 * If this configuration option is set to bool(false) the Output component will
 * discard any direct output from your application that is not set to the Response
 * object or the Output component.
 */
$configuration["permitDirectOutput"] = true;

/*
 * Defines the Output Handler for the Output Manager. The Output component comes
 * with existing handlers, but you may use your own. If you wish to use your own
 * just set the full class name of your handler bellow, or the name of the service
 * if you have registered it with the Application instance, or choose one pre-existing
 * handler from the list bellow.
 *
 * NOTE: this can be overriden during runtime by setting the "outputHandler" application
 * property.
 *
 * Available options:
 * - view
 * - json
 */
$configuration["defaultHandler"] = "view";
