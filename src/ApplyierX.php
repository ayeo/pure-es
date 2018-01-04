<?php
namespace Ayeo\Es;

use Ayeo\Es\Event;

class ApplyierX //this class name must have same length as Aggregate class
{
	/** @var $name string */
	private $name;

	/** @var $age integer */
	private $age = 0;

	public function apply(Event\Base $event) {
		preg_match("#[a-z0-9]+$#i", get_class($event), $result);
		if (isset($result[0])) {
			$this->{"apply".$result[0]}($event);
		}
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
