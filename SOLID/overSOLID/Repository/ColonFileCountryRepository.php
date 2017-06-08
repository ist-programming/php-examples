<?php

require_once './Repository/AbstractFileCountryRepository.php';

/**
 * Description of ColonCsvCountryRepository
 *
 * @author Alexander Ferenets (aka Istamendil) – http://istamendil.info
 */
class ColonFileCountryRepository extends AbstractFileCountryRepository
{
  protected $data = [];
  
  protected function loadData(){
    // Get data
    $file = file_get_contents($this->dataSource);
    $lines = explode("\n", $file);

    // Parsing data
    foreach($lines as $line) {
      $country = [];
      list($country['code'], $country['name']) = explode(':', $line);
      $this->data[] = $country;
    }
  }

}
