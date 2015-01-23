<?php
$router->get()->name("/")->action(function() {
    echo "Default route";
})->store();
