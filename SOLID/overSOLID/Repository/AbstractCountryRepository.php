<?php

require_once './Repository/CountryRepository.php';

/**
 * Description of AbstractCountryRepository
 *
 * @author Alexander Ferenets (aka Istamendil) – http://istamendil.info
 */
abstract class AbstractCountryRepository implements CountryRepository
{
  protected $data = [];

  /**
   * Find all countries.
   * 
   * @return array
   */
  public function findAll()
  {
    if(!count($this->data)) {
      $this->loadData();
    }
    
    return $this->data;
  }

  /**
   * Find countries by name part.
   * @param string $name
   * @return array
   */
  public function findByName($name)
  {
    if(!count($this->data)) {
      $this->loadData();
    }
    
    $results = [];
    foreach($this->data as $country) {
      if(stripos($country['name'], $name) !== FALSE) {
        $results[] = $country;
      }
    }
    
    return $results;
  }

}
