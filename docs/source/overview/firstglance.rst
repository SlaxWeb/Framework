.. SlaxWeb Framework firstglance file, created by
   Tomaz Lovrec <tomaz.lovrec@gmail.com>

.. _Composer Lock File: https://getcomposer.org/doc/01-basic-usage.md#composer-lock-the-lock-file
.. _here: https://getcomposer.org/doc/01-basic-usage.md#autoloading

First glance at the framework
=============================

Now that you have successfuly installed SlaxWeb Framework, you can finally take
a first glance at the complete framework. We will primarily focus on the directory
structure in this part of the documentation. It is strongly advised that you do
not skip this part of the documentation, as it holds information that will make
developing application with the SlaxWeb Framework a lot easier.

Root directory
--------------

Root directory contains quite a bit of files and directories. Here is the whole
of files and directories that you should see in the directory into which you installed
the SlaxWeb Framework. If you have followed the :ref:`installation` guide on the
previous page, this should be in **/var/www/framework**:

* **app/** - :ref:`app dir`
* **bootstrap/** - :ref:`bootstrap dir`
* **docs/** - :ref:`docs dir`
* **public/** - :ref:`pub dir`
* **CHANGELOG.md** - Changes between version in the framework
* **composer.json** - :ref:`composer.json file`
* **composer.lock** - `Composer Lock File`_
* **docker-compose.yml** - :ref:`docker container`
* **LICENSE** - License file
* **README.md** - Short read me file, containing basic information
* **slaxer** - :ref:`slaxer component`

Above is only a simple list of all the directories and files that you will find
in the root directory. Some directories and files do not have links attached, since
they are simple enough to be explained in one sentence. For others, you may continue
reading here, or click on the links above.

.. _app dir:

Main Application directory
--------------------------

Main Application directory is located in **app/**, in here you can find more directories
into which you put you application files. This directory structure has been prepared
for you, but you are not required to use it as is. Here, you will only find a list
of all the directories and files found in the Main Application directory, further
description of those directories that require more description can be found by their
respective component documentation, but some are simple enough so that they can
be explained with one or two short sentences right by the list:

* **Cache/** - Cache directory where different components, and your code, can write
  temporary cache files
* **Command/** - :ref:`slaxer component`
* **Config/** - :ref:`config component`
* **Controller/** - :ref:`controllers`
* **Hook/** - :ref:`hook component`
* **Library/** - :ref:`libraries`
* **Logs/** - :ref:`logger component`
* **Model/** - :ref:`models`
* **Provider/** - :ref:`providers`
* **Routes/** - :ref:`router component`
* **Template/** - :ref:`template dir`
* **View/** - :ref:`view dir`

.. _bootstrap dir:

Bootstrap directory
-------------------

Bootstrap directory is located in **bootstrap/**, and it holds vital logic for starting
of the Framework. You are not required to change anything in those files, and we
strongly advise you do not change anything in here. SlaxWeb Framework is designed
to be highly modular and adaptable, we are sure there are other ways to do, whatever
it is that you are trying to do.

.. _docs dir:

Documentation directory
-----------------------

The Documentation directory hold documentation sources, and is located in **docs/**.
You can safely remove this directory, and we also strongly advise, that you **do**
remove this directory before deploying on a production server. If you are contributing
code to the SlaxWeb Framework Project, you are required to update the documentation
found in this directory.

.. _pub dir:

Public directory
----------------

Public directory is located in **public/**, and holds all the files that must be
publicly available through a Web Server, so you can show your web application to
the world. Those files typically include:

* index.php - the main entry point for all document requests
* CSS files - to give your applycation some style
* JavaScript files - to give your *front end* some functionality
* Images - because text only web pages are dull

After you have installed the framework, there are already directories prepared for
those files. They are pretty self explainatory, and are not documented here. Of
course, you can choose to rename those directories, or remove them completely. Just
remember, this should be the only directory visible to the outside world through
a Web Server in order to protect your application code from possible leaks.

.. _composer.json file:

Composer Files
--------------

Even if you have not installed SlaxWeb Framework with the help of *composer*, you
will still find the *composer.json* and *composer.lock* files in the root of the
installed SlaxWeb Framework, because we use *composer* extensively for development
of the Framework, for maintaining all the dependencies that the Framework has.

Those files are not particularly required to run an application on the framework,
however, you might need them at a later point, so it is advised that you do not
remove them.

Autoloader
``````````

One of the feature that the Framework relies on *composer*, is the composer autoloader.
It loads Class source files automatically when requested. Read more about it here_.
The Framework already defines the following *namespace* to *path* mappings for the
autoloader:

* **App\\Command\\**: app/Command/,
* **App\\Controller\\**: app/Controller/,
* **App\\Hook\\**: app/Hook/,
* **App\\Library\\**: app/Library/,
* **App\\Model\\**: app/Model/,
* **App\\Provider\\**: app/Provider/,
* **App\\Routes\\**: app/Routes,
* **App\\View\\**: app/View/

Those can of course freely be changed, but you will need **composer** installed
in order to update the autoloader. If you do not understand this part yet, do not
worry, it will be explained in the later sections of this documentation.

Templating
----------

SlaxWeb Framework does not provide means for templating of your web application,
but does provide you with directories that you can store your templates and views
into, but in you have to take care of loading, parsing, and presenting them to the
world on your own. For now.

.. _template dir:

Template directory
``````````````````

The Template directory is located in **app/Template/** and is meant to hold all
of your template files, which you then load in your View Classes to present to the
world. This directory should not publicly visible, as you will find explained bellow
in :ref:`pub dir` section.

.. _view dir:

View directory
``````````````

The View directory is located in **app/View/** and is meant to hold all View Class
files. Such classes are supposed to help the route handler and/or controller to
present a bunch of templates to the world as a full blown web page.
