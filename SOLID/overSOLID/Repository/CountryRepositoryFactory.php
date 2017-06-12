<?php

/**
 * Description of CountryRepositoryFactory
 *
 * @author Alexander Ferenets (aka Istamendil) – http://istamendil.info
 */
class CountryRepositoryFactory
{
  public static function getRepository($source){
    $repository = NULL;
    if(stripos($source, 'http') === 0){
      $repository = new WebServiceCountryRepository();
      $repository->setDataUrl($source);
    }
    else{
      $repository = new CommaFileCountryRepository();
      $repository->setDataFile($source);
    }
    return $repository;
  }
}
