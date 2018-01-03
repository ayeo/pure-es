<?php
namespace Ayeo\Es\Event;

class NameChanged extends Base
{
	/** @var string */
	private $newName;

	public function __construct(string $newName)
	{
		$this->newName = $newName;
	}

	public function getNewName(): string
	{
		return $this->newName;
	}
}
