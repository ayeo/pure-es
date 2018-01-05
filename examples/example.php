<?php
namespace Ayeo\Es;

use Ayeo\Es\Domain\Event;
use Ayeo\Es\Infrastructure\Repository;

require_once "../vendor/autoload.php";

$eventStraem = [
	new Event\Created("Harry Potter"),
	new Event\TimePassed(2),
	new Event\NameChanged("Tomy Lee Jones"),
	new Event\TimePassed(5),
	new Event\ChildAdded('3423-3422-2113', 'The child'),
];

$repository = new Repository();
$aggregate = $repository->replay($eventStraem);

var_dump($aggregate->getName()); //returns Tomy Lee Jones
var_dump($aggregate->getAge()); //returns 7
