<?php

namespace App\Database;

use PDO;
use PDOException;

class DB
{
    private $pdo;
    private $config;

    // Constructor to accept the config array
    public function __construct($config)
    {
        $this->config = $config;
        $this->connect();
    }

    // Connect to the database
    private function connect()
    {
        try {
            $this->pdo = new PDO(
                "mysql:host={$this->config['db']['host']};dbname={$this->config['db']['dbname']}",
                $this->config['db']['user'],
                $this->config['db']['password']
            );
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }
    }

    // Helper function for SELECT queries
    public function select($query, $params = [])
    {
        $stmt = $this->pdo->prepare($query);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Helper function for a single SELECT query
    public function selectOne($query, $params = [])
    {
        $stmt = $this->pdo->prepare($query);
        $stmt->execute($params);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Helper function for INSERT queries
    public function insert($query, $params = [])
    {
        $stmt = $this->pdo->prepare($query);
        $stmt->execute($params);
        return $this->pdo->lastInsertId();
    }

    // Helper function for UPDATE queries
    public function update($query, $params = [])
    {
        $stmt = $this->pdo->prepare($query);
        return $stmt->execute($params);
    }

    // Helper function for DELETE queries
    public function delete($query, $params = [])
    {
        $stmt = $this->pdo->prepare($query);
        return $stmt->execute($params);
    }
}
