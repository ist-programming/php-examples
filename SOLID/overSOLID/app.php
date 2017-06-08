<?php

require_once './Application.php';

$argv[0] = Application::ACTION_ALL; // all, search
$argv[1] = 'a';

$countryRepository = new CommaFileCountryRepository();
$countryRepository->setDataFile('../countries.csv');
//$countryRepository->setDataUrl('http://www.countries-list.info/Download-List/download.txt');

$printer = new TableListPrinter();
        
$app = new Application($argv, $countryRepository, $printer);
$app->run();
