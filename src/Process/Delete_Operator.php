<?php
require __DIR__ . '/../../config/autoloader.php';
require __DIR__ . '/../../config/DB_Connect.php';
$manager = new Manager($db);

$id = $_POST['id_Operator'];
$verif = isset($id) && !empty($id);


if ($verif) {
    $manager->deleteOperatorById($id);
    header("Location: ../Admin/PanelAdmin.php?success=l'Operator à bien était supprimé");
} else {
    header("Location: ../Admin/PanelAdmin.php?error=lors de la suppression de l'Operator");
}