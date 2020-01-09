<?php

/* VALUES URI */

define('URI', $_SERVER['REQUEST_URI']);


/* VALUES CONNECTION */

define('SERVER', 'localhost');

define('USER', 'myuser');

define('PASSWORD', 'admin');

define('DATABASE', 'surtiempaques');


/* PATH CONSTANTS */

define('ABSOLUTE_PATH', __DIR__);



/* REQUEST CONSTANTS */

define('REQUEST_POST', $_SERVER['REQUEST_METHOD'] === 'POST');

define ('REQUEST_GET', $_SERVER['REQUEST_METHOD'] === 'GET');