<?php
namespace Ayeo\Es\Domain\Event;

use Ayeo\Es\Core\Event;

class TimePassed extends Event
{
	/** @var int */
	private $years;

	public function __construct(int $years) {
		$this->years = $years;
	}

	public function getYears(): int {
		return $this->years;
	}
}
