<?php
class Alias extends Glib 
{
  protected $rules = array(
    'alias' => 'required'
  );
  
  public function page()
  {
    return $this->belongs_to('Page');
  }
}