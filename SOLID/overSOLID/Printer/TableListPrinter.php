<?php

require_once './Printer/Printer.php';

/**
 * Description of TableListPrinter
 *
 * @author Alexander Ferenets (aka Istamendil) – http://istamendil.info
 */
class TableListPrinter implements Printer
{
  const COL_LENGTH = 20;
          
  /**
   * Print list
   * @param array $list
   */
  public function printList(array $list){
    if(!count($list)){
      return;
    }
    $columnsCount = count(current($list));
    reset($list);
    $this->printRowDivider($columnsCount);
    foreach($list as $item) {
      $this->printRow($item, $columnsCount);
      $this->printRowDivider($columnsCount);
    }
  }
  
  protected function printRowDivider($columnsCount){
    echo '+';
    echo str_repeat(str_repeat('-', self::COL_LENGTH+2).'+', $columnsCount);
    echo "\n";
  }
  protected function printRow($data, $columnsCount){
    if(count($data) !== $columnsCount){
      throw new \InvalidArgumentException('Count of cells of current row aren\'t equal to count of cells in the first row.');
    }
    echo '| ';
    foreach($data as $cell){
      if(!is_string($cell)){
        throw new \InvalidArgumentException('Array must be array of string arrays.');
      }
      if(mb_strlen($cell) > self::COL_LENGTH){
        echo mb_substr($cell, 0, 18).'...';
      }
      else{
        $add = (self::COL_LENGTH - mb_strlen($cell))/2;
        echo str_repeat(" ", floor($add));
        echo $cell;
        echo str_repeat(" ", ceil($add));
      }
      echo ' |';
    }
    echo "\n";
  }
}
