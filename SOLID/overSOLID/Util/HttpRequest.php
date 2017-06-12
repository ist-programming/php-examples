<?php

require_once './Util/Request.php';

/**
 * Description of HttpRequest
 *
 * @author Alexander Ferenets (aka Istamendil) – http://istamendil.info
 */
class HttpRequest implements Request
{
  protected $cookie = [];
  protected $get = [];
  protected $headers = [];
  protected $post = [];
          
  public function __construct()
  {
    $this->cookie = $_COOKIE;
    $this->get = $_GET;
    $this->post = $_POST;
    $this->headers = getallheaders(); // Only apache
  }

  public function getParameter($name)
  {
    if(isset($this->get[$name])){
      return $this->get[$name];
    }
    elseif(isset($this->post[$name])){
      return $this->post[$name];
    }
    else{
      return NULL;
    }
  }

}
