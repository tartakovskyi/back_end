<?php

namespace Shop;

class DB {
    static private $driver = "mysql";
    static private $host = 'localhost';
    static private $port = '3306';
    static private $dbName;
    static private $user;
    static private $password;
    static public $conn;


    public static function connect($dbName, $user, $password)
    {
        self::$dbName = $dbName;
        self::$user = $user;
        self::$password = $password;

        $dsn = self::$driver.":host=".self::$host.";port=".self::$port.";dbname=".self::$dbName.";charset=utf8";
        self::$conn = new \PDO($dsn, self::$user, self::$password);
    }

    public static function setDriver($driver)
    {
        self::$driver = $driver;
    }

    public static function setHost($host)
    {
        self::$host = $host;
    }

    public static function setPort($port)
    {
        self::$port = $port;
    }    
}

