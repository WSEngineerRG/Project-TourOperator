<?php
require __DIR__ . '/../../config/autoloader.php';
require __DIR__ . '/../../config/DB_Connect.php';
$manager = new Manager($db);

$id = $_POST['id'];
$location = $_POST['destination_location'];
$price = $_POST['destination_price'];
$operator_id = $_POST['New_Destination_Tid'];
var_dump($operator_id);
die;
$image = $_POST['destination_image'];

$verif = isset($location) && isset($price) && isset($operator_id) && isset($image) && !empty($location) && !empty($price) && !empty($operator_id) && !empty($image);

if ($verif) {
    $manager->updateDestinationById($id, $location, $price, $operator_id, $image);
    header("Location: ../Admin/PanelAdmin.php?success=la destination à bien était modifié");
} else {
    header('Location: ../Admin/PanelAdmin.php?error=Lors de la modification d\'une destination, il y a eu un problème');
}