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

            <?= $subview_head; ?>
            <div id="body">
                <h1>Welcome to my first SlaxWeb App</h1>
                Click on the link bellow for some news.<br />
                <a href="news">News</a>
            </div>
            <?= $subview_foot; ?>

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

Preparing the view classes
--------------------------

Each Template needs an associated View class located in the **app/Views/** directory.
A View class can be considered as a *presenter*, as it can be used to prepare all
the data and sub-views that will be presented in the template. Lets go ahead and
create a View class for our Home page template:

.. code-block:: php

    <?php
    namespace App\View;

    use SlaxWeb\View\Base as BaseView;

    class Home extends BaseView
    {
    }

This is it, by keeping the base name of the class, *Home* the same as the name of
the Template file, *Home.php*, the View class will automatically load that Template
file when rendering the view.

Be sure to create the View classes for **Head** and **Foot** as well! We are going
to need them.

Rendering the view
------------------

Now we have everything prepared so we can simply render the view. We are going to
do this in the route that we defined in :ref:`add route` section before, and put
this code snippet in the body of the definition:

.. code-block:: php

    $app["loadView.service"]("Home")
        ->addSubView("head", $app["loadView.service"]("Head"))
        ->addSubView("foot", $app["loadView.service"]("Foot"))
        ->render();

Now you can go ahead and refresh your browser window, and you will be greeted by
our new simple home page. But to explain what is happening here, we are using the
*loadView* service and passing it the name of the View class as the input parameter
which returns an object to it, in our case, the *Home* object. We then call *addSubView*
twice on that object, to add the *Head* and *Foot* View objects as Sub-Views to our
main *Home* View object. The first parameter is a custom name of the Sub-View, which
is then prepended with **subview_** and injected into the main view as a view variable.
So in our case we have two view variables, **subview_head** and **subview_foot**,
which we are already printing out in the **Home.php** Template file.

Our home page is now complete. Lets create a *News page* now!
