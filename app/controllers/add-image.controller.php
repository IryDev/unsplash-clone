<?php
session_start();
require_once '../config/config.php';

if (!isset($_POST['token']) || $POST['token'] != $_SESSION['csrf_article_add']) {
    die("<p>CSRF Token invalide</p>");
}

unset($_SESSION['csrf_article_add']);

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header('Location: ../views/signin.php');
    exit();
}


try {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $title = htmlspecialchars($_POST['title']);
        $description = htmlspecialchars($_POST['description']);
        if (isset($_FILES['image_file']) && $_FILES['image_file']['error'] !== UPLOAD_ERR_NO_FILE) {
            $image = $_FILES['image_file'];

            
            if ($image['error'] !== UPLOAD_ERR_OK) {
                throw new Exception("Erreur lors du téléchargement de l'image. Code d'erreur : " . $image['error']);
            }

            $image_data = file_get_contents($image['tmp_name']);
            $base64_image = base64_encode($image_data);

            
            if (!$db) {
                throw new Exception("La connexion à la base de données a échoué.");
            }

            $query = $db->prepare("INSERT INTO images (title, description, image_data) VALUES (:title, :description, :image_data)");
            $query->bindParam(':image_data', $base64_image);
            $query->bindParam(':title', $title);
            $query->bindParam(':description', $description);

            if ($query->execute()) {
                header('Location: ../views/dashboard.php');
                exit();
            } else {
                echo "Erreur : impossible d'ajouter l'image.";
            }
        } else {
            echo "Veuillez sélectionner une image.";
        }
    } else {
        header('Location: ../views/dashboard.php');
        exit();
    }
} catch (Exception $e) {
    echo "Une erreur s'est produite : " . $e->getMessage();
}
