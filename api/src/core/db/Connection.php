<?php

namespace api\core\db;

use PDO;

class Connection
{
    /**
     * @var
     * Armazenar a conexão aberta para não
     */
    private static $connOpened;

    /**
     * @return PDO
     * Obter uma conexão com o banco de dados
     */
    public static function open()
    {
        if(!self::$connOpened)
        {
            $conn = new PDO("mysql:host=".$_ENV['DB_HOST'].";dbname=".$_ENV['DB_NAME'], $_ENV['DB_USER'], $_ENV['DB_PASS'], [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"]);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conn->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);

            self::$connOpened = $conn;
        }

        return self::$connOpened;
    }
}