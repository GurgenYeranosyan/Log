<?php

require "app/classes/Core/Log.php";
require "app/classes/Main/Person.php";

\App\Core\Log::setRootDir("log");

$person = new \App\Main\Person();
$person->setName("Xcho");
echo $person->getNmae();

$log = new \App\Core\Log("papka_1/papka_2/sad.log");
$log->log("Test 1");