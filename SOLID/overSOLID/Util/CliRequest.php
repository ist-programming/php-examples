<?php

require_once './Util/Request.php';

/**
 * Description of CliRequest
 *
 * @author Alexander Ferenets (aka Istamendil) – http://istamendil.info
 */
class CliRequest implements Request
{
  protected $args = [];
          
  public function __construct(array $alternatives = NULL){
    if(!$alternatives){
      global $argv;
      $this->args = $argv;
    }
    else{
      $this->args = $alternatives;
    }
  }

  public function getParameter($name)
  {
    if(isset($this->args[$name])){
      return $this->args[$name];
    }
    else{
      return NULL;
    }
  }

}
