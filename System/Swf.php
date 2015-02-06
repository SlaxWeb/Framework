<?php
namespace System;

class Swf
{
    /**
     * Composer Autoloader
     *
     * @var object
     */
    protected $_loader = null;
    /**
     * Router
     *
     * @var \SlaxWeb\Router\Router
     */
    protected $_router = null;

    public function __construct(\Composer\Autoload\ClassLoader $loader, \SlaxWeb\Router\Router $router)
    {
        $this->_loader = $loader;
        $this->_router = $router;
        $this->_dic["loader"] = $this->_loader;
        $this->_dic["router"] = $this->_router;
    }

    public function configureAutoload()
    {
        $this->_loader->add("Controller\\", APPPATH);
        $this->_loader->add("Model\\", APPPATH);
        $this->_loader->add("View\\", APPPATH);
    }

    public function routeRequest()
    {
        require_once(APPPATH . "config/routes.php");

        $route = $this->_router->process();

        if (is_object($route["action"]) && $route["action"] instanceof \Closure) {
            call_user_func_array($route["action"], $route["params"]);
        } else {
            $controller = Registry::setAlias("controller", "\\Controller\\{$route["action"][0]}");
            $controller->{$route["action"][1]}(...$route["params"]);
        }
    }
}
