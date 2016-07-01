<?php

require_once 'bootstrap.php';

$user = new User();
$user->setName('Igo');
echo  $user->getName();
//echo 'test';