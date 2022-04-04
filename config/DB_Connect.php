<?php
    $db = new PDO('mysql:host=localhost;dbname=comparo_full', 'root', 'root');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
