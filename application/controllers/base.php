<?php

class Base_Controller extends Controller 
{
  public $restful = true;
  protected $structure;
  
  public function __construct() {
    parent::__construct();
    
    $structure = Parse::structure(path('storage').'site/wiki');
    ksort($structure,SORT_STRING);
    
    $this->structure = $structure;
    
    $menus = array(
      array(
        'attributes' => array(),
        'items' => array(
          array('label'=>'Wiki', 'url' => URL::to('/')),
          array('label'=>'Works', 'url'=> URL::to_action('works@view')),
        )
      )
    );
    
    $logo = HTML::image('assets/images/logo.png','A Dark Journey',array('id' => 'logo'));
    
    $attr = array('class' => 'navbar-inverse');
    $navbar = Navbar::create('A Dark Journey', URL::to('/'), $menus, Navbar::FIX_TOP, true, $attr);
    
    Section::inject('navbar', $navbar);
  }
  
	/**
	 * Catch-all method for requests that can't be matched.
	 *
	 * @param  string    $method
	 * @param  array     $parameters
	 * @return Response
	 */
	public function __call($method, $parameters)
	{
		return Response::error('404');
	}

}