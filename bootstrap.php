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
$dbParams = array(
    'url' => getenv("CLEARDB_DATABASE_URL"),
    );

// obtaining the entity manager
$entityManager = EntityManager::create($dbParams, $config);
