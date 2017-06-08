<?php

/**
 *
 * @author Alexander Ferenets (aka Istamendil) – http://istamendil.info
 */
interface CountryRepository
{

  /**
   * Find all countries.
   * 
   * @return array
   */
  public function findAll();

  /**
   * Find countries by name part.
   * @param string $name
   * @return array
   */
  public function findByName($name);
}
