.. SlaxWeb Framework homepage file, created by
   Tomaz Lovrec <tomaz.lovrec@gmail.com>

.. highlight:: html

Home Page
=========

Our home page will be a simple text page with a welcome text, and we will load it
in the root route that we already created in the :ref:`add route` section of the
documentation.

Template file
-------------

Our home page will be a simple static page, and thus will not require a controller,
or a model for operation. Lets go ahead and create our template file in **app/Template/**
directory. We are going to call it **Home.php**::

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>My first SlaxWeb App</title>
    </head>
    <body>
        <div id="wrapper">
            <div id="header">
                My first SlaxWeb App
            </div>
            <div id="body">
                <h1>Welcome to my first SlaxWeb App</h1>
                Click on the link bellow for some news.<br />
                <a href="news">News</a>
            </div>
            <div id="footer"><span id="copyright">Copyright (c) 2016</span></div>
        </div>
    </body>
    </html>

Breaking up the template
````````````````````````

Our template file is now a completely static file which includes the header and
footer are included into the same template. You will probably not want that, so we
will break it up a bit into three separate files, **Head.php**, **Home.php**, and
**Foot.php**. First the **Head.php**::

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>My first SlaxWeb App</title>
    </head>
    <body>
        <div id="wrapper">
            <div id="header">
                My first SlaxWeb App
            </div>

The **Home.php**::

            <div id="body">
                <h1>Welcome to my first SlaxWeb App</h1>
                Click on the link bellow for some news.<br />
                <a href="news">News</a>
            </div>

And the **Foot.php**::

            <div id="footer"><span id="copyright">Copyright (c) 2016</span></div>
        </div>
    </body>
    </html>

If you are wondering why we are doing this, consider a case where you have tens
of templates, and all of them include both the header and the footer, and now you
have to change something in the header and/or the footer. You will have to go through
each page, and change the same thing in all those pages. But if you have broken
them up, then you can simply do the change in the **Head.php** and the **Foot.php**
file files.

Loading the templates
---------------------

TBD
