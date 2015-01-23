<?php
namespace Controller;

use \View\HelloWorld;

class Hello
{
    public function world()
    {
        new HelloWorld(["name" => "horseshit"]);
    }
}
