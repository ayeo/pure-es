<?php
namespace Ayeo\Es\Domain;

class Aggregate
{
	/** @var $name string */
	private $name;

	/** @var $age int */
	private $age = 0;

	private $events = [];

	/** @var $children Child[]  */
	private $children = [];

	public function __construct(string $name) {
		$this->events[] = new Event\Created($name);
		$this->name = $name;
	}

	public function changeName(string $newName) {
		if ($this->name === $newName) {
			throw new \LogicException("Given name is same");
		}

		$this->events[] = new Event\NameChanged($newName);
		$this->name = $newName;
	}

	public function increaseAge(int $interval) {
		if ($this->age + $interval > 100) {
			throw new LogicException("Nobody lives so long");
		}

		$this->events[] = new Event\TimePassed($interval);
		$this->age += $interval;
	}

	public function hasChildWithName(string $name): bool {
		/* @var @child Child */
		foreach ($this->children as $child) {
			if ($child->getName() === $name) {
				return true;
			}
		}

		return false;
	}

	public function addChild(string $childName) {
		if ($this->hasChildWithName($childName)) {
			throw new \LogicException(sprintf("Child with name '%s' already exists", $childName));
		}

		$hash = md5(rand(0, 99999));
		$this->events[] = new Event\ChildAdded($hash, $childName);
		$this->children[] = new Child($hash, $childName);
	}

	public function getChildrenNames() {
		$names = [];
		/* @var @child Child */
		foreach ($this->children as $child) {
			$names[] = $child->getName();
		}

		return $names;
	}

	public function getName(): string {
		return $this->name;
	}

	public function getAge(): int {
		return $this->age;
	}

	public function getChildren(): array {
		return $this->children;
	}

	public function getEvents(): array {
		return $this->events;
	}
}
