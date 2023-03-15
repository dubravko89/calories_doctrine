<?php
// show_record.php <id>
require_once "bootstrap.php";

$id = $argv[1];

$record = $entityManager->find('Record', $id);

if ($record === null)
{
	echo "No record found"."\n";
	exit(1);
}

echo "Food :".$record->getFoodName()."\n"
."Calories :".$record->getNumberOfCalories()."\n"
."Owner: ".$record->getOwner()->getName() ."\n";