<?php

require_once '../config/config.php';

if (isset($_GET['id'])) {
    $id = htmlspecialchars($_GET['id']);

    $query = $db->prepare("SELECT * FROM images WHERE id = :id");
    $query->bindParam(':id', $id);
    $query->execute();
    $image = $query->fetch();

    if ($image) {
        $query = $db->prepare("DELETE FROM images WHERE id = :id");
        $query->bindParam(':id', $id);

        if ($query->execute()) {
            unlink('../uploads/' . $image['filename']);
            header('Location: ../views/gallery.php');
            exit();
        } else {
            echo "Erreur : impossible de supprimer l'image.";
        }
    } else {
        echo "Erreur : image introuvable.";
    }
} else {
    header('Location: ../views/dashboard.php');
    exit();
}