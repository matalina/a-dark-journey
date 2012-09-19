<?php

class Home_Controller extends Base_Controller 
{
	public function get_index()
	{
	  $path = path('storage').'site/a_dark_journey.md';
	  $content = File::get($path);
    $content = Parse::process($this->structure,$content);
    $content = Sparkdown\Markdown($content);
	  Section::inject('content',$content);
    Section::inject('title','Home');
    Section::inject('description','A Dark Journey started out as a Wheel of Time Role Playing character at Dragonmount.com. I loved the character so much that I converted her to an original world creation');
		return View::make('template.template');
	}
}