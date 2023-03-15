<?php
// src/Record.php

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity(repositoryClass: RecordRepository::class)]
#[ORM\Table(name: 'records')]
class Record
{
	#[ORM\Id]
	#[ORM\Column(type: 'integer')]
	#[ORM\GeneratedValue]
	private int|null $id = null;

	#[ORM\Column(type: 'datetime')]
	private DateTime $created;

	#[ORM\Column(type: 'string')]
	private string $foodName;

	#[ORM\Column(type: 'integer')]
	private int|null $numberOfCalories = null;


	#[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'ownedRecords')]
	private User|null $owner = null;

	public function setOwner(User $owner): void
	{
		$owner->addRecord($this);
		$this->owner = $owner;
	}

	public function getOwner(): User
	{
		return $this->owner;
	}


	public function getId(): int|null
	{
		return $this->id;
	}

	public function getCreated(): DateTime
	{
		return $this->created;
	}

	public function setCreated(DateTime $created)
	{
		$this->created = $created;
	}

	public function getFoodName(): string
	{
		return $this->foodName;
	}

	public function setFoodName(string $foodName)
	{
		$this->foodName = $foodName;
	}

	public function getNumberOfCalories(): int
	{
		return $this->numberOfCalories;
	}

	public function setNumberOfCalories(int $numberOfCalories)
	{
		$this->numberOfCalories = $numberOfCalories;
	}
}