<?php
namespace Ayeo\Es;

class Repository
{
	public function replay(array $eventStream): Aggregate
	{
		$applier = new ApplyierX();

		foreach ($eventStream as $event)
		{
			$applier->apply($event);
		}

		$serialized = serialize($applier);
		$serialized = str_replace(get_class($applier), Aggregate::class, $serialized);

		return unserialize($serialized);
	}
}