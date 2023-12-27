<?php

define("FIREWALL_STATUS",true);
define("APP_PRODUCTION", false);
define("APP_LOG", false);
define("APP_LOG_PATH", __DIR__."/../var/log/");
define("APP_DATABASE", array(
    "host" => "localhost",
    "user" => "root",
    "password" => "",
    "database" => "wordpress"
));