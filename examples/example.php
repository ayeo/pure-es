<?php
namespace Ayeo\Es;

use Ayeo\Es\Event;

require_once "../vendor/autoload.php";

$eventStraem = [
	new Event\NameChanged("Harry Potter"),
	new Event\TimePassed(2),
	new Event\NameChanged("Tomy Lee Jones"),
	new Event\TimePassed(5)
];

$repository = new Repository();
$aggregate = $repository->replay($eventStraem);

var_dump($aggregate->getName()); //returns Tomy Lee Jones
var_dump($aggregate->getAge()); //returns 7