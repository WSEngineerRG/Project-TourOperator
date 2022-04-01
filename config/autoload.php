<?php


function autoload($classname)
{
    require __DIR__ . "/../class/" . $classname . '.php';
}

spl_autoload_register('autoload');

?>