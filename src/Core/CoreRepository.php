<?php
namespace Ayeo\Es\Core;

abstract class CoreRepository
{
	/** @var string	 */
	private $applierClass;

	/** @var string */
	private $aggregateClass;

	public function __construct(string $applierClass, string $aggregateClass) {
		$this->applierClass = $applierClass;
		$this->aggregateClass = $aggregateClass;
	}

	protected function doReplay(array $eventStream) {
		$applierClass = $this->applierClass;
		$applier = new $applierClass();

		foreach ($eventStream as $event) {
			$applier->apply($event);
		}

		$applierReflection = new \ReflectionObject($applier);
		$agreggateReflection = new \ReflectionClass($this->aggregateClass);
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
