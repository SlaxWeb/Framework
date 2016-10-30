<?php
/**
 * Default Routes Collection
 *
 * Provides a default route, to show how Routes must be defined in SlaxWeb
 * Framework.
 *
 * @package   SlaxWeb\Framework
 * @author    Tomaz Lovrec <tomaz.lovrec@gmail.com>
 * @copyright 2016 (c) Tomaz Lovrec
 * @license   MIT <https://opensource.org/licenses/MIT>
 * @link      https://github.com/slaxweb/
 * @version   0.3
 */
namespace App\Routes;

use SlaxWeb\Router\Route;
use SlaxWeb\Bootstrap\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultCollection extends \SlaxWeb\Router\Service\RouteCollection
{
    /**
     * Define routes
     *
     * Add routes to the internal 'routes' protected property. The '_container'
     * protected property holds the DIC instance, and can be used freely.
     *
     * @return void
     */
    public function define()
    {
        $this->routes[] = [
            "uri"       =>  "",
            "method"    =>  Route::METHOD_GET,
            "action"    =>  function (
                Request $request,
                Response $response,
                Application $app
            ) {
                $content = <<<EOC
Hello, World!<br />
My Base URL is: {$request->getSchemeAndHttpHost()}{$request->getBasePath()}
EOC;
                $response->addContent($content);
            }
        ];
    }
}
