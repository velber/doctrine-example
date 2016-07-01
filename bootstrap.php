<?php

// bootstrap.php
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

require_once "vendor/autoload.php";

// Create a simple "default" Doctrine ORM configuration for Annotations
$isDevMode = true;

// or if you prefer yaml or XML
$config = Setup::createYAMLMetadataConfiguration(
    array(
        __DIR__."/config/yaml"
    ),
    $isDevMode
);

// env varible for db
$url = parse_url(getenv("CLEARDB_DATABASE_URL"));

// the connection configuration
if (count($url) > 1) {
    $dbParams = array(
        'driver'   => 'pdo_mysql',
        'user'     => $url["user"],
        'password' => $url["pass"],
        'dbname'   => substr($url["path"], 1),
        'host'     => $url["host"] ,
    );
} else {
    $dbParams = array(
        'driver'   => 'pdo_mysql',
        'user'     => 'webler',
        'password' => '123123q',
        'dbname'   => 'doctrine',
        'host'     => 'localhost' ,
    );
}

// obtaining the entity manager
$em = EntityManager::create($dbParams, $config);
