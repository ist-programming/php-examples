<?php

namespace Util;

// Here we're using required (downloaded) library
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

/**
 * Description of Logger
 *
 * @author Alexander Ferenets (aka Istamendil) – http://istamendil.info
 */
class MainFileLogger
{

  const NAME = 'main';
  const FILE = './info.log';
  
  protected $logger;

  public function __construct()
  {
    $this->logger = new Logger(self::NAME);
    $this->logger->pushHandler(new StreamHandler(self::FILE, Logger::INFO));
  }

  public function log($var)
  {
    ob_start();
    var_dump($var);
    $info = ob_get_clean();
    $this->logger->info($info);
  }

}
