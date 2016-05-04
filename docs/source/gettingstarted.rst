.. SlaxWeb Framework Getting Started documentation, created by
   Tomaz Lovrec <tomaz.lovrec@gmail.com>

.. highlight:: php
.. _composer: https://getcomposer.org/
.. _releases: https://github.com/SlaxWeb/Framework/releases
.. _Pimple container Documentation: http://pimple.sensiolabs.org/

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
the following commands:

.. code-block:: bash

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
socket listening on localhost, port 9000:

.. code-block:: bash

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

This is a sample VirtualHost configuration file for the Apache 2.4 Web Server:

.. code-block:: bash

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

The Framework already provides a sample Route Collection class, where you can freely
add more routes there, but for the sake of this guide, we are going to create a brand
new Route Collection class and add our first route to the Framework. This guide
does not cover all the options that the Route component provides, for further
information please refer to the Routing documentation.

Route Collection classes are Dependency Injection Container Service Provider classes.
The Router component provides a base Route Collection class which your Route Collection
class must extend. The base Route Collection class already provides all the necessary
functionality to register it to the DIC, and you only need to define a define method,
where you add new Route definitions to the Route Collection property *_routes*.
When your Route Collection class is defined you need to add the full class name
to the Application configuration file. Bellow you will find a guide that will walk
you through this process step by step.

2.1 Create Route Collection Class
`````````````````````````````````

First we are going to create a Route Connection Class file in **app/Routes/**
directory. The file name needs to be in CamelCase format, and needs to define a class
with the exact same name, and may not contain any non-alphanumeric characters.
The class needs to be defined in the **App\Routes** namespace. In our example we
will create a file MyRoutes.php with the following contents::

    <?php
    namespace App\Routes;

    class MyConfig extends \SlaxWeb\Router\Service\RouteCollection
    {
        public function define()
        {
        }
    }

And now you've got yourself a Route Collection class, which already defines a define
method just like it should. Now on to the next step. Adding Route definitions.

2.2 Add some Route definitions
``````````````````````````````

Congratulations, you've created your first Route Collection class, now how about
we add some route definitions, to get your application on the road? As already
explained above, you need to add route definitions to the Route Collection class'
protected property **_routes**. To make it simpler, all you need to do is add them
as simple array elements, and the base Route Collection class will take care of the rest.

The route is consisted of three parts, an **URI**, a **HTTP Method**, and an **Action**.

The URI is the part that needs to match the requested URI for a Route definition
to match, and may hold standard RegExp pattern, without a delimiter. The Router
component also provides special RegExp elements, but are beyond the scope of this
this guide. For further assistance regarding RegExp of the Route definitions please
refer to the Routes documentation.

The HTTP Method is also the part that needs to match the HTTP Method of the request.
The Router component Route class provides constants that may be used to simplify
creation of Route definitions:

* **SlaxWeb\Router\Route::METHOD_GET** - HTTP GET - *default*
* **SlaxWeb\Router\Route::METHOD_POST** - HTTP POST
* **SlaxWeb\Router\Route::METHOD_PUT** - HTTP PUT
* **SlaxWeb\Router\Route::METHOD_DELETE** - HTTP DELETE
* **SlaxWeb\Router\Route::METHOD_CLI** - Command Line Interface request
* **SlaxWeb\Router\Route::METHOD_ANI** - any one option from above

If no HTTP Method is defined, then the route will automatically be defined with
the HTTP GET method.

And the Action is the part of the Route definition that tells the Application what
it must do, when a visitor requests a matching URI and HTTP Method. It must be of
type callable. The Router Dispatcher will pass 3 parameters to your defined action.
The Request object, the Response object, and the Application object.

It is advised you add a few use statements after the namespace definition to simplify
and shorten calls to the some classes that you will need. Below are only the changes
you should do to the MyClass.php file::

    <?php
    namespace App\Router;

    use SlaxWeb\Router\Route;
    use SlaxWeb\Router\Request;
    use SlaxWeb\Router\Response;
    use SlaxWeb\Bootstrap\Application;

    class MyClass extends \SlaxWeb\Router\Service\RouteDefinition
    // ...

Now that we have everything in place, we can finally define a couple of routes.
As before, bellow you will find only the changed parts of the MyClass.php file::

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
````````````````````````````

And now we have created two routes. The routes are not doing much, nor are they
working yet, because we need to load them first. To do just that, we are going to
edit the **app/Config/app.php** file, and add the full class name of the Routes
Collection, including the namespace to the configuration item routesList::

    $configuration["routesList"] = [
        App\Routes\MyClass::class
    ];

And here we go, congratulations, you have created your first two routes. They are
not doing much, but at least you should not see a 404 error when you visit http://mydomain.com.
The second Route is a HTTP POST Route, and you can not visit it that simply, so do
not worry about it for now.

3 Adding application content
----------------------------

Now that you have your Routes, you are ready to add some content to your first
application written with help of the SlaxWeb Framework. Your first application
will be a simple "Hello, Name!", where the visitor will type in his or her name.
Unfortunately since the Framework lacks further components, we can not get into
a more complex applications without using 3rd party components. But of course
this does not mean that you can't, explaining how 3rd party components need to
be used is just beyond the scope of this simple guide. But if you would like to
find out more on how to use the Framework, and even how to add 3rd party
components, please refer to further sections of the User Guide.

Now that we have this out of the way, let's create that content, huh? Open your
**app/Routes/MyClass.php** file once more, and locate the *Closure* for the
first route, the one with the comment *My Default Route*. Now let's add some
page content to it, shall we::

    // ...
                "action"    =>  function (
                    Request $request,
                    Response $response,
                    Application $application
                ) {
                    // My Default Route
                    $content = <<<EOC
    <form action="hello" method="POST">
        May I please know your name? <input type="text" name="name"><br />
        <input type="submit" value="Send">
    </form>
    EOC;
                    $response->addContent($content);
                }
    // ...

If you visit *http://mydomain.com* URL now, you should be greeted by a simple
Web Form. But if you decide to type in your name, and click on the send button
you will still be redirected to an empty page. We will correct this in the next
step, where we will interact with the *Request* object to retrieve the typed in
name, and display a simple hello message::

    // ...
                "action"    =>  function (
                    Request $request,
                    Response $response,
                    Application $application
                ) {
                    // We need to say hello
                    $name = $request->get("name");
                    $message = "Hello {$name}! Nice to meet you!";
                    $response->addContent($message);
                }
    // ...

4 Using 3rd party components
----------------------------

This is a very plain and simple example application, very overkill for any sort
of tool, but it is meant only to show you how to get started. Once the Framework
provides more components, which I certainly hope it will, this Getting Started
Guide will get updated wit a more complex example.

But for now, congratulations! You have written your first "application" using
the SlaxWeb Framework. Now we are going to take a look how you can add other
components. To avoid promoting any kind of library or other software, we are
going to include library X into your application.

4.1 Creating The Service Provider
`````````````````````````````````

