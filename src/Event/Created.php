<?php
namespace Ayeo\Es\Event;

class Created extends Base
{
	/** @var string */
	private $name;

	public function __construct(string $name)
	{
		$this->name = $name;
	}

	public function getName(): string
	{
		return $this->name;
	}
}
