<?php
// update_record.php <id> <foodName>
require_once "bootstrap.php";

$id = $argv[1];
$newFoodName = $argv[2];

$record = $entityManager->find('Record', $id);

if ($record === null)
{
	echo "No record with that ID"."\n";
	exit(1);
}

$record->setFoodName($newFoodName);

$entityManager->flush();