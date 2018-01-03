<?php
namespace Ayeo\Es;

class Aggregate
{
	/** @var $name string */
	private $name;

	/** @var $age int */
	private $age;

	public function getName(): string
	{
		return $this->name;
	}

	public function getAge(): int
	{
		return $this->age;
	}
}
