<?php
// records_lower_than.php <user-id> <cals-lower-than>
require_once "bootstrap.php";

$ownerId = $argv[1];
$calories = $argv[2];

$records = $entityManager->getRepository('Record')->getOwnersRecordsLimitCalories($ownerId, $calories);

foreach ($records as $record)
{
	echo $record->getId()."\n"
	.$record->getFoodName()."\n"
	.$record->getNumberOfCalories()."\n"
	.$record->getOwner()->getName()."\n";
	echo "\n";
}