<?php

require __DIR__ . '/../../config/autoloader.php';
require __DIR__ . '/../../config/DB_Connect.php';
$manager = new Manager($db);

$name = $_POST['name'];
$message = $_POST['Avis'];
$id = $_POST['id'];
$score = $_POST['rating3'];
$author_id = $manager->getAuthorByName($name);

$author_exist = $manager->ifAuthorExist($name);
$verify = isset($name) && isset($message) && isset($id) && isset($score) && !empty($name) && !empty($message) && !empty($id) && !empty($score);


if($author_exist == false && $verify == true) {
     $id = $this->db->lastinsertid();

    $query = "INSERT INTO comparo_full.author (`id`, `name`) VALUES (?,?)";
    $this->db_prepare($query)->execute([$id, $name]);
}else{
    $manager->addReview($message, $id, $author_id['id']);
    $manager->addScore($id, $score, $author_id['id']);
    header('Location: ../../index.php');
}