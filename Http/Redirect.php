<?php

namespace Http;

class Redirect
{
    public static function localRedirect($relativePath)
    {
        header('Location: ' . 'http://phpmvc.local.com/' . 'App/Views/' . $relativePath . '.php');
    }
}