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
:ref:`composer autoloader section`. You can, of course, easily change both of those settings
in the composer autoloader. Please see :ref:`change autoloader` for more information.
