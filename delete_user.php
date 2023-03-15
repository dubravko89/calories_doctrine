<?php
// delete_user.php <id>
require_once "bootstrap.php";

$id = $argv[1];

$user = $entityManager->find('User', $id);

$entityManager->remove($user);
$entityManager->flush();

echo "Deleted user with ID: ".$user->getId()."\n";