.. SlaxWeb Framework mvc file, created by
   Tomaz Lovrec <tomaz.lovrec@gmail.com>

.. _highlight: bash
.. _.htaccess: https://httpd.apache.org/docs/2.4/howto/htaccess.html
.. _Built-in web server: http://php.net/manual/en/features.commandline.webserver.php
.. _swoole extension for php: https://github.com/swoole/swoole-src
.. _composer: https://getcomposer.org/

.. _webserver setup:

Setting up a WebServer
======================

The first thing to do, in order to bring the application that you are going to build
with the SlaxWeb Framework, to the web, is to set up a Web Server. We will not cover
the whole setting up process of a Web Server, but just the virtual host definition.
If you are unsure of how you would set up a Web Server, please refer to the documentation
of your chosen Web Server. This guide covers only 5 methods of how to bring your
application built with the SlaxWeb Framework to the web, 2 of which are with conventional
Web Servers, the other 3 are a little less conventional. Of course there are other
options as well, but are beyond the reach of this documentation.

Keep in mind, that when setting up your Web Server, only the :ref:`pub dir` should
be visible to the outside world, to protect your code from potential exposure. The
:ref:`installation` presumed you installed the Framework in the **/var/www/framework/**
directory, and so does this section as well.

.. _nginx conf:

Nginx + PHP-FPM
---------------

This is a sample nginx configuration file, to serve your application on **myslaxwebapp.com**
domain and port **80**, and configured to connect to a PHP-FPM network socket listening
on localhost, port 9000::

    server {
        listen                  *:80;

        server_name             myslaxwebapp.com;
        client_max_body_size    1m;

        root                    /var/www/framework/public/;
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

This configuration will also set up logging in **/var/log/nginx/** with two files,
**myslaxwebapp.access.log** which logs all requests to the web site, and **myslaxwebapp.error.log**
for all errors that occurred while processing the requests.

At the same time, this configuration will enable you to use clean URLs without *index.php*
in the URL.

Apache + mod_php
----------------

Same as with the :ref:`nginx conf` this Apache configuration also configures a virtual
host to serve your application on the **myslaxwebapp.com** domain and port **80**,
but will however not connect to PHP-FPM, but instead use the **mod_php** Apache
module to process requests::

    <VirtualHost *:80>
        DocumentRoot        /var/www/framework/public
        ServerName          myslaxwebapp.com

        <Directory /var/www/framework/public>
            Options         -Indexes +FollowSymLinks
            AllowOverride   All
            Require         all granted
        </Directory>

        LogLevel warn
        ErrorLog            /var/log/apache2/error.myslaxwebapp.com.log
        CustomLog           /var/log/apache2/access.myslaxwebapp.com.log combined
    </VirtualHost>

The configuration also sets up logging in the **/var/log/apache2/** directory with
two files, **access.myslaxwebapp.com.log** to log all requests to the application,
and **error.myslaxwebapp.com.log** to log all errors that occurred while processing
those requests.

Hiding index.php in the URL
```````````````````````````

Unfortunately this Apache configuration does not outright hide the *index.php* in
the URL as the :ref:`nginx conf` configuration does. For this to work with Apache
you will need a `.htaccess`_ file in the :ref:`pub dir` with the following contents::

    RewriteEngine on
    RewriteCond $1 !^(index\.php|img|css|js|robots\.txt)
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteRule ^(.*)$ index.php/$1 [L,QSA]

This simple configuration file will rewrite all URLs that are not translated into
an existing file to be routed through the *index.php* file. You just need to make
sure that you have the Rewrite module for Apache installed.

Built-in PHP server
-------------------

Since PHP version 5.4.0, the CLI SAPI provides a built-in web server. Since this
is a single threaded process this will block multiple concurrent requests, and is
such not recommended to be used in production. You can however use it safely in
while developing your application, meaning that you do not need a full blown web
server to develop your application on the Framework. The built-in web server also
automatically *hides* the *index.php* file from the URLs. For more information on
the built-in web server please read the `Built-in web server`_ documentation on
the web server.

To start the Built-in web server just position yourself into the :ref:`pub dir`, and
start it. The example command will start the listener on the **localhost** domain
port **80**::

    cd /var/www/framework/public
    php -S localhost 8000

SlaxWeb App Server
------------------

The SlaxWeb App Server aims to provide a fast web server to squeeze the last bits
of performance out of your application. To achieve this, it relies on the high performance
`swoole extension for php`_.

The App Server is to be considered experimental, and we do not recommend on using
it in a production environment for now!

If you wish to familiarize yourself with the SlaxWeb App Server, please first read
the :ref:`slaxer component` documentation, since the App Server is installed and
controlled from it.

To install the appserver, position yourself to the root install directory of the
framework and install the component with **slaxer**::

    cd /var/www/framework
    ./slaxer component:install appserver

Note that in order to install components with **slaxer** you will need composer_
installed and available in your path!

After the component has been installed, you need to start the server::

    ./slaxer server start

For more information about the SlaxWeb App Server please refer to the :ref:`app
server component` documentation.
