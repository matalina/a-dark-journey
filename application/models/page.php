<?php
class Page extends Glib 
{
  protected $rules = array(
    'slug' => 'required|unique:page|alpha_dash',
    'title' => 'required',
    'markdown' => 'required',
    'parent_id' => 'required|integer',
    'order' => 'integer',
    'user_id' => 'required|integer'
  );
  
  public function user()
  {
    return $this->belongs_to('User');
  }
  
  public function alias()
  {
    return $this->has_many('Alias');
  }
}