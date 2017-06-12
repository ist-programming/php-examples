<?php

/**
 * 
 * Description of Configuration
 *
 * @author Alexander Ferenets (aka Istamendil) – http://istamendil.info
 */
class Configuration
{
  protected $config = [];
  
  /**
   * Load config from INI file
   * 
   * @param string $file
   * @throws \InvalidArgumentException
   */
  public function load($file){
    if(file_exists($file)){
      if(pathinfo($file, PATHINFO_EXTENSION) === 'ini'){
        $this->config = array_merge($this->config, parse_ini_file($file));
      }
      else{
        throw new \InvalidArgumentException('File "'.$file.'" is not an INI file. Can\'t read configuration from it.');
      }
    }
    else{
      throw new \InvalidArgumentException('File "'.$file.'" does not exist. Can\'t read configuration from it.');
    }
  }
  
  public function getParameter($param){
    return isset($this->config[$param]) ? $this->config[$param] : NULL;
  }
  public function getAllParameters(){
    return $this->config;
  }
}
