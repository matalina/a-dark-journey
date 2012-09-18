<?php
class User extends Glib
{
  protected $rules = array(
    'username' => 'required|alpha_dash|unique:users',
    'email' => 'required|email|unique:users',
    'password' => 'required|confirmed',
    'first_name' => 'required|alpha_dash',
    'last_name' => 'required|alpha_dash'
  );
  
  public function page()
  {
    return $this->has_many('Page');
  }
}