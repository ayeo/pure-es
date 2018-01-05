<?php
namespace Ayeo\Es\Domain;

use Ayeo\Es\Core\AggregateRoot;

class Aggregate extends AggregateRoot
{
	/** @var $name string */
	private $name;

	/** @var $age int */
	private $age = 0;

	/** @var $children Child[]  */
	private $children = [];

	public function __construct(string $name) {
		$this->name = $name;
		$this->addEvent(new Event\Created($name));
	}

	public function changeName(string $newName) {
		if ($this->name === $newName) {
			throw new \LogicException("Given name is same");
		}
		$this->name = $newName;
		$this->addEvent(new Event\NameChanged($newName));
	}

	public function increaseAge(int $interval) {
		if ($this->age + $interval > 100) {
			throw new LogicException("Nobody lives so long");
		}
		$this->age += $interval;
		$this->addEvent(new Event\TimePassed($interval));
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
		$this->children[] = new Child($hash, $childName);
		$this->addEvent(new Event\ChildAdded($hash, $childName));
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

	/**
	 * @return Child[]
	 */
	public function getChildren(): array {
		return $this->children;
	}
}
