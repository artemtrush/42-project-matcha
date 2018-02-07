<?php

if (!defined('ROOT'))
    define('ROOT', dirname(__DIR__));
include_once(ROOT.'/config/database.php');
define('DB_NAME', 'matcha');

abstract class DB
{
    private static $db = null;

    private static function connect($DB_DSN, $DB_USER, $DB_PASSWORD)
    {
        if (self::$db == null)
        {
            try
            {
                self::$db = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
                self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
                self::$db->exec("SET NAMES UTF8");
            }
            catch (PDOException $error)
            {
                echo 'Connection failed: ' . $error->getMessage() . PHP_EOL;
                self::$db = null;
                return false;
            }
        }
        return true;
    }

    private static function delFolder($dir)
    {
        if (!file_exists($dir))
            return false;
        $files = array_diff(scandir($dir), array('.','..'));
        foreach ($files as $file)
            (is_dir("$dir/$file")) ? self::delFolder("$dir/$file") : unlink("$dir/$file");
        return rmdir($dir);
    }

    private static function delete()
    {
        try
        {
            self::$db->exec("DROP DATABASE IF EXISTS ".DB_NAME);
            echo "Database has been deleted" . PHP_EOL;
            //self::delFolder(ROOT.'/database');
            //!!!!!!!!!!!!!
            return true;
        }
        catch (PDOException $error)
            echo 'Deletion failed: ' . $error->getMessage() . PHP_EOL;
        return false;
    }

    private static function create()
    {
        global $DB_DSN;
        global $DB_USER;
        global $DB_PASSWORD;
      
        if (self::connect(str_replace("dbname=".DB_NAME.";", "", $DB_DSN), $DB_USER, $DB_PASSWORD))  
        {
            try
            {
                self::$db->exec(file_get_contents(ROOT.'/config/sql/create.sql'));
                self::$db->exec(file_get_contents(ROOT.'/config/sql/user.sql'));
                echo "Database has been created" . PHP_EOL;
                return true;
            }
            catch (PDOException $error)
                echo 'Creation failed: ' . $error->getMessage() . PHP_EOL;
        }
        return false;
    }

    private static function get()
    {
        if (self::$db == null)
        {
            global $DB_DSN;
            global $DB_USER;
            global $DB_PASSWORD;
            if (self::connect($DB_DSN, $DB_USER, $DB_PASSWORD) === false)
                self::create();
        }
        return self::$db;
    }

    public static function query($query_string, $params = array())
    {
        $database = self::get();
        if ($database === null)
            return false;
        $request = $database->prepare($query_string);
        foreach ($params as $item)
            $item = trim(htmlspecialchars($item));
        if ($request->execute($params))
            return $request;
        return false;
    }

    public static function recreate()
    {
        if (self::connect($DB_DSN, $DB_USER, $DB_PASSWORD))
        {
            if (!self::delete())
                return false;
        }
        return self::create();
    }
}