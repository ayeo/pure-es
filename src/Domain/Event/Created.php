<?php
namespace Ayeo\Es\Domain\Event;

use Ayeo\Es\Core\Event;

class Created extends Event
{
	/** @var string */
	private $name;

	public function __construct(string $name) {
		$this->name = $name;
	}

	public function getName(): string {
		return $this->name;
	}
}
