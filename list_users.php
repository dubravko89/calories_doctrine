<?php
// list_users.php
require_once "bootstrap.php";

$usersRepository = $entityManager->getRepository('User');
$users = $usersRepository->findAll();

foreach ($users as $user)
{
	echo "ID: ".$user->getId()."\n"
	."Name: ".$user->getName()."\n"
	."Email: ".$user->getEmail()."\n"
	."Roles: ".$user->getRoles()."\n";
	echo "\n";
}