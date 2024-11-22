<?php


$db = \App\Core\Application::Container()->resolve('db');

$userId = $_POST['id'] ?? null;

if ($userId) {
    // Prepare the delete query
    $query = "DELETE FROM users WHERE id = :id";
    $params = ['id' => $userId];

    // Execute the delete
    $db->delete($query, $params);

    // Redirect to the user list
    header('Location: /');
    exit;
} else {
    echo "Invalid user ID!";
}