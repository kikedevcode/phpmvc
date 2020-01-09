<?php

namespace System\Database;

class Connect
{
    private static $server = SERVER;

    private static $user = USER;

    private static $password = PASSWORD;

    private static $database = DATABASE;


    public static function connect()
    {
        return mysqli_connect(self::$server, self::$user, self::$password, self::$database);
    }

    public static function close()
    {
        return mysqli_close(self::connect());
    }
}