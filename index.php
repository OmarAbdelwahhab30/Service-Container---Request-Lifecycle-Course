<?php

require_once __DIR__ . '/vendor/autoload.php';
const BASE_PATH = __DIR__ . DIRECTORY_SEPARATOR;



$class = new ReflectionClass(\App\Database\DB::class);

dd($class->getConstructor());


require "bootstrap.php";

require 'routes.php';
