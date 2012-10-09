<?php

class Parse {
  public static function process($structure,$content) {
    foreach($structure as $dir => $struct) {
      if(!is_array($struct)) {
        $parts = explode('.',$struct);
        $temp= str_replace('_',' ',$parts[0]);
        if($parts[0] != 'home'){
          $content = preg_replace('/(?<![\[\(])\b('.$temp.')\b(?<![\]\)])/i','[$0]('.URL::to_action('page/view/'.$parts[0].')'),$content);
        }
      }
      else {
        $content = Parse::process($struct,$content);
      }
    }
    
    // Return content
    return $content;
  }
  
  public static function structure($path) {
    $structure = array();
    $dir = scandir($path);
    foreach($dir as $item) {
      if(is_dir($path.'/'.$item) && $item != '.' && $item != '..') {
        $structure[$item] = Parse::structure($path.'/'.$item);
      }
      else if($item != '.' && $item != '..' ){
        $structure[] = $item;
      }
    }
    ksort($structure);
    return $structure;
  }
  
  public static function index($path) {
    $file = File::get($path);
    $temp = str_replace('index.txt','',$path);
    $base = explode('/',str_replace(path('storage').'site/works/','',$temp));
    
    $output = '##Table of Contents'.PHP_EOL.PHP_EOL;
  
    $lines = explode(PHP_EOL,$file);
    foreach($lines as $line) {
      $base = explode('/',str_replace(path('storage').'site/works/','',$temp));
      
      if(!empty($line)) {
        $text = str_replace('_',' ',$line);
        if($base[count($base) - 1] == '') {
          unset($base[count($base) - 1]);
        }
        array_push($base,$line);
        $output .= '* ['.ucwords($text).']('.URL::to_action('works@view',$base).')'.PHP_EOL;
      }
    }
    
    return $output;
  }
}
