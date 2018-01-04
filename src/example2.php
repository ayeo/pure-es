<?php
namespace Ayeo\Es;

require_once "../vendor/autoload.php";

$aggregate = new Aggregate("Zuzia the Cat");
$aggregate->increaseAge(5);
$aggregate->changeName("Crazy Animal");

$eventStream = $aggregate->getEvents();

$repository = new Repository();
$aggregate = $repository->replay($eventStream);

var_dump($aggregate->getName());
var_dump($aggregate->getAge());