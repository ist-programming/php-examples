<?php

require_once './vendor/autoload.php';

// Using one our class
Util\Dumper::dump(42);

// Using another class and "use" statement
use Util\MainFileLogger;
$logger = new MainFileLogger();
$logger->log(42);
