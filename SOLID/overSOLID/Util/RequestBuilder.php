<?php

require_once './Util/CliRequest.php';
require_once './Util/HttpRequest.php';
require_once './Util/Request.php';

/**
 * Description of RequestBuilder
 *
 * @author Alexander Ferenets (aka Istamendil) – http://istamendil.info
 */
class RequestBuilder
{
  const SERACH_KEYS = 'абвabc';
  /**
   * 
   * @return Request
   */
  public static function build(){
    if(php_sapi_name() === 'cli'){
      
      $param = self::SERACH_KEYS;
      $param = $param[rand(0, strlen(self::SERACH_KEYS)-1)];
      
      $request = new CliRequest([
        'action' => Application::ACTION_SEARCH,
        'param' => $param,       
      ]);
    }
    else{
      $request = new HttpRequest();
    }
    return $request;
  }
}