Of course you could just load library X directly in your Route action, but this
would be inefficient, since you would have to do this every time, and on every
Route that requires library X to run. And why do this, when the Framework is
providing you a nice Dependency Injection Container that you can use throughout
your application. To register library X with the DIC, we are going to create a
Service Provider, and register library X there.

So, let's go ahead and create a **app/Provider/LibXProvider.php** file. Remember
the Provider class needs to have the **App\Provider**, and it needs to implement
the **\Pimple\ServiceProviderInterface** interface to be able to be registered
with the DIC. The interface also dictates that we have to provide a definition
for the **register** method. For more information please refer to the
`Pimple Container Documentation`_

So now, let's create that file, and load library X to the DIC::

    <?php
    namespace App\Provider;

    use Pimple\Container;

    class LibXProvider implements \Pimple\ServiceProviderInterface
    {
        public function register(Container $container)
        {
            $container["libX"] = function (Container $cont) {
                return new \Library\X($cont["libXRequirement"]);
            }
        }
    }

Now we just need to add the Provider class to the configuration, so the
Framework will register it automatically for us. So let's open up
**app/Config/app.php** configuration file, and add our class to the
*providerList* configuration item::

    $configuration["providerList"] = [
        // ...
        App\Provider\LibXProvider::class
        // ...
    ];

4.2 Using the new service
`````````````````````````

Great, now the Framework will register your provider each time when a request
to your application is made, now all there is to it, is to go ahead and use your
new service, Library X.

As you can see above, the library X has one dependency, that is being set from
the Container directly. Since the *Application* that you receive as the input
parameter to your Routes action is extending the *Pimple\Container*, you can set
that requirement directly to the Application, and you can access the Library X
through that same Application object. For the example, we are going to extend
The above "Hello name" Route action::

    // ...
                "action"    =>  function (
                    Request $request,
                    Response $response,
                    Application $application
                ) {
                    $application["libXRequirement"] = "LibX Needs Me";
                    $application["libX"]->doSomething();
                    // We need to say hello
                    $name = $request->get("name");
                    $message = "Hello {$name}! Nice to meet you!";
                    $response->addContent($message);
                }
    // ...

5 Congratulations
-----------------

Yes, it is that simple. Congratulations, you have just learned how to add 3rd
party components/libraries/etc to your application. Now, only sky is the limit.
You can freely install packages with composer, or you can install them in any
way you prefer, and load their files directly in the Provider.

For the time being, this is the only User Documentation that the Framework
provides, but we are looking to extend it as soon as possible. But this short
Getting Started Guide should have been enough to get you started.
