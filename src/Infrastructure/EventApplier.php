<?php
namespace Ayeo\Es\Infrastructure;

use Ayeo\Es\Core\CoreEventApplier;
use Ayeo\Es\Domain;

class EventApplier extends CoreEventApplier
{
	/** @var $name string */
	private $name;

	/** @var $age integer */
	private $age = 0;

	/** @var $children Child[]  */
	private $children = [];

	protected function applyChildAdded(Domain\Event\ChildAdded $event) {
		$this->children[] = new Domain\Child($event->getGuid(), $event->getName());
	}

	protected function applyCreated(Domain\Event\Created $event) {
		$this->name = $event->getName();
	}

	protected function applyNameChanged(Domain\Event\NameChanged $event) {
		$this->name = $event->getNewName();
	}

	protected function applyTimePassed(Domain\Event\TimePassed $event) {
		$this->age += $event->getYears();
	}
}
