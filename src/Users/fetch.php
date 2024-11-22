<?php


$db = \App\Core\Application::Container()->resolve('db');


$query = "SELECT * FROM users";
$users = $db->select($query);

// Include the view to display users
require BASE_PATH.'src/views/home.php';
