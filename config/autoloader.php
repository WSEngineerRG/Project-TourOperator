<?php
    function loadClass($classname)
    {
        require __DIR__ .  '/../class/'.$classname.'.php';
    }

    spl_autoload_register('loadClass');
?>
