<?php

try {
    $db = new PDO('mysql:host=db;port=3306;dbname=unsplash_clone', 'root', 'root');
} catch (PDOException $e) {
    die($e->getMessage());
}