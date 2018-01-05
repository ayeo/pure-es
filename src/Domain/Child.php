<?php
namespace Ayeo\Es\Domain;

class Child
{
	/** @var string */
	private $guid;

	/** @var string */
	private $name;

	public function __construct(string $guid, string $name)
	{
		if (empty(trim($guid))) {
			throw new \LogicException("Child GUID must not be empty");
		}

		if (strlen($name) < 5) {
			throw new \LogicException("Child name must be longer than 4 chars");
		}

		$this->guid = $guid;
		$this->name = $name;
	}

	public function getGuid(): string
	{
		return $this->guid;
	}

	public function getName(): string
	{
		return $this->name;
	}
}
