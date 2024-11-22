<?php

if ($_SERVER['REQUEST_URI'] === '/' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    require BASE_PATH .'src/Users/fetch.php';
}


// Store user (create user)
if ($_SERVER['REQUEST_URI'] === '/store' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    require BASE_PATH .'src/Users/store.php';
}


if ($_SERVER['REQUEST_URI'] === '/delete' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    require BASE_PATH .'src/Users/delete.php';
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && !in_array($_SERVER['REQUEST_URI'], [
        '/',
        '/store',
        '/delete'
    ])) {
    http_response_code(404);
    echo "404 Not Found";
}
