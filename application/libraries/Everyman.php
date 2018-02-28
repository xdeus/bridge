<?php
class Everyman
{
    public function __construct()
    {
        spl_autoload_register(array($this,'autoload'));
    }

    public function autoload($sClass)
    {
        $sLibPath = __DIR__.DIRECTORY_SEPARATOR;
        $sClassFile = str_replace('\\',DIRECTORY_SEPARATOR,$sClass).'.php';
        $sClassPath = $sLibPath.$sClassFile;
        if (file_exists($sClassPath)) {
            require($sClassPath);
        }
    }
}