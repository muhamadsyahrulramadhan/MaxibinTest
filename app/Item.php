<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model {
    public $primaryKey = 'id_item';
    public $table = 'items';
  protected $fillabe = [
      'name_item', 'id', 'id_box', 'id_location', 'id_project'
  ];

  public function user(){
    return $this->hasOne('App\User', 'id', 'id');
  }
  public function box(){
    return $this->hasOne('App\Box', 'id_box', 'id_box');
  }
  public function location(){
    return $this->hasOne('App\Location', 'id_location', 'id_location');
  }
  public function project(){
    return $this->hasOne('App\Project', 'id_project', 'id_project');
  }
}

