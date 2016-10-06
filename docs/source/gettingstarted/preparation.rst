.. SlaxWeb Framework routes file, created by
   Tomaz Lovrec <tomaz.lovrec@gmail.com>

.. highlight:: bash

Prepare the Framework
=====================

With the clean installation of the Framework you get a fully functional micro-framework,
where you have to take care of everything, from database connections, session handling,
and so on. But the Framework provides you with many installable components. To see
a full list of components, please refer to the :ref:`components` page.

This section of the documentation will teach you the basics around components and
how to install them. We will also install all the components that we will require
in order to get this example application running.

What are components?
--------------------

The SlaxWeb Framework is composed with many different components. A Framework component
is basically a small part of the Framework. Some components are essentials for the
Framework to function, like a *Router*, while it can function just fine without some
of the components, like a *Session* component. The clean installation of the Framework
already includes the following uninstallable components:

* Bootstrap
* Config
* Logger
* Hooks
* Router
* Slaxer

While this is enough to get started with application development, there are other
components available to simplify tasks, like handling *sessions*, *database* operations,
*templating*, and so on. You may ask yourself, why not include *all* the components
into the Framework, and not have me worry about what to install and what not. This
would be a valid move, but the core Framework would such be polluted with components
that you will not need for the development of your application, replacing of a component
might be more complicated if completely possible without hauling the unused component
behind, and would probably come without a tool that simplifies the installation
of these components.

What we will need
`````````````````

We are developing a simple news website, where we want to save our news into a database
table, and present the saved ones on a page. For this we will need the **View**
component to simplify templating, and the **Database** component so we can actually
store and retrieved our news.

Installing the components
-------------------------

To make your life easier, Framework comes with a nice tool, **slaxer** (pronounced
as *slacker*) from the *Slaxer* component. *slaxer* provides many different functionalities,
but at this moment we are most interested in the component installation functionality,
which will let us install components. Lets go ahead and install our first component::

    ./slaxer component:install view

That's it, *slaxer* will try to find and install the component for you, and check
if there are available *sub-components* for the installing component. To find out
more about *sub-components* please refer to the :ref:`components` page. We do not
require a *sub-component* in this example application, so make sure you select *None*
when asked to install a *sub-component*. Now we just need to install the *Database*
component::

    ./slaxer component:install database

Follow the on-screen instructions and once again, skip any *sub-component* installation.
Now we have the Framework prepared, and we can start with our example application
development.
