.. SlaxWeb Framework installation file, created by
   Tomaz Lovrec <tomaz.lovrec@gmail.com>

.. highlight:: bash
.. _composer: https://getcomposer.org
.. _composer basic usage documentation: https://getcomposer.org/doc/01-basic-usage.md
.. _GitHub Release pages: https://github.com/SlaxWeb/Framework/releases

.. _0.3.1: https://github.com/SlaxWeb/Framework/releases/download/0.3.1/slaxweb-framework-0.3.1.zip
.. _0.3.0: https://github.com/SlaxWeb/Framework/releases/download/0.3.0/slaxweb-framework-0.3.0.zip

.. _installation:

Installation
============

SlaxWeb Framework can be installed using either of the two available 
installation methods. This installation document will 
guide you through both of the available ways. The first one requires 
unpacking the ready to use packages in your local development environment 
or on your production server. The second one being using the `composer` 
packages from which you can create a project with it. Using the `composer` 
packages is the recommended way of installation, because, the SlaxWeb Framework is built
around it, and its command line tool strongly depends on it, however,
if you are not very comfortable doing that, follow the manual installation 
steps for using prepared packages.

Preparing the environment
-------------------------

Prerequisites for the SlaxWeb Framework are:
* PHP 7.0
* Web Server (Nginx or Apache)

Some steps during the installation will require you to have composer_ installed,
however alternate ways have been listed if composer_ is not available.
You need to choose a parent directory for SlaxWeb Framework installation, we will be 
using **/var/www/** as the parent.

.. _install with composer:

Install with composer
---------------------

To install SlaxWeb Framework with composer_, you first need to have composer_ installed
in your environment. Please refer to this [guide](https://getcomposer.org/doc/01-basic-usage.md) 
for details about the usage of composer_.

We assume that you have composer available directly under *composer* executable, if
this is not the case, then replace composer_ with the way that you run composer commands.
Before you start the installation, make sure you are in the right location, and then
just simply execute the *create-project* composer command:

   cd /var/www/
   composer create-project slaxweb/framework

This will start the installation of the latest version of SlaxWeb Framework and
its dependencies into the **framework** directory. This might take a little while,
and when it's done, SlaxWeb Framework is successfully installed.

If you would like to install the Framework into a different directory, upgrade from
an older version or the next development snapshot, use this command:

   composer create-project slaxweb/framework directory version

Where **directory** should be a valid directory name and version
needs to be one of the following:

* **dev-develop** - current development snapshot
* **0.3.1** - Latest release
* **0.3.0**

.. _install from package:

Install from prepared packages
-----------------------------

Download the prepared packages from [here](https://github.com/SlaxWeb/Framework/releases).
There is currently no way of installing the latest development snapshot, refer to this
:ref:`install with composer` for installation using `composer`.

The following versions are available till date:
 * `0.3.1`_ 
 * `0.3.0`_

Once you have the prepared packages, run the following commands:

   cd /var/www/
   wget https://github.com/SlaxWeb/Framework/releases/download/<version>/slaxweb-framework-<version>.zip
   unzip slaxweb-framework-*.zip

And there you go, you have installed SlaxWeb Framework from a prepared package to
the **slaxweb-framework-<version>** directory. You can rename the directory post-installation,
and remove the archive.
