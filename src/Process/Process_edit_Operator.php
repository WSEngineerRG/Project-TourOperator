<?php

require __DIR__ . '/../../config/autoloader.php';
require __DIR__ . '/../../config/DB_Connect.php';
$manager = new Manager($db);

$id = $_POST['id'];
$name = $_POST['name'];
$link = $_POST['Link'];
$image = $_POST['Image'];
$verif = isset($name) && isset($link) && isset($image) && !empty($name) && !empty($link) && !empty($image);

if ($verif) {
    $manager->updateOperatorById($id, $name, $link, $image);
    header("Location: ../Admin/PanelAdmin.php?success=l'Operator à bien était modifié");
} else {
    header('Location: ../Admin/PanelAdmin.php?error=Lors de la modification d\'un operator, il y a eu un problème');
}