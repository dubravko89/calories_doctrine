<?php
// show_user.php <id>
require_once "bootstrap.php";

$id = $argv[1];

$user = $entityManager->find('User', $id);

if ($user === null)
{
	echo "No users matching the ID: ".$id."\n";
	exit(1);
}

echo "Name: ".$user->getName()."\n"
."Email: ".$user->getEmail()."\n"
."Roles: ".$user->getRoles()."\n";