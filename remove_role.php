<?php
// remove_role.php <id> <roleToRemove>
require_once "bootstrap.php";

$id = $argv[1];
$roleToRemove = $argv[2];

$user = $entityManager->find('User', $id);

$user->removeRole($roleToRemove);

$entityManager->flush();