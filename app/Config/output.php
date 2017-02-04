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
 * @version   0.4
 */
use SlaxWeb\Output\Manager as Output;

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
 * Defines the default mode in which the Output component operates.
 *
 * Available options:
 * Output::MODE_VIEW - int(0)
 * Output::MODE_JSON - int(1)
 * Output::MODE_FILE - int(2)
 */
$configuration["defaultOutputMode"] = Output::MODE_JSON;

/*
 * Defines if the Output mode may be changed once it has already been set manually.
 * Applies only after the mode has been changed first.
 */
$configuration["permitModeChange"] = true;
