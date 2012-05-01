<?php
class MyMath {
  public static function sum() {
    if (func_num_args() < 1) throw new Exception('Invalid arguments.');
    $arguments = func_get_args();
    if (is_array($arguments[0])) return array_sum($arguments[0]);
    
    return array_sum($arguments);
  }
  
  public static function factorial(integer $number) {
    if ($number < 1) throw new Exception('Invalid argument.');
    if ($number < 2) return $number;
    return $number * self::factorial($number - 1);
  }
}