<?php

namespace App\Databases;
class Database
{
    protected static $localhost = "localhost";
    protected static $username = "root";
    protected static $password = "";
    protected static $dbname = "tasker";


    public static function NewConnect()
    {
        $db = new \PDO("mysql:host=".self::$localhost.";dbname=".self::$dbname, self::$username, self::$password);
        $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        return $db;
    }

}

?>