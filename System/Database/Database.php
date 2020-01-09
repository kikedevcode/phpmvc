<?php

namespace System\Database;

use System\Database\{Sentences, Connect};

class Database
{
    public static function select($args)
    {
        if(!argumentsExist($args))
            throw new Exception('No arguments required');
        else
            self::query(Database::makeSelectSentence($args));
    }

    public static function insert($args)
    {
        if(!argumentsExist($args))
            throw new Exception('No arguments required');
        else
            self::query(Database::makeInsertSentence($args));
    }

    public static function delete($args)
    {
        if(!argumentsExist($args))
            throw new Exception('No arguments required');
        else
            self::query(Database::makeDeleteSentence($args));
    }

    public static function update($args)
    {
        if(!argumentsExist($args))
            throw new Exception('No arguments required');
        else
            self::query(Database::makeDeleteSentence($args));
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

