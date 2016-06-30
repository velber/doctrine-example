<?php

require_once 'bootstrap.php';

$user = new Models\User();
$user->setName('Igo');
echo  $user->getName();
//echo 'test';