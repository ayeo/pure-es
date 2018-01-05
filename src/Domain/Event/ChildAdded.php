<?php
namespace Ayeo\Es\Domain\Event;

use Ayeo\Es\Core\Event;

class ChildAdded extends Event
{
	/** @var string */
	private $guid;

	/* @var string */
	private $name;

	public function __construct(string $guid, string $name)
	{
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
