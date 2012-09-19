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
}
