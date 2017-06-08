<?php

require_once './Repository/ColonFileCountryRepository.php';
require_once './Repository/CommaFileCountryRepository.php';
require_once './Repository/WebServiceCountryRepository.php';
require_once './Printer/Printer.php';
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
  
  protected $argv = [];
  
  protected $countryRepository;
  protected $printer;

  public function __construct($argv, CountryRepository $countryRepository, Printer $printer)
  {
    $this->argv = $argv;
    $this->countryRepository = $countryRepository;
    $this->printer = $printer;
  }

  public function run()
  {
    switch($this->argv[0]) {
      case self::ACTION_ALL:
        $countries = $this->countryRepository->findAll();
        $this->printer->printList($countries);
        break;
      case self::ACTION_SEARCH:
        $countries = $this->countryRepository->findByName($this->argv[1]);
        $this->printer->printList($countries);
        break;
      default:
        echo 'Unknown action.';
        break;
    }
  }

}
