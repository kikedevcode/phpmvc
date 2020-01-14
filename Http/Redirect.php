<?php

namespace Http;

class Redirect
{
    public static function displace($relativePath)
    {
        header('Location: ' . 'http://phpmvc.local.com/' . $relativePath);
    }
}