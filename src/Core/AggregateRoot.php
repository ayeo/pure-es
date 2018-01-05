<?php
namespace Ayeo\Es\Core;

use Ayeo\Es\Core\Event;

abstract class AggregateRoot
{
	private $events = [];

	protected function addEvent(Event $event) {
		$this->events[] = $event;
	}

	public function getEvents(): array {
		return $this->events;
	}
}
