.. SlaxWeb Framework installation file, created by
   Tomaz Lovrec <tomaz.lovrec@gmail.com>

.. highlight:: php
.. _composer: https://getcomposer.org
.. _composer basic usage documentation: https://getcomposer.org/doc/01-basic-usage.md
.. _GitHub Release pages: https://github.com/SlaxWeb/Framework/releases

.. _0.3.1: https://github.com/SlaxWeb/Framework/releases/download/0.3.1/slaxweb-framework-0.3.1.zip
.. _0.3.0: https://github.com/SlaxWeb/Framework/releases/download/0.3.0/slaxweb-framework-0.3.0.zip

Installation
============

SlaxWeb Framework at the time has two very simple installation methods. We provide
ready to use packages, which you just unpack on your local development environment
or on your production server, and we also provide the whole framework in a *composer*
package from which you can simply create your project with composer_.

This installation document will guide you through both ways. If you are not comfortable
with using composer, you may proceed to manual installation using prepared packages,
but we strongly suggest you use *composer*, because the SlaxWeb Framework is built
around it, and its command line tool strongly depends on it.

Preparing the environment
-------------------------

To prepare the environment for SlaxWeb Framework ensure that you have installed the
requirements. To familiarize with its requirements please see :ref:`framework requirements`.

To follow the examples in this documentation, you will need the following requirements
installed:

* PHP 7.0
* Web Server (Nginx or Apache)

Some parts of the documentation will require you to have an available composer_
installation, but alternate ways are also provided, so it is not a hard requierment.

Once all the requirements are installed, you need to decide where you want to install
the SlaxWeb Framework in the first place. We will use **/var/www/** as the parent
directory of the SlaxWeb Framework installation directory throughout this documentation,
you are of course, free to install it in a different location.

.. _install with composer:

Install with composer
---------------------

To install SlaxWeb Framework with composer_, you first need to have composer installed
in your environment. We asume that you know the basics of *composer*, if you however,
are unfamiliar with *composer* we strongly suggest you first learn the basics of
*composer* by reading the `composer basic usage documentation`_.

If you wish to install manually, then please skip down to :ref:`install from package`.

We asume that you have composer available directly under *composer* executable, if
this is not the case, then replace it with the way that you run composer commands.
Before you start the installation, make sure you are in the right location, and then
just simply execute the *create-project* composer command:

.. code-block:: bash

    cd /var/www/
    composer create-project slaxweb/framework

This will start the installation of the latest version of SlaxWeb Framework and
its dependencies into the **framework** directory. Just wait a little bit for composer
to download and install all of the required packages, and you have successfuly installed
SlaxWeb Framework. Yes it's that simple.

If you would like to install the Framework into a different directory or from an
older version or the next development snapshot, then you will have to change the
above command slightly:

.. code-block:: bash

    composer create-project slaxweb/framework directory version

Where **directory** has to be a valid directory name for your system and version
needs to be one of the following:

* **dev-develop** - current development snapshot
* **0.3.1** - Latest release
* **0.3.0**

.. _install from package:

Install from prepared package
-----------------------------

To install SlaxWeb Framework from a prepared package, you will first have to download
it, from the `GitHub Release pages`_, or find the appropriate download link, a little
bit down this document. When installing from a prepared package, there currently
is no way of installing the latest development snapshot, and you will have to use
the composer from :ref:`install with composer` section above.

To begin installation we are first going to download the desired version package
from the following list:

* `0.3.1`_ - Latest
* `0.3.0`_

After download is completed, you are going to need to unzip the archive:

.. code-block:: bash

    cd /var/www/
    wget https://github.com/SlaxWeb/Framework/releases/download/<version>/slaxweb-framework-<version>.zip
    unzip slaxweb-framework-*.zip

And there you go, you have installed SlaxWeb Framework from a prepared package to
the **slaxweb-framework-<version>** directory. You can now freely rename the directory,
and remove the archive.
