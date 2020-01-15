<?php

namespace System\Database;

use System\Database\{Sentences, Connect};

class Database
{
    public static function select($args)
    {
        if(!self::argumentsExist($args))
            throw new Exception('No arguments required');
        else
            self::query(Sentences::makeSelectSentence($args));
    }

    public static function insert($args)
    {
        if(!self::argumentsExist($args))
            throw new Exception('No arguments required');
        else
            self::query(Sentences::makeInsertSentence($args));
    }

    public static function delete($args)
    {
        if(!self::argumentsExist($args))
            throw new Exception('No arguments required');
        else
            self::query(Sentences::makeDeleteSentence($args));
    }

    public static function update($args)
    {
        if(!self::argumentsExist($args))
            throw new Exception('No arguments required');
        else
            self::query(Sentences::makeDeleteSentence($args));
    }

    private static function argumentsVerify($args)
    {
        try{
            self::argumentsExist($args);
        } catch(\Exception $e){
            print $e->getMessage();
        }
    }

    private static function argumentsExist($args)
    {
        if(is_array($args) && !empty($args) && count($args) > 0)
            return true;
    }

    private static function query($sentence)
    {
        return mysqli_query(Connect::connect(), $sentence);
    }

}

