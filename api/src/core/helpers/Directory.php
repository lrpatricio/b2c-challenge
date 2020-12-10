<?php

namespace api\core\helpers;

class Directory
{
    public static function getBase($rootDirectory)
    {
        $docRoot = $_SERVER["DOCUMENT_ROOT"];
        if(substr($docRoot, -1) == "/")
        {
            $docRoot = substr($docRoot, 0, strlen($docRoot) - 1);
        }

        $root = $rootDirectory;
        $base = str_replace($docRoot, "", ((PHP_OS == "WINNT") ? str_replace("\\", "/", $root) : $root));

        return $base;
    }
}