<?php

namespace System\Core;

use Http\Redirect;

class Router 
{
    public static $relativePath;
    public static $file;
    public static $controller;    
        

    public static function setFile()
    {
        return self::$file = dirname(ABSOLUTE_PATH) . "/App/Views" . "/" . self::setRelativePath() . ".php";
    }

    public static function setRelativePath()
    {
        return self::$relativePath = (!isset($_GET['PATH'])) ? '/' : $_GET['PATH'];       
    }

    public static function pathVerify()
    {
        if(self::setRelativePath() == "/")        
            return true;        
    }    

    public static function getRelativePath()
    {
        return self::$relativePath;
    }

    public static function getRoute()
    {
        include(dirname(ABSOLUTE_PATH) . '/App/Views/getRoute.php');
    }

    public static function get($link)
    {        
        if(self::setRelativePath() !== "/")
        {            
            self::makeView($link);
            return true;
        }
    }    

    public static function makeView($link)
    {
        $file = self::setFile();

        if($_SERVER['REQUEST_URI'] === $link)
        {
            if(file_exists($file))
            {
                include($file);
            }
        }
    }

    public static function errorVerify()
    {
        if(self::setRelativePath() !== "/")
        {
            if(self::fileVerify() || self::isIncluded())
            {
                Redirect::localRedirect('Status\404');
            }
        }         
    }

    public static function fileVerify()
    {
        if(!is_file(self::setFile()))
            return true;
    }

    public static function isIncluded()
    {
        $files = get_included_files();

        $file = str_replace("/", "\\", self::setFile());

        if(!in_array($file, $files))      
            return true;            
    }

    public static function post($link, $controller)
    {
        if(REQUEST_POST)
            self::makePost($link, $controller);
    }

    private static function makePost($link, $controller)
    {
        $controllerSegmented = self::setController($controller);

        if(self::setRelativePath() === $link)
        {
            if(class_exists('App' . '\\' . 'Controllers' . '\\' . $controllerSegmented[0], true))
                return call_user_func('Controllers' . '\\' . $controllerSegmented[0] . '::' . $controllerSegmented[1]);
        }
    }

    private static function setController($controller)
    {
        return explode('/', $controller);
    }

    

    

    

    

    

    
}