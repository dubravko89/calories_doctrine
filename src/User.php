<?php
// src/User.php

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity]
#[ORM\Table(name: 'users')]
class User
{
	#[ORM\Id]
	#[ORM\GeneratedValue]
	#[ORM\Column(type: 'integer')]
	private int|null $id = null;

	#[ORM\Column(type: 'string')]
	private string $name;

	#[ORM\Column(type: 'string')]
	private string $email;

	
	#[ORM\Column(type: 'array')]
	private array $roles = ['regular_user'];


	#[ORM\OneToMany(targetEntity: Record::class, mappedBy: 'owner')]
	private Collection $ownedRecords;


	public function addRecord(Record $record): void
	{
		$this->ownedRecords[] = $record;
	}


	public function __construct()
	{
		$this->ownedRecords = new ArrayCollection();
	}
	/*
	public function __construct()
	{
		$this->roles[] = 'regular_user';
	}
	*/

	public function addRole(string $role)
	{
		$this->roles[] = $role;
	}

	public function getRoles()
	{
		return implode(", ", $this->roles);
	}

	public function removeRole(string $roleToRemove)
	{
		$key = array_search($roleToRemove, $this->roles);
		unset($this->roles[$key]);
	}


	public function getId(): int
	{
		return $this->id;
	}

	public function getName(): string
	{
		return $this->name;
	}

	public function setName(string $name)
	{
		$this->name = $name;
	}

	public function getEmail(): string
	{
		return $this->email;
	}

	public function setEmail(string $email)
	{
		$this->email = $email;
	}


}