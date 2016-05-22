.. SlaxWeb Framework mvc file, created by
   Tomaz Lovrec <tomaz.lovrec@gmail.com>

.. _MVC: https://en.wikipedia.org/wiki/Model%E2%80%93view%E2%80%93controller

Model-View-Controller
=====================

The Model-View-Controller, or MVC for short, pattern has dominated Web Application
Development lately, and we tend to abide it since we strongly agree with that for
what it was intended. Neatly separate code, so our applications are not just a clutter
of code "*smacked*" together. However, the SlaxWeb Framework will not try to force
it upon you, you are building your application, not the Framework. But unfortunately
all our official components are built with MVC in mind, which might make integration
and usage a bit more difficult.

If you have never heard of MVC_ before, we suggest you read up on it a bit, and
give this page a read as well. The Framework already provides you with a directory
structure that is MVC compliant in the :ref:`app dir`.

.. _models:

Models
------

The Model component corresponds to all the data related logic that the visitor works
with. This can represent either the data that is being transferred between the View
and Controller components or any other business logic related data. For example,
a Customer object will retrieve the customer information from the database, manipulate
it and update it data back to the database or use it to render data.

All Model class definitions must be defined in the **\\App\\Model** namespace and
in the **app/Model/** directory in order to have them autoloaded by the composer
:ref:`composer autoloader section`. You can, of course, easily change both of those
settings in the composer autoloader. Please see :ref:`change autoloader` for more
information.

Views
-----

The View component is used for all the UI logic of the application. For example,
the Customer view would include all the UI components such as text boxes, dropdowns,
etc. that the final user interacts with.

A View can be a flat HTML file, a PHP file that you add to the Response object,
or it can be a sophisticated class which loads such flat files, populates them with
data, and renders them, then adds the rendered template to the Response object.

All such View class definitions must be defined in the **\\App\\View** namespace
and in the **app/View/** directory in order to have them autoloaded by the composer
:ref:`composer autoloader section`. You can, of course, easily change both of those
settings in the composer autoloader. Please see :ref:`change autoloader` for more
information.

.. _controllers:

Controllers
-----------

Controllers act as an interface between Model and View components to process all
the business logic and incoming requests, manipulate data using the Model component
and interact with the Views to render the final output. For example, the Customer
controller would handle all the interactions and inputs from the Customer View and
update the database using the Customer Model. The same controller would be used
to view the Customer data.

All Controller class definitions must be defined in the **\\App\\Controller** namespace
and in the **app/Controller/** directory in order to have them autoloaded by the
composer :ref:`composer autoloader section`. You can, of course, easily change both
of those settings in the composer autoloader. Please see :ref:`change autoloader`
for more information.
