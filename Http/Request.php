<?php

namespace Http;

class Request
{
    public static function obtainPost($args)
    {
        if(REQUEST_POST)
            return $_POST;
    }

    public static function obtainGet($args)
    {
        if(REQUEST_GET)
            return $_GET;
    }
}