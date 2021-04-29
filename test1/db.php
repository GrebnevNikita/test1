<?php

class db1
{
    private static $site_db = null;
    const HOST = 'localhost';
    const USER = 'root';
    const PASS = '';
    const DB = 'test';


    static function activate()
    {
        self::$site_db = new mysqli(self::HOST, self::USER, self::PASS, self::DB);
        if (self::$site_db->connect_error)
            echo 'Не удалось подключится к бд:' . self::$site_db->connect_error;
        self::$site_db->query('SET NAMES \'utf8\'');
        self::$site_db->client_encoding = 'utf8';
        self::$site_db->character_set_name = 'utf8_general_ci';
    }

    static function db()
    {
        if (!self::$site_db)
            self::activate();
        return self::$site_db;
    }

}

function q($q)
{
    $result = db1::db()->query($q);
    return $result;
}


?>