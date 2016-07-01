<?php

require_once 'bootstrap.php';

$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
$name   = filter_input(INPUT_GET, 'name', FILTER_SANITIZE_STRING);
$id     = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$email  = filter_input(INPUT_GET, 'email', FILTER_VALIDATE_EMAIL);

if (!$action) {
    $users = $em
        ->getRepository('User')
        ->findAll();

    foreach ($users as $user) {
        echo $user->getName().'<br>';
    }
} elseif ('add-user' === $action && $name) {
    $user = new User();
    $user->setName($name);

    $em->persist($user);
    $em->flush();

    echo "Created Product with ID " . $user->getId() . "\n";
} elseif ('user' === $action && $id) {
    $user = $em->find('User', $id);

    if (null === $user) {
        die ('User not found!');
    }

    echo $user->getName();
} elseif ('update-user' === $action && $id && $name) {
    $user = $em->find('User', $id);

    if (null === $user) {
        die ('User not found!');
    }

    $user->setName($name);

    $em->flush();
}

echo <<<EOF
<h1><a href="/">Home</a></h1>
EOF;
