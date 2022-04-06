<?php

$name = $_POST['name'];
$password = $_POST['password'];

if (isset($name) && !empty($name) && isset($password) && !empty($password)) {
    if ($name == 'admin' && $password == 'admin') {
        header('Location: ./PanelAdmin.php');
    } else {
        header('Location: ../Admin/Connect.php?error=Mot de passe incorrect');
    }
} else {
    header('Location: ../Admin/Connect.php?error=Veuillez remplir tous les champs');
}