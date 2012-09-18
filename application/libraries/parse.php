<?php

class Parse {
  public static function process($aliases,$content) {
    // Create Markdown links of all aliases
    foreach($aliases as $alias) {
      $content = preg_replace('/('.$alias->alias.')/i','[$1]('.URL::to('view/'.$alias->slug).')',$content);
    }
    // Return parsed Markdown
    return Sparkdown\Markdown($content);
  }
}
