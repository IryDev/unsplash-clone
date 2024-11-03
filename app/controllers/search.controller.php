<?php

require_once '../config/config.php';

$search = isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '';

if ($search !== '') {
    $query = $db->prepare("SELECT * FROM images WHERE description LIKE :search");
    $query->bindValue(':search', '%' . $search . '%');
    $query->execute();
} else {

    $query = $db->query("SELECT * FROM images");
}

$images = $query->fetchAll();