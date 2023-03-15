<?php
// create_record.php <owner_id> <foodName> <numberOfCalories>
require_once "bootstrap.php";

$ownerId = $argv[1];
$foodName = $argv[2];
$calories = $argv[3];

$owner = $entityManager->find('User', $ownerId);

$record = new Record();
$record->setFoodName($foodName);
$record->setNumberOfCalories($calories);
$record->setCreated(new DateTime("now"));

$record->setOwner($owner);

$entityManager->persist($record);
$entityManager->flush();

echo "Created record with ID: ".$record->getId()."\n";