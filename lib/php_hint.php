<?php
function php_hinting($code, $message, $file, $line) {
  if (error_reporting() & $code) {
    // Scalar Type-Hinting patch.
    if ($code == E_RECOVERABLE_ERROR) {
      $regexp = '/^Argument (\d)+ passed to (.+) must be an instance of (?<hint>.+), (?<given>.+) given/i';
      if (preg_match($regexp, $message, $match)) {
        $given = $match[ 'given' ];
        // namespaces support.
        $e = explode('\\', $match[ 'hint' ]);
        $hint  = end($e);
        if ($hint == $given) return true;
      }
    }
    return false;
  }
}
set_error_handler('php_hinting');