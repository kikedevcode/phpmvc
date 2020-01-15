<?php

namespace Http;

class Request
{
    public static function obtainPost()
    {
        if(REQUEST_POST)
            return $_POST;
    }

    public static function obtainGet()
    {
        if(REQUEST_GET)
            return $_GET;
    }
}