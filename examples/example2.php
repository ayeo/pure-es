<?php

use Ayeo\Es\Domain\Aggregate;
use Ayeo\Es\Infrastructure\Repository;

require_once "../vendor/autoload.php";

$aggregate = new Aggregate("Zuzia the Cat");
$aggregate->increaseAge(5);
$aggregate->changeName("Crazy Animal");
$aggregate->addChild("Crockodile");
$aggregate->addChild("Bear 100");

$eventStream = $aggregate->getEvents();

$repository = new Repository();
$aggregate = $repository->replay($eventStream);


var_dump($aggregate->getName()); //returns Crazy Animal
var_dump($aggregate->getAge()); //returns 5
var_dump($aggregate->getChildrenNames());