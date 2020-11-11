<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model {
    public $primaryKey = 'id_location';
    public $table = 'locations';
  protected $fillabe = [
      'name_location'
  ];
  public function shelf() {
    return $this->hasMany(\App\Shelf::class);
}
}