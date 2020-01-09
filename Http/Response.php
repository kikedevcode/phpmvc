<?php

namespace Http;

class Response
{
    public static function encode($args)
    {
        if(is_array($args) && !empty($args))
            echo json_encode($args);
    }
}