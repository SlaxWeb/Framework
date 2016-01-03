<?php
$this->_router->get()->name("/")->action(function() {
    echo "Default route";
});

$this->_router->name("hello")->action(["\\Controller\\Hello", "world"]);
