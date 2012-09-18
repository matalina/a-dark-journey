<?php
class Glib extends Eloquent 
{
  protected $rules = array();
  protected $errors;
  public static $timestamps = true;
  
  public function is_valid($data,$rules = null)
  {
    if($rules == null) {
      $rules = $this->rules;
    }
    
    // make a new validator object
    $v = Validator::make($data, $rules);
    // check for failure
    if ($v->fails())
    {
      // set errors and return false
      $this->errors = $v->errors;
      return false;
    }
    // validation pass
    return true;
  }
  
  public function errors()
  {
    return $this->errors;
  }
}