<?php

class Base_Controller extends Controller 
{
  public $restful = true;
  
  public function __construct() {
    parent::__construct();
    
    if(Auth::guest()) {
      $menu = array();
      $login_form = Form::open('account/login','POST', array('class' => 'navbar-form pull-right form-inline'));
      $login_form .= Form::text('username', null, array('class' => 'input-small', 'placeholder' => 'Username')).' '; 
      $login_form .= Form::password('password', array('class' => 'input-small', 'placeholder' => 'Password')).' '; 
      $login_form .= Form::submit('Login');
      $login_form .= Form::close();
    }
    else {
      $menu = array(
        'attributes' => array(),
        'items' => array(
          array(
            'label' => 'New Page',
            'url' => URL::to_action('page@new'),
          )
        ),
      );
      $user = Auth::user();
      $login_form = array(
        'attributes' => array('class' => 'pull-right'),
        'items' => array(
          array(
            'label' => 'Welcome, '.$user->first_name, 
            'url' => URL::to_action('account@profile'),
          ),
          array(
            'label' => 'Logout',
            'url' => URL::to_action('account@logout'),
          ),
        )
      );
    }
    
    $menus = array(
      $menu,
      $login_form,
    );
    
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