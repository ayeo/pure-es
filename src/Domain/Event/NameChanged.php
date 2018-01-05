<?php
namespace Ayeo\Es\Domain\Event;

use Ayeo\Es\Core\Event;

class NameChanged extends Event
{
	/** @var string */
	private $newName;

	public function __construct(string $newName) {
		$this->newName = $newName;
	}

	public function getNewName(): string {
		return $this->newName;
	}
}
