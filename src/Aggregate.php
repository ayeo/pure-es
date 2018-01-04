<?php
namespace Ayeo\Es;

use Ayeo\Es\Event;
use LogicException;

class Aggregate
{
	/** @var $name string */
	private $name;

	/** @var $age int */
	private $age = 0;

	private $events = [];

	public function __construct(string $name)
	{
		$this->events[] = new Event\Created($name);
		$this->name = $name;
	}

	public function changeName(string $newName)
	{
		if ($this->name === $newName) {
			throw new LogicException("Given name is same");
		}

		$this->events[] = new Event\NameChanged($newName);
		$this->name = $newName;
	}

	public function increaseAge(int $interval)
	{
		if ($this->age + $interval > 100) {
			throw new LogicException("Nobody lives so long");
		}

		$this->events[] = new Event\TimePassed($interval);
		$this->age += $interval;
	}

	public function getName(): string {
		return $this->name;
	}

	public function getAge(): int {
		return $this->age;
	}

	public function getEvents(): array
	{
		return $this->events;
	}
}
