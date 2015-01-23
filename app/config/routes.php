<?php
$router->get()->name("/")->action(function() {
    echo "Default route";
})->store();

$router->name("hello")->action(["Hello", "world"])->store();
