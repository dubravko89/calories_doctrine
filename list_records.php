<?php
// list_records.php <user-id>
require_once "bootstrap.php";

/*
$recordRepository = $entityManager->getRepository('Record');
$records = $recordRepository->findAll();

foreach ($records as $record)
{
	echo "ID: ".$record->getId() ."\n"
	."Food: ".$record->getFoodName() ."\n"
	."Calories: ".$record->getNumberOfCalories() ."\n"
	."Owner: ".$record->getOwner()->getName() ."\n";
	echo "\n";
}
*/

$userId = $argv[1];
$numberOfResults = 10;

$records = $entityManager->getRepository('Record')->getOwnersRecords($userId, $numberOfResults);

foreach ($records as $record)
	{
		echo $record->getId()."\n"
		.$record->getFoodName()."\n"
		.$record->getNumberOfCalories()."\n"
		.$record->getOwner()->getName()."\n";
		echo "\n";

	}
;