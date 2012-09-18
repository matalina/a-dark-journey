<?php

class Page_Controller extends Base_Controller {
  public function get_view($slug)
  {
    $page = Page::where('slug','=',$slug)->first();
    
    // If the slug doesn't exist return a 404
    if(empty($page)) {
      return Response::error('404');
    }
    
    // Content & Title
    $content = $page->markdown;
    $title = $page->title;
    
    // Get Aliases
    $page_id = $page->id;
    $aliases = Alias::where('page_id','!=',$page_id)->get();
    
    
    $content = Parse::process($aliases,$content);
    
    // Add Edit Link if logged in
    if(!Auth::guest()) {
      $content .= '<p class="clearfix"><a href="'.URL::to_action('page@edit',array($page_id)).'" class="btn btn-inverse pull-right">Edit Page</a></p>';
    }
    
    Section::inject('title', $title);
    Section::inject('content',$content);
    
    return View::make('template.template');
  }
  
  function get_edit($page_id) {
    return View::make('template.template');
  }
  
  function post_edit() {
    return View::make('template.template');
  }
  
  function get_new() {
    
  }
  
  function post_new() {
    
  }
}