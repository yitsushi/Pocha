<?php
namespace Test;
$__current = array(
  'describe_name' => 'xXx',
  'it_phrase' => 'XxX',
  'test' => 0,
  'pass' => 0,
  'fail' => 0
);

function done($is_ok) {
  global $__current;
  $__current['test'] += 1;
  if ($is_ok) {
    echo "✔";
    $__current['pass'] += 1;
  } else {
    echo "✖";
    $__current['fail'] += 1;
  }
  echo " {$__current['describe_name']} {$__current['it_phrase']}\n";
  return $is_ok;
}

function describe(\string $name, \Closure $callback) {
  global $__current;
  $__current['describe_name'] = $name;
  
  $return_value = $callback();
  $__current['describe_name'] = 'xXx';
  
  echo sprintf("  %d test / %d passed / %d failed\n\n",
               $__current['test'],
               $__current['pass'],
               $__current['fail']);
  
  $__current['test'] = 0;
  $__current['pass'] = 0;
  $__current['fail'] = 0;
  return $return_value;
}

function it(\string $phrase, \Closure $callback) {
  global $__current;
  $__current['it_phrase'] = $phrase;
  
  $return_value = $callback(function($is_ok) { return done($is_ok); });
  $__current['it_phrase'] = 'XxX';
  return $return_value;
}