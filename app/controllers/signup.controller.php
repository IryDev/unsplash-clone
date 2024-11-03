<?php

require_once '../config/config.php';

if (isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['email']) && isset($_POST['username']) && isset($_POST['password'])) {
    $first_name = htmlspecialchars($_POST['first_name']);
    $last_name = htmlspecialchars($_POST['last_name']);
    $email = htmlspecialchars($_POST['email']);
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    if (!empty($first_name) && !empty($last_name) && !empty($email) && !empty($username) && !empty($password)) {
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        $query = $db->prepare("INSERT INTO users (first_name, last_name, email, username, password, role) VALUES (:first_name, :last_name, :email, :username, :password, 'user')");

        $query->bindParam(':first_name', $first_name);
        $query->bindParam(':last_name', $last_name);
        $query->bindParam(':email', $email);
        $query->bindParam(':username', $username);
        $query->bindParam(':password', $hashed_password);

        if ($query->execute()) {
            header('Location: ../views/signin.php');
            exit();
        } else {
            
            echo "Erreur : impossible de créer le compte.";
        }
    } else {
        
        echo "Veuillez remplir tous les champs du formulaire.";
    }

} else {
   
    header('Location: ../views/signup.php');
    exit();
}
