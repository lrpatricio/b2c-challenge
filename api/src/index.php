<?php

use Dotenv\Dotenv;

require __DIR__.'/../../vendor/autoload.php';
if(file_exists(__DIR__."/.env"))
{
    Dotenv::createMutable(__DIR__, ".env", false)->load();
}
require __DIR__.'/routes.php';
