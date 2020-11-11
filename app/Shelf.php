<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shelf extends Model {
    public $primaryKey = 'id_shelf';
    public $table = 'shelves';
  protected $fillabe = [
      'name_shelves', 'id_location'
  ];
  
  public function location(){
    return $this->hasOne('App\Location', 'id_location', 'id_location');
  }
  public function locations() {
    return $this->belongsTo(\App\Location::class);
}
}