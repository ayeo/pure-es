<?php
namespace Ayeo\Es\Event;

class TimePassed extends Base
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
