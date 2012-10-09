<?php

class Page_Controller extends Base_Controller {
  public function get_view($slug = '')
  {

    $path = path('storage').'site/wiki/'.$slug.'.md';
    
    if(!is_file($path)) {
      return Response::error('404');
    }
    
    $content = File::get($path);
    $content = Parse::process($this->structure,$content);
    $content = Sparkdown\Markdown($content);
    
    $title = str_replace('_',' ',$slug);
    
    Section::inject('title', ucwords($title));
    Section::inject('content',$content);
    
    return View::make('template.template');
  }
}