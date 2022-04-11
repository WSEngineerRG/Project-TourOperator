<?php

require __DIR__ . '/../../config/autoloader.php';
require __DIR__ . '/../../config/DB_Connect.php';
$manager = new Manager($db);

$newOperatorName = $_POST['New_Operator_name'];
$newOperatorLink = $_POST['New_Operator_link'];


if (isset($newOperatorName) && !empty($newOperatorName) && isset($newOperatorLink) && !empty($newOperatorLink)) {
    $manager->addOperator($newOperatorName, $newOperatorLink);
    header('Location: ../Admin/PanelAdmin.php?success=Opérateur ajouté');
} else {
    header('Location: ../Admin/PanelAdmin.php?error=Lors de l\'ajout d\'un opérateur, il y a eu un problème');
}