<?php

namespace App\services;

class Autoloader
{
    public function loadClass($className)
    {
        $className = str_replace(
            ['App\\', '\\'],
            [dirname(__DIR__) . '/', '/'],
            $className
        );

        $file = $className . '.php';
        if (file_exists($file)) {
            require_once($file);
        }
     }

}
