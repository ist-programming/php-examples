<?php

require_once './Repository/AbstractFileCountryRepository.php';

/**
 * Description of CommaCsvCountryRepository
 *
 * @author Alexander Ferenets (aka Istamendil) – http://istamendil.info
 */
class CommaFileCountryRepository extends AbstractFileCountryRepository
{
  
  protected function loadData(){    
    // Get data
    $file = file_get_contents($this->dataSource);
    $lines = explode("\n", $file);

    // Parsing data
    foreach($lines as $line) {
      $country = [];
      list($country['code'], $country['name']) = explode(',', $line);
      $this->data[] = $country;
    }
  }
}
