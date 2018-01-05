<?php

use Ayeo\Es\Domain\Event;
use Ayeo\Es\Infrastructure\Repository;
use PHPUnit\Framework\TestCase;

class RepostioryTest extends TestCase
{
	public function testRestoringAgreggate() {
		$eventStream = [
			new Event\Created("Harry Potter"),
			new Event\TimePassed(2),
			new Event\NameChanged("Tomy Lee Jones"),
			new Event\TimePassed(5),
			new Event\ChildAdded("3423-3422-2113", "Crocodile"),
		];

		$repository = new Repository();
		$restoredAggregate = $repository->replay($eventStream);

		$this->assertEquals("Tomy Lee Jones", $restoredAggregate->getName());
		$this->assertEquals(7, $restoredAggregate->getAge());
		$this->assertTrue($restoredAggregate->hasChildWithName("Crocodile"));
	}
}
