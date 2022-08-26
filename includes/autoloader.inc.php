<?php

spl_autoload_register('autoload');

function autoload($class) {
  $url = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

  if(strpos($url, 'includes') !== false) {
    $path = '../classes/';
  }
  else {
    $path = 'classes/';
  }
  $extention = '.class.php';
  $filePath = $path . strtolower($class) . $extention;

  if(!file_exists($filePath)) {
    return false;
  }
  
  require_once $filePath;
}
