<?php

namespace App\Models;

use System\Database\Database;

class Users
{
    public static function createUser($formInfo)
    {
         Database::insert(
        [
            'table' => 'users',
            'attributes' => 'name, password, email',
            'values' => 
            [
                    $formInfo['name'],
                    $formInfo['password'],
                    $formInfo['email']
            ]
        ]);
    }
}