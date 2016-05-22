.. SlaxWeb Framework architecture file, created by
   Tomaz Lovrec <tomaz.lovrec@gmail.com>

.. _dependency injection container: https://en.wikipedia.org/wiki/Dependency_injection
.. _here: http://pimple.sensiolabs.org/
.. _pimple documentation for writing providers: http://pimple.sensiolabs.org/#extending-a-container

Software Architecture
=====================

The SlaxWeb Framework is built with the `dependency injection container`_ pattern.
This provides you with simple loading of all the components, and provides you with
more possibilities to consume 3rd party libraries, or your code. But as with anything
you are not required to do so, there are always different ways to do so, but since
there are too many possibilities, we can not cover them all in our documentation,
so we will focus only on using the *DIC*.

.. _services:

Services and Properties
-----------------------

The *DIC* or container holds two types of data, **properties**, which are just simple
data values, like strings, integers, arrays, and so on, and **services**, which
are objects of components, classes, libraries etc. that are automatically instantiated
when you or the Framework first calls them, and takes care of the called components,
classes, libraries, and so on, dependencies on its own, so you do not have to worry
about this.

The container is passed in to your code as one of the input parameters from the
router, and is of instance **\\SlaxWeb\\Bootstrap\\Application**. For more information,
please read the :ref:`router component` documentation.

The container in use is not developed by our team, but rather a 3rd party container
is used. You can find its documentation here_.

To distinguish between a *service* and a *property*, the Framework appends *".service"*
to the name of the service, and no appendix is used for properties. Some services
are also defined as factories, such services have the *".factory"* appendix.

Full list of services and factories:

* *TBD*

Full list of properties:

* *TBD*

.. _providers:

Providers
---------

Providers are classes that define further services and properties for the application,
the Framework already defines a couple of Providers, and you can define your own,
should you wish to.

The Providers have to be defined in the **\\App\\Provider** namespace and in the
**app/Provider/** directory in order to be autoloaded. For more information on how
to write providers for the container, please refer to the `pimple documentation for
writing providers`_. Of course, as with everything else, you can freely move the
Provider definitions into a different directory and/or namespace, just do not forget
to update the autoloader. Please see :ref:`change autoloader` for more information.

When the provider is autoloaded, it still needs to be registered with the container.
The Framework will do this for you automatically. All you need to do is add the
class name to the *providerList* in the **app.conf** configuration file. For more
information please refer to the :ref:`config component`.
