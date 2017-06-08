<?php

require_once './Repository/CountryRepository.php';
require_once './Repository/WebRepository.php';

/**
 * Description of AbstractCsvRepository
 *
 * @author Alexander Ferenets (aka Istamendil) – http://istamendil.info
 */
abstract class AbstractWebCountryRepository extends AbstractCountryRepository
                                   implements WebRepository
{
  protected $dataSource = '';  
  
  /**
   * Set source data url.
   * @param string setDataUrl
   */
  public function setDataUrl($dataUrl)
  {
    $this->dataSource = $dataUrl;
    $this->data = [];
  }
  
  /**
   * Get source data url.
   * @param string $dataSource
   */
  public function getDataUrl()
  {
    return $this->dataSource;
  }


}
