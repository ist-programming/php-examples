<?php

/**
 *
 * @author Alexander Ferenets (aka Istamendil) – http://istamendil.info
 */
interface FileRepository
{
  /**
   * Set source data file.
   * @param string $dataSource
   */
  public function setDataFile($dataSource);
  
  /**
   * Get source data file.
   * @param string $dataSource
   */
  public function getDataFile();
}
