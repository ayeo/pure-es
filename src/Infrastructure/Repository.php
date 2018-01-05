<?php
namespace Ayeo\Es\Infrastructure;

use Ayeo\Es\Core\CoreRepository;
use Ayeo\Es\Domain\Aggregate;

class Repository extends CoreRepository
{
	public function __construct() {
		parent::__construct(EventApplier::class, Aggregate::class);
	}

	public function replay(array $eventSource): Aggregate {
		return $this->doReplay($eventSource);
	}
}
