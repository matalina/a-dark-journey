<?php

class Works_Controller extends Base_Controller {
  public function get_view($series = '', $book = '', $chapter = '', $scene = '')
  {
    $path = path('storage').'site/works/';
    $index = path('storage').'site/works/';
    
    if($series == '' && $book == '' && $chapter == '' && $scene == '') {
      $path .= 'works.md';
      $index .= 'index.txt';
      $slug = 'Works';
    }
    else if($series != '' && $book == '' && $chapter == '' && $scene == '') {
      $path .= $series.'.md'; // Get book file
      $index .= $series.'/index.txt'; // get index file
      $slug = $series;
    }
    else if($series != '' && $book != '' && $chapter == '' && $scene == '') {
      $path .= $series.'/'.$book.'.md'; // Get book file
      $index .= $series.'/'.$book.'/index.txt'; // get index file
      $slug = $book;
    }
    else if($series != '' && $book != '' && $chapter != '' && $scene == '') {
      $path .= $series.'/'.$book.'/'.$chapter.'.md'; // Get chapter file
      $index .= $series.'/'.$book.'/'.$chapter.'/index.txt'; // get index file
      $slug = $chapter;
    }
    else {
      $path .=  $series.'/'.$book.'/'.$chapter.'/'.$scene.'.md'; // Get scene file
      $index .= $series.'/'.$book.'/'.$chapter.'/index.txt'; // get index file
      $slug = $scene;
    }
    
    if(!is_file($path)) {
      return Response::error('404');
    }
    
    $content = File::get($path);
    $content = Parse::process($this->structure,$content);
    $content .= PHP_EOL.Parse::index($index);
    $content = Sparkdown\Markdown($content);
    
    $title = str_replace('_',' ',$slug);
    
    Section::inject('title', ucwords($title));
    Section::inject('content',$content);
    
    return View::make('template.template');
  }
}