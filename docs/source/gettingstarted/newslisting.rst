.. SlaxWeb Framework newslisting file, created by
   Tomaz Lovrec <tomaz.lovrec@gmail.com>

.. highlight:: php

News page
=========

The News page will be displaying the news found in the Database. For this to work,
we will also need to create a Database table, a couple of Views and Templates, and
most importantly, a Route.

Preparing the database
----------------------

For full help on the Database component, please refer to the :ref:`database component`
documentation. Once you have your database set up, we will create our news database
table. Note that we are using PostgreSQL database in this guide, if you are using
a non-compatible take care that you will properly execute the same steps in the
database of your choosing:

.. code-block:: sql

    CREATE TABLE IF NOT EXISTS "news" (
        "id" BIGSERIAL CONSTRAINT news_primkey PRIMARY KEY NOT NULL,
        "title" VARCHAR(256) NOT NULL,
        "body" TEXT NULL,
        "created_at" TIMESTAMP WITHOUT TIME ZONE NOT NULL DEFAULT (NOW() AT TIME ZONE 'UTC'),
        "updated_at" TIMESTAMP WITHOUT TIME ZONE NULL,
        "deleted" BOOLEAN NOT NULL DEFAULT FALSE
    );

Setting up the route
--------------------

Now we need to create a new empty route for our news listing page. For more information
about this, please refer to the :ref:`guide routes` part of this guide. Remember,
that our home page template includes a link to this page, we need to match that
URI with the URI of this route, which is in our case *news*::

    $this->_routes[] = [
        "uri"       =>  "news",
        "method"    =>  Route::METHOD_GET,
        "action"    =>  function (
            Request $request,
            Response $response,
            Application $app
        ) {
            // body
        }
    ];

And our route will also be available with the HTTP GET method only.

Template file
-------------

We already have the header and footer created in the :ref:`guide homepage` part
of this guide, so we wont need to worry about those any more, and we can simply
just create our news listing template file, **NewsList.php**::

    <?= $subview_head; ?>
    <div class="news-container">
        <?php foreach ($newsArticles as $article): ?>
            <div class="news-article">
                <h1><a href="news/<?= $article->id ?>"><?= $article->title; ?></a></h1>
                <p><?= $article->body; ?></p>
            </div>
        <?php endforeach; ?>
    </div>
    <?= $subview_foot; ?>

View class
`````````

As before, all *Templates* require a *View* class that will render the template,
and fill it with all the data. Our **NewsList.php** view file will require the **News**
model to obtain the news data which we will create a little bit further down this
page. For now, let's create our new *View* class::

    <?php
    namespace App\View;

    use App\Model\News as NewsModel;
    use SlaxWeb\View\Base as BaseView;

    class NewsList extends BaseView
    {
        protected $newsModel = null;

        public function init(NewsModel $newsModel): NewsList
        {
            $this->newsModel = $newsModel;
            return $this;
        }

        public function render()
        {
            $this->viewData["newsArticles"] = $this->newsModel->select(["id", "title", "body"]);
            return parent::render();
        }
    }

This time we have a bit more in the *View* class. We use the **init** method to
get all the dependencies, and override the **render** method to obtain all the data
from the database and inject it into the view data. At the end of the **render**
method we call the overridden method in the parent to actually render the view.

Model class
-----------

Now that we already have the *Template* and the *View* prepared, we need the *Model*
that will obtain the data for us from the database. The *Model* should extend from
the *BaseModel* provided by the *Database* component, as it provides us with many
already prepared methods that we can simply re-use, and we do not need to define
them, which saves us a lot of typing::

    <?php
    namespace App\Model;

    use SlaxWeb\Database\BaseModel;

    class News extends BaseModel
    {
    }

There we go, we simply define the class, and extend from the *BaseModel*. Right now,
we do not need anything else.

Bringing it all together
------------------------

You may be wondering, what about the *Controller*? This is the beauty of SlaxWeb
Framework, you do not need a *Controller* for every request, only when it makes
sense. And since there is no user input to control on this page, we can safely skip
it, and just wire everything together in the route definition::

    $newsModel = $app["loadModel.service"]("News");
    $app["loadView.service"]("NewsList", $newsModel)
        ->addSubView("head", $app["loadView.service"]("Head"))
        ->addSubView("foot", $app["loadView.service"]("Foot"))
        ->render();

By passing the **$newsModel** variable as the second parameter to the **loadView.service**
we will receive the *News* model instance as the first input parameter in the *View*
classes **init** method. And we just add the *Head* and *Foot* *SubViews* as we
did in the :ref:`guide homepage` part of this guide.

If you now fill the *news* database table by hand, and visit the **http://myslaxwebapp.com/news/**
URL you will see those news presented on a simple page. Congratulations! Now, take
a breather, and when you are ready, let's move on with displaying single news if
an ID is appended to the *news* URI.
