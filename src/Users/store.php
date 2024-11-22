<?php

$db = \App\Core\Application::Container()->resolve('db');



// Get the POST data
$name = $_POST['username'] ?? null;
$password = $_POST['password'] ?? null;

if ($name && $password) {
    // Hash the password before saving
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    // Insert the user into the database
    $query = "INSERT INTO users (username,password) VALUES (:name, :password)";
    $params = [
        'name' => $name,
        'password' => $hashedPassword
    ];
var_dump($_POST);
    $userId = $db->insert($query, $params);

    header('Location: /');
    exit;
} else {
    // Handle the error or invalid input
    echo "All fields are required!";
}
