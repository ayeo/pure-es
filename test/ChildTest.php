<?php

use Ayeo\Es\Domain\Child;
use PHPUnit\Framework\TestCase;

class ChildTest extends TestCase
{
	public function testEmptyGuid() {
		$this->expectException(LogicException::class);
		new Child("  ", "Animal");
	}

	public function testChildShortName() {
		$this->expectException(LogicException::class);
		new Child("3454-34535", "Bear");
	}
}
