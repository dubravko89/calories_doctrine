<?php
// assign_owner.php <user-id> <record-id>
require_once "bootstrap.php";

$ownerId = $argv[1];
$recordId = $argv[2];

$owner = $entityManager->find('User', $ownerId);

$record = $entityManager->find('Record', $recordId);

$record->setOwner($owner);

$entityManager->flush();