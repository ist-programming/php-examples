<?php

define('ACTION_ALL', 1);
define('ACTION_SEARCH', 2);


$argv[0] = ACTION_SEARCH; // all, search
$argv[1] = 'д';

// Get data
$file = file_get_contents('../countries.csv');
$lines = explode("\n", $file);

// Parsing data
$countries = [];
foreach($lines as $line){
  $country = [];
  list($country['code'], $country['name']) = explode(':', $line);
  $countries[] = $country;
}
unset($line);

// Print data
switch($argv[0]){
  case ACTION_ALL:
    foreach($countries as $country){
      echo $country['name'] . ' ('.$country['code'].')';
      echo "\n";
    }
    break;
  case ACTION_SEARCH:
    if(empty($argv[1])){
      exit('Please run with search string parameter.');
    }
    foreach($countries as $country){
      if(mb_stripos($country['name'], $argv[1]) !== FALSE){
        echo $country['name'] . ' ('.$country['code'].')';
        echo "\n";
      }
    }
    break;
  default:
    echo 'Unknown action.';
    break;
}
















