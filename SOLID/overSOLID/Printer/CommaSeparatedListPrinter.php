<?php

require_once './Printer/Printer.php';

/**
 * Description of CommaSeparatedListPrinter
 *
 * @author Alexander Ferenets (aka Istamendil) – http://istamendil.info
 */
class CommaSeparatedListPrinter implements Printer
{
  /**
   * Print list
   * @param array $list
   */
  public function printList(array $list){    
    $tmp = [];
    foreach($list as $item) {
      $tmp[] = $item['name'] . ' (' . $item['code'] . ')';
    }
    echo implode(', ', $tmp);
  }
}
