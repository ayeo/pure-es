<?php
namespace Ayeo\Es\Core;

use Ayeo\Es\Domain\Event;

abstract class CoreEventApplier
{
	public function apply(Event\Base $event) {
		preg_match("#[a-z0-9]+$#i", get_class($event), $result);
		if (isset($result[0])) {
			$this->{"apply".$result[0]}($event);
		}
	}
}
