<?php

namespace System\Database;

use System\Database\Connect;

class Sentences
{
    private static $select;

    private static $insert;

    private static $update;

    private static $delete;

    private static $values;

    private static $updateValues;


    public static function makeSelectSentence($args)
    {
        if(isset($args['where']) && !empty($args['where']))
            self::$select = "SELECT " . $args['attributes'] . " FROM " . $args['table'];
        else
            self::$select = "SELECT " . $args['attributes'] . " FROM " . $args['table'] . " WHERE " . $args['where'];

        return self::$select;
    }


    public static function makeInsertSentence($args)
    {
        self::$insert = "INSERT INTO " . $args['table'];
        self::$insert .= "( " . $args['attributes'] . " )";
        self::$insert .= "VALUES (" . self::getValues($args['values']) . ")";

        return self::$insert;
    }


    private static function getValues($values)
    {
        self::$values = [];

        if(isset($values) && !empty($values))
        {
            for($i = 0; $i < count($values); $i++)
            {
                self::$values[$i] = "'" . self::escapeStr($values[$i]) . "'";
            }
        }

        return implode(", ", self::$values);
    }


    private static function escapeStr($value)
    {
        return mysqli_real_escape_string(Connect::connect(), $value);
    }


    public static function makeUpdateSentence($args)
    {
        self::$update = "UPDATE " . $args['table'];
        self::$update .= " SET " . self::updateArguments($args['arguments']);
        
        self::$update .= " WHERE " . $args['where'];

        return self::$update;
    }

    private static function updateArguments($args)
    {
        self::$updateValues = [];

        $valuesCounter = 0;

        foreach($args as $key => $value)
        {
            self::$updateValues[$valuesCounter] = $key . " = " . "'" . $value . "'";

            $valuesCounter++;
        }

        return implode(", ", self::$updateValues);
    }

    public static function makeDeleteSentence($args)
    {
        self::$delete = "DELETE FROM " . $args['table'];
        self::$delete .= "WHERE " . $args['where'];

        return self::$delete;
    }    
}