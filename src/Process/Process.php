<?php

require __DIR__ . '/../../config/autoloader.php';
require __DIR__ . '/../../config/DB_Connect.php';
$manager = new Manager($db);


$name = $_POST['name'];
$password = $_POST['password'];

if (isset($name) && !empty($name) && isset($password) && !empty($password)) {
    if ($name == 'admin' && $password == 'admin') {
        header('Location: ../Admin/PanelAdmin.php');
    } else {
        header('Location: ../Admin/Connect.php?error=Mot de passe incorrect');
    }
} else {
    header('Location: ../Admin/Connect.php?error=Veuillez remplir tous les champs');
}



