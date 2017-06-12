<?php

require_once './Util/Configuration.php';
require_once './Util/Request.php';
require_once './Util/HttpRequest.php';
require_once './Util/CliRequest.php';
require_once './Util/RequestBuilder.php';
require_once './Repository/ColonFileCountryRepository.php';
require_once './Repository/CountryRepositoryFactory.php';
require_once './Repository/CommaFileCountryRepository.php';
require_once './Repository/WebServiceCountryRepository.php';
require_once './Printer/Printer.php';
require_once './Printer/PrinterFactory.php';
require_once './Printer/HtmlTableListPrinter.php';
require_once './Printer/TableListPrinter.php';
require_once './Printer/CommaSeparatedListPrinter.php';

/**
 * Description of App
 *
 * @author Alexander Ferenets (aka Istamendil) – http://istamendil.info
 */
class Application
{

  const ACTION_ALL = 'all';
  const ACTION_SEARCH = 'search';

  private static $_instance = NULL;
  protected $config;
  protected $countryRepository;
  protected $printer;
  protected $request;

  private function __construct(Configuration $config, Printer $printer = NULL)
  {
    $this->config = $config;

    $this->request = RequestBuilder::build();

    if(!$printer) {
      $this->printer = PrinterFactory::getPrinter($this->request);
    } else {
      $this->printer = $printer;
    }

    $this->countryRepository = CountryRepositoryFactory::getRepository(
                    $this->config->getParameter('source')
    );
  }

  private function __clone()
  {
    
  }

  public static function getInstance(Configuration $config, Printer $printer = NULL)
  {
    if(is_null(self::$_instance)) {
      self::$_instance = new self($config, $printer);
    }
    return self::$_instance;
  }

  public function run()
  {
    switch($this->request->getParameter('action')) {
      case self::ACTION_ALL:
        $countries = $this->countryRepository->findAll();
        $this->printer->printList($countries);
        break;
      case self::ACTION_SEARCH:
        echo 'Search by '.$this->request->getParameter('param')."\n";
        $countries = $this->countryRepository->findByName($this->request->getParameter('param'));
        $this->printer->printList($countries);
        break;
      default:
        echo 'Unknown action.';
        break;
    }
  }

}
