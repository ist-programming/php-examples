<?php

require_once './Repository/AbstractCountryRepository.php';
require_once './Repository/FileRepository.php';

/**
 * Description of AbstractCsvRepository
 *
 * @author Alexander Ferenets (aka Istamendil) – http://istamendil.info
 */
abstract class AbstractFileCountryRepository extends AbstractCountryRepository
                                   implements FileRepository
{
  protected $dataSource = '';

  public function getDataFile()
  {
    return $this->dataSource;
  }

  public function setDataFile($dataSource)
  {
    $this->dataSource = $dataSource;
    $this->data = [];
  }
}
