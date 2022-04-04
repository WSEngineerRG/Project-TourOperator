<?php
    function loadClass($classname)
    {
        require './Class/'.$classname.'.php';
    }

    spl_autoload_register('loadClass');
?>