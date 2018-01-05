<?php
namespace Ayeo\Es\Core;

abstract class CoreEventApplier
{
	public function apply(\Ayeo\Es\Core\Event $event) {
		preg_match("#[a-z0-9]+$#i", get_class($event), $result);
		if (isset($result[0])) {
			$this->{"apply".$result[0]}($event);
		}
	}
}
