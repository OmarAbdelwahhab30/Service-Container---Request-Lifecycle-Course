<?php


$container = new \App\Core\Container();


$container->register("db", function () {
    $config = require BASE_PATH . 'config.php';
    return new App\Database\DB($config);
});


\App\Core\Application::setContainer($container);