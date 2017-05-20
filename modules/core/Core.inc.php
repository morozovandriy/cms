<?php
class Core
{
    public static $Db;
    public static $IndexTPL;
    public static function Init()
    {
        session_start();
        self::$Db = new Database("localhost", 'cms', 'root', '');
        self::$IndexTPL = new Template("template/index.tpl");
    }
    public static function Run()
    {
        self::$IndexTPL->SetParam('PageTitle', "Початкова сторінка");
        self::$IndexTPL->SetParam('PageHeaderTitle', "Початкова сторінка");
        $url = $_GET['url'];
        $parts = explode('/', $url);
        $className = ucfirst(array_shift($parts)).'_Controller';
        $methodName = ucfirst(array_shift($parts)).'Action';
        if (class_exists($className))
        {
            $moduleObject = new $className();
            if (method_exists($moduleObject, $methodName))
            {
                $params = $moduleObject->$methodName($parts);
                self::$IndexTPL->SetParams($params);
            }
            else
            {
                // 404
            }
        } else
        {
            // 404
        }

    }
    public static function Done()
    {
        self::$IndexTPL->Display();
    }
}