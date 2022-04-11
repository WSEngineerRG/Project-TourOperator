<?php
require __DIR__ . '/../../config/autoloader.php';
require __DIR__ . '/../../config/DB_Connect.php';
$manager = new Manager($db);


$newDestinationsTid = $_POST['New_Destination_Tid'];
$newCertificateSign = $_POST['New_Certificate_name'];
$NewCertificateExpireAt = $_POST['New_Certificate_expire_at'];
$NewCertificateExpireAt = date('Y-m-d', strtotime($NewCertificateExpireAt));

$verification = isset($newDestinationsTid) && isset($newCertificateSign) && isset($NewCertificateExpireAt) && !empty($newDestinationsTid) && !empty($newCertificateSign ) && !empty($NewCertificateExpireAt);


if ($verification) {
    $manager->addCertificate($newDestinationsTid, $NewCertificateExpireAt, $newCertificateSign);
    header('Location: ./PanelAdmin.php?success=Certification ajoutée');
}else{
    header('Location: ./PanelAdmin.php?error=Certification non ajoutée');
}