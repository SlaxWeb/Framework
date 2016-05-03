.. SlaxWeb Framework Getting Started

.. _composer: https://getcomposer.org/
.. _releases: https://github.com/SlaxWeb/Framework/releases

Getting Started
===============

The Getting Started guide is intended to get you up an running with the SlaxWeb
Framework. It does not contain any advanced application creation right now, because
the framework does not yet provide its own components for views, databases, and
so on, but only provides information from installing to writting a simple application.
But once those components become available, Getting Guided guide will be expanded.

1 Installation
--------------

This guide assumes that your document root is **/var/www/** and that you will be
installing the framework into the **framework** sub-direcotory of this directory.

To install the Framework there you can install it through composer_, or download
a pre-packaged version from the releases_ page. Be sure not to download the source code.

To install with composer, you of course need to install it first, and then run
the following commands::

    cd /var/www/
    composer create-project slaxweb/framework framework 0.4.0

This will begin installation of the Framework and all it's dependencies into the
**framework** directory. At the end composer will ask you if it should remove
the VCS directory from the framework. You do not need to remove it, but it is safe to do so,
unless you want to keep all the commits that were made during framework development.

If you are going to install the prepackaged version, just download it, and extract the archive.

Now all you need to do is configure your webserver. This document provides sample
webserver configurations bellow. If you are not using neither of the webservers
in the example bellow, then configure it so, that the document root for your application
is in the **public/** directory that comes with the framework.

1.1 Nginx + PHP-FPM
```````````````````

This is a sample nginx configuration file, configured to connect to a PHP-FPM network
socket listening on localhost, port 9000::

    server {
        listen                  *:80;

        server_name             myslaxwebapp.com;
        client_max_body_size    1m;

        root                    /var/www/install-dir/public/;
        index                   index.php index.html index.htm;

        access_log              /var/log/nginx/myslaxwebapp.access.log;
        error_log               /var/log/nginx/myslaxwebapp.error.log;

        location ~ \.php$ {
            set                     $path_info $fastcgi_path_info;
            fastcgi_index           index.php;
            fastcgi_split_path_info ^(.+\.php)(/.*)$;
            try_files               $uri $uri/ /index.php/$is_args$args;
            include                 /etc/nginx/fastcgi_params;
            fastcgi_pass            127.0.0.1:9000;

            fastcgi_param           SCRIPT_FILENAME $request_filename;
        }
        sendfile off;
    }

1.2 Apache + mod_php
````````````````````

This is a sample VirtualHost configuration file for the Apache 2.4 Web Server::

    <VirtualHost *:80>
        DocumentRoot        /var/www/install-dir/public
        ServerName          myslaxwebapp.com

        <Directory /var/www/iinsall-dir/public>
            Options         -Indexes +FollowSymLinks
            AllowOverride   All
            Require         all granted
        </Directory>

        LogLevel warn
        ErrorLog            ${APACHE_LOG_DIR}/error.myslaxwebapp.com.log
        CustomLog           ${APACHE_LOG_DIR}/access.myslaxwebapp.com.log combined
    </VirtualHost>

2 Creating routes
-----------------

The Framework already provides a sample Route Collection class, where you can
freely add more routes there, but for the sake of this guide, we are going to
create a brand new Route Collection class and add our first route to the Framework.
This guide does not cover all the options that the Route component provides,
for further information please refer to the Routing documentation.

Route Collection classes are Dependency Injection Container Service Provider classes. The Router component provides a base Route Collection class which your Route Collection class must extend. The base Route Collection class already provides all the necessary functionality to register it to the DIC, and you only need to define a define method, where you add new Route definitions to the Route Collection property _routes. When your Route Collection class is defined you need to add the full class name to the Application configuration file. Bellow I will guide you through this process step by step.

2.1 Create Route Collection Class

First we are going to create a Route Connection Class file in app/Routes/ directory. The file name needs to be in CamelCase format, and needs to be the same name as the class name, and may not contain any non-alphanumeric characters. The class also needs to be in the App\Routes namespace. In our example we will create a file MyRoutes.php with the following contents:

<?php
namespace App\Routes;

class MyConfig extends \SlaxWeb\Router\Service\RouteCollection
{
    public function define()
    {
    }
}
And now you've got yourself a Route Collection class, which already defines a define method just like it should. Now on to the next step. Adding Route definitions.

2.2 Add some Route definitions

Congratulations, you've created your first Route Collection class, now how about we add some route definitions, to get your application on the road? As already explained above, you need to add route definitions to the Route Collection class' protected property _routes. To make it simpler, all you need to do is add them as simple array elements, the base Route Collection class will take care of the rest.

The route is consisted of three parts, an URI, a HTTP Method, and an Action.

The URI is the part that needs to match the requested URI for a Route definition to match, and may hold standard RegExp pattern, without a delimiter. The Router component also provides special RegExp elements, but are beyond the scope of this this guide. For further assistance regarding RegExp of the Route definitions please refer to the Routes documentation.

The HTTP Method is also the part that needs to match the HTTP Method of the request. The Router component Route class provides constants that may be used to simplify creation of Route definitions:

SlaxWeb\Router\Route::METHOD_GET - HTTP GET
SlaxWeb\Router\Route::METHOD_POST - HTTP POST
SlaxWeb\Router\Route::METHOD_PUT - HTTP PUT
SlaxWeb\Router\Route::METHOD_DELETE - HTTP DELETE
SlaxWeb\Router\Route::METHOD_CLI - Command Line Interface request
SlaxWeb\Router\Route::METHOD_ANI - any one option from above
And the Action is the part of the Route definition that tells the Application what it must do, when a visitor requests a matching URI and HTTP Method. It must be of type callable. The Router Dispatcher will pass 3 parameters to your defined action. The Request object, the Response object, and the Application object.

I suggest you add a few use statements after the namespace definition to simplify and shorten calls to the some classes that you will need. Below are only the changes you should do to the MyClass.php file:

<?php
namespace App\Router;

use SlaxWeb\Router\Route;
use SlaxWeb\Router\Request;
use SlaxWeb\Router\Response;
use SlaxWeb\Bootstrap\Application;

class MyClass extends \SlaxWeb\Router\Service\RouteDefinition
// ...
Now that we have everything in place, we can finally define a couple of routes. As before, bellow you will find only the changed parts of the MyClass.php file:

    public function define()
    {
        $this->_routes[] = [
            "uri"       =>  "",
            "method"    =>  Route::METHOD_GET,
            "action"    =>  function (
                Request $request,
                Response $response,
                Application $application
            ) {
                // My Default Route
            }
        ];

        $this->_routes[] = [
            "uri"       =>  "hello",
            "method"    =>  Route::METHOD_POST,
            "action"    =>  function (
                Request $request,
                Response $response,
                Application $application
            ) {
                // We need to say hello
            }
        ];
    }
2.3 Loading Route Collection

And now we have created two routes. The routes are not doing much, nor are they working yet, because we need to load them first. To do just that, we are going to edit the app/Config/app.php file, and add the full class name of the Routes Collection, including the namespace to the configuration item routesList:

$configuration["routesList"] = [
    App\Routes\MyClass::class
];
And here we go, congratulations, you have created your first two routes. They are not doing much, but at least you should not see a 404 error when you visit http://mydomain.com. The second Route is a HTTP POST Route, and you can not visit it that simply, so do not worry about it for now.
