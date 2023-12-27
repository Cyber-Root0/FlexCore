<?php

use Foxdb\DB;
use Foxdb\Config;

DB::addConnection('main', [
    'host'=>APP_DATABASE['host'],
    'port'=>'3306',
    'database'=>APP_DATABASE['database'],
    'username'=> APP_DATABASE['user'],
    'password'=>APP_DATABASE['password'],
    'charset'=>Config::UTF8,
    'collation'=>Config::UTF8_GENERAL_CI,
    'fetch'=>Config::FETCH_CLASS
]);