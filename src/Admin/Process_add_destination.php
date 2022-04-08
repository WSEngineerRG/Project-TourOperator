<?php

require __DIR__ . '/../../config/autoloader.php';
require __DIR__ . '/../../config/DB_Connect.php';
$manager = new Manager($db);

$newDestinationsName = $_POST['New_Destination_name'];
$newDestinationsPrice = $_POST['New_Destination_price'];
$newDestinationsImage = $_POST['New_Destination_image'];
$newDestinationsTid = $_POST['New_Destination_Tid'];

if (isset($newDestinationsName) && !empty($newDestinationsName) && isset($newDestinationsPrice) && !empty($newDestinationsPrice) && isset($newDestinationsImage) && !empty($newDestinationsImage) && isset($newDestinationsTid) && !empty($newDestinationsTid)) {
    $manager->addDestination($newDestinationsName, $newDestinationsPrice, $newDestinationsTid, $newDestinationsImage);
    header('Location: ./PanelAdmin.php?success=Destination ajoutée');
} else {
    header('Location: ../Admin/PanelAdmin.php?error=Lors de l\'ajout d\'une destination, il y a eu un problème');
}