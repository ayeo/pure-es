<?php
namespace Ayeo\Es;

class Repository
{
	public function replay(array $eventStream): Aggregate {
		$applier = new EventApplier();

		foreach ($eventStream as $event) {
			$applier->apply($event);
		}

		$applierReflection = new \ReflectionObject($applier);
		$agreggateReflection = new \ReflectionClass(Aggregate::class);
		$agreggate = $agreggateReflection->newInstanceWithoutConstructor();

		/* @var $applierProperty \ReflectionProperty */
		foreach ($applierReflection->getProperties() as $applierProperty)
		{
			$propertyName = $applierProperty->getName();
			$applierProperty->setAccessible(true);

			if ($agreggateReflection->hasProperty($propertyName)) {
				$aggregateProperty = $agreggateReflection->getProperty($propertyName);
				$aggregateProperty->setAccessible(true);
				$aggregateProperty->setValue($agreggate, $applierProperty->getValue($applier));
			}
		}

		return $agreggate;
	}
}
