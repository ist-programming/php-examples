<?php

require_once './Repository/AbstractWebCountryRepository.php';

/**
 * Description of WebServiceCountryRepository
 *
 * @author Alexander Ferenets (aka Istamendil) – http://istamendil.info
 */
class WebServiceCountryRepository extends AbstractWebCountryRepository
{
  const USERAGENT = 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:53.0) Gecko/20100101 Firefox/53.0';
  
  protected function loadData(){    
    // Get data
    $ch = curl_init($this->dataSource);
    curl_setopt($ch, CURLOPT_USERAGENT, self::USERAGENT);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    $file = curl_exec($ch);
    curl_close($ch);
    $lines = explode("\n", $file);
    
    // Parsing data
    foreach($lines as $line) {
      $country = [];
      $data = explode(':', $line);
      if(count($data) === 2){
        $country['code'] = $data[0];
        $country['name'] = $data[1];
        $this->data[] = $country;
      }
    }
  }
}
