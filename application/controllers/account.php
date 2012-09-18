<?php
class Account_Controller extends Base_Controller 
{
  function post_login() {
    $user = new User();
    
    $rules = array(
      'username' => 'required|alpha_dash|exists:users',
      'password' => 'required'
    );
    
    $input = Input::all();
    
    if($user->is_valid($input,$rules)) {
      if(Auth::attempt($input)) {
        Session::flash('success', 'You have successfully logged in.');
        
        //Update last login
        $user = Auth::user();
        $user->last_login = date('Y-m-d H:i:s');
        $user->save();
        
        return Redirect::to('/');
      } 
      else {
        Session::flash('error', 'Username and Password do not match.');
        return Redirect::to('/');
      }
    }
    else {
      Session::flash('error', 'Something is wrong with your Username and/or Password.');
      return Redirect::to('/');
    }
  }
  
  function get_profile() {
    return View::make('template.template');
  }
  
  function get_logout() {
    Auth::logout();
    Session::flash('success', 'You have successfully logged out.');
    return Redirect::to('/');
  }
}