<?php
namespace Ayeo\Es;

use Ayeo\Es\Event\NameChanged;
use Ayeo\Es\Event\TimePassed;

require_once "../vendor/autoload.php";

$eventStraem = [
	new NameChanged("Harry Potter"),
	new TimePassed(2),
	new NameChanged("Tomy Lee Jones"),
	new TimePassed(5)
];

$repository = new Repository();
$aggregate = $repository->replay($eventStraem);

var_dump($aggregate->getName());
var_dump($aggregate->getAge());