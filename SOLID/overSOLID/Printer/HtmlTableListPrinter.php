<?php

require_once './Printer/Printer.php';

/**
 * Description of HtmlTableListPrinter
 *
 * @author Alexander Ferenets (aka Istamendil) – http://istamendil.info
 */
class HtmlTableListPrinter implements Printer
{
          
  /**
   * Print list
   * @param array $list
   */
  public function printList(array $list){
    if(!count($list)){
      return;
    }
    echo '<table>';
    foreach($list as $row){
      echo '<tr>';
      foreach($row as $cell){
          echo '<td>';
          echo $cell;
          echo '</td>';
      }
      echo '</tr>';
    }
    echo '</table>';
  }
}
