<?php
namespace Ayeo\Es;

use Ayeo\Es\Event;

class EventApplier
{
	/** @var $name string */
	private $name;

	/** @var $age integer */
	private $age = 0;

	/** @var $children Child[]  */
	private $children = [];

	public function apply(Event\Base $event) {
		preg_match("#[a-z0-9]+$#i", get_class($event), $result);
		if (isset($result[0])) {
			$this->{"apply".$result[0]}($event);
		}
	}

	private function applyChildAdded(Event\ChildAdded $event) {
		$this->children[] = new Child($event->getGuid(), $event->getName());
	}

	private function applyCreated(Event\Created $event) {
		$this->name = $event->getName();
	}

	private function applyNameChanged(Event\NameChanged $event) {
		$this->name = $event->getNewName();
	}

	private function applyTimePassed(Event\TimePassed $event) {
		$this->age += $event->getYears();
	}
}
