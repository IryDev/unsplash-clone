<?php

session_start();

require_once '../config/config.php';

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    if (!empty($email) && !empty($password)) {

        $query = $db->prepare("SELECT * FROM users WHERE email = :email");
        $query->bindParam(':email', $email);
        $query->execute();
        $user = $query->fetch();

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];
            header('Location: ../views/dashboard.php');
            exit();
        } else {
            echo "Email ou mot de passe incorrect.";
        }
    } else {
        echo "Veuillez remplir tous les champs.";
    }
} else {
    header('Location: ../views/signin.php');
    exit();
}
