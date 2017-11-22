<?php
class DB
{
    /**
     * @var PDO
     */
    private static $conn;

    public static function init_conn() {
        $str = "mysql:host=localhost;dbname=itu;charset=utf8mb4";
        self::$conn = new PDO($str,
                              "root", "root");
    }

    public static function prepare($cmd) {
        return self::$conn->prepare($cmd);
    }
}