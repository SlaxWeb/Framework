.. SlaxWeb Framework routes file, created by
   Tomaz Lovrec <tomaz.lovrec@gmail.com>

.. highlight:: php

Routes
======

First thing we need to do, is define some routes. SlaxWeb Framework does not automatically
route any requests to any of your controllers based on some URL parameters, which
means we will have to define 3 routes for 3 of our pages, including one more route
for saving the newly created and/or edited news article.

You can find more details regarding the Router and routes in the :ref:`route component`.

Route collection file
---------------------

First we are going to create a Route collection file, by default located in **app/Routes**.
The Route collection file must define a class in the **\\App\\Routes** namespace,
which can of course be changed, as long as it remains autoloaded by the :ref:`composer
autoloader section`. For more information about changing the namespace and/or
the location please refer to :ref:`change autoloader` section of the documentation.

We will assume that you did not change the location of the file, nor the namespace,
if you did, please alter the namespace in the examples bellow before using them.

We are going to create a file named **NewsCollection.php** in **app/Routes** directory
with the following contents::

    <?php
    namespace App\Routes;

    use SlaxWeb\Router\Route;
    use SlaxWeb\Bootstrap\Application;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\Response;

    class NewsCollection extends \SlaxWeb\Router\Service\RouteCollection
    {
        public function define()
        {
        }
    }

Right now the Route Collection does not define any routes, as we have defined only
the class with the **define** method. Since the **define** method is defined abstract
in the **\\SlaxWeb\\Router\\Service\\RouteCollection** class, our Route Collection
class has to define it. We will use this method to define our new routes.

Load the collection file
````````````````````````

Even when the Route classes are autoloaded, we still need to instruct the framework
that it needs to instantiate the class and parse our defined routes. To do this,
we will add the full name of the class into the configuration file **app/Config/app.php**::

    // ...
    $configuration["routesList"] = [
        \App\Routes\NewsCollection::class
    ];
    // ...

Adding a route
--------------

A route definition is essentially an array which holds the following 3 informations:

* URI
* HTTP Method
* Action

Where the URI can be a *RegExp*, the HTTP Method can be one of the following:

* **SlaxWeb\Router\Route::METHOD_GET** - HTTP GET - *default*
* **SlaxWeb\Router\Route::METHOD_POST** - HTTP POST
* **SlaxWeb\Router\Route::METHOD_PUT** - HTTP PUT
* **SlaxWeb\Router\Route::METHOD_DELETE** - HTTP DELETE
* **SlaxWeb\Router\Route::METHOD_CLI** - Command Line Interface request
* **SlaxWeb\Router\Route::METHOD_ANY** - any one option from above

And the *Action* has to be a callable.

This array has to be added to the **$_routes** class property as an array item.
Since the Route Collection parent class automatically executes the **define** method
we put our route definitions into the body of the **define** method::

    public function define()
    {
        $this->_routes[] = [
            "uri"       =>  "",
            "method"    =>  Route::METHOD_GET,
            "action"    =>  function (
                Request $request,
                Response $response,
                Application $app
            ) {
                // body
            }
        ];
    }

And we have defined a root route. It does nothing right now, since its body is completely
empty. This route will get executed when a visitor reaches the root page of our
new website.
