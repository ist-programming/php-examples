<?php

require_once './Util/Request.php';
require_once './Util/CliRequest.php';
require_once './Util/HttpRequest.php';
require_once './Printer/CommaSeparatedListPrinter.php';
require_once './Printer/HtmlTableListPrinter.php';
require_once './Printer/TableListPrinter.php';

/**
 * Description of PrinterFactory
 *
 * @author Alexander Ferenets (aka Istamendil) – http://istamendil.info
 */
class PrinterFactory
{
  public static function getPrinter(Request $request){
    if($request instanceof HttpRequest){
      return new HtmlTableListPrinter();
    }
    else{
      return new TableListPrinter();
    }
  }
}
