<?php
// src/RecordRepository.php

use Doctrine\ORM\EntityRepository;

class RecordRepository extends EntityRepository
{
	public function getOwnersRecords($userId, $numberOfResults)
	{
		$dql = "SELECT a, b FROM Record a JOIN a.owner b WHERE b.id = ?1 ORDER BY a.created ASC";

		return $this->getEntityManager()->createQuery($dql)
					->setParameter(1, $userId)
					->setMaxResults($numberOfResults)
					->getResult();
	}

	public function getOwnersRecordsLimitCalories($userId, $caloriesLowerThan)
	{
		$dql = "SELECT r, b FROM Record r join r.owner b WHERE b.id = ?1 AND r.numberOfCalories <= ?2 ORDER BY r.created ASC";

		return $this->getEntityManager()->createQuery($dql)
					->setParameter(1, $userId)
					->setParameter(2, $caloriesLowerThan)
					->getResult();
	}
}