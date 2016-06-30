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

// the connection configuration
$dbParams = array(
    'driver'   => 'pdo_mysql',
    'user'     => 'webler',
    'password' => '123123q',
    'dbname'   => 'doctrine',
);

// obtaining the entity manager
$entityManager = EntityManager::create($dbParams, $config);
