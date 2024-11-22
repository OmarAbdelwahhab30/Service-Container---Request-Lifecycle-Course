<?php


$container = new \App\Core\Container();


$container->register("db", function () {
    $config = require BASE_PATH . 'config.php';

    $third = new \App\Database\Third();
    $second = new \App\Database\Second($third);
    $first = new \App\Database\First($second);
    return new App\Database\DB($config,$first);
});


\App\Core\Application::setContainer($container);