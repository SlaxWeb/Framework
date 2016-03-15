<?php
/**
 * SlaxWeb Default Routes Provider
 *
 * Provides the first sample Route, and additional routes can be defined here
 * as well.
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

class Routes implements \Pimple\ServiceProviderInterface
{
    public function register(\Pimple\Container $app)
    {
        $app["routesContainer.service"]->add($app["router.newRoute"]->set(
            "",
            Route::METHOD_GET,
            function (Request $request, Response $response, $app) {
                $response->setContent("Hello, World!");
            }
        ));
    }
}
