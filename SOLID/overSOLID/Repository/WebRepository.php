<?php

/**
 *
 * @author Alexander Ferenets (aka Istamendil) – http://istamendil.info
 */
interface WebRepository
{
  /**
   * Set source data url.
   * @param string $dataSource
   */
  public function setDataUrl($dataSource);
  
  /**
   * Get source data url.
   * @param string $dataSource
   */
  public function getDataUrl();
  
}
