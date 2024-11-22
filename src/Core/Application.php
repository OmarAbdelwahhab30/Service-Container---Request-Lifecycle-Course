<?php

namespace App\Core;

class Application
{

    public static $container ;

    public static function setContainer($container){
        static::$container = $container;
    }

    public static function Container(){
        return static::$container;
    }


}