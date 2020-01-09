<?php

namespace System\Core;

use System\Core\ErrorHandle;
use System\Core\Router;

class Launch
{
    public static function AppLaunch()
    {        
        Router::getRoute();
        self::getHome();
    }

    public static function getHome()
    {
        if(Router::pathVerify())
        {
            include(dirname(ABSOLUTE_PATH) . '/app/Views/Home.php');
        }
    }
}

Launch::AppLaunch();

