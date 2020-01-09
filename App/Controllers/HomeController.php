<?php

namespace App\Controllers;

use System\Core\Controller;

class HomeController extends Controller
{
    public function __construct()
    {
        echo "<pre>";
        var_dump(__CLASS__);
        echo "</pre>";
    }

    public function exec()
    {
        echo "Hello world!";
    }
}