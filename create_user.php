<?php
// create_user.php <username> <useremail>
require_once "bootstrap.php";

$name = $argv[1];
$email = $argv[2];

$user = new User();
$user->setName($name);
$user->setEmail($email);

$entityManager->persist($user);
$entityManager->flush();

echo "Created a user with ID: ".$user->getId()."\n";