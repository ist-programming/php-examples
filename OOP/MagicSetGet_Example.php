<?php

class A
{

  public $a = 'Default value';
  private $b = 'Default value';

  public function __set($name, $value)
  {
    echo "Tried to set " . $name . ' = ' . $value . "\n";
    $this->$name = '!! '.$value;
  }

  public function __get($name)
  {
    echo 'Tried to get ' . $name . "\n";
  }

}

echo '<pre>';
echo "\n\nInit object\n";
$a = new A();
var_dump($a);
echo "\n\nSet a value\n";
$a->a = "A value";
var_dump($a);
echo "\n\nSet b value\n";
$a->b = "B value";
var_dump($a);
echo "\n\nSet c value\n";
$a->c = "C value";
var_dump($a);

echo "\n\nTry to set new dynamic field to object of StdClass\n";
$a = new StdClass();
$a->a = 42;
var_dump($a);
