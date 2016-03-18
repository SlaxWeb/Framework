<?php
/**
 * Sample Provider
 *
 * Only an example, to show how Providers may be loaded.
 *
 * @package   SlaxWeb\Framework
 * @author    Tomaz Lovrec <tomaz.lovrec@gmail.com>
 * @copyright 2016 (c) Tomaz Lovrec
 * @license   MIT <https://opensource.org/licenses/MIT>
 * @link      https://github.com/slaxweb/
 * @version   0.3
 */
namespace App\Provider;

use SlaxWeb\Router\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class Sample implements \Pimple\ServiceProviderInterface
{
    public function register(\Pimple\Container $app)
    {
        // register your services or set application properties here
    }
}
