<?php

namespace App\Controllers;

use App\Models\Users;
use Http\Request;

class UsersController
{
    public static function saveUser()
    {
        Users::createUser(Request::obtainPost());
    }    
}