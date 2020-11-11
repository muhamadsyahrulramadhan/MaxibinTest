<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Box extends Model {
    public $primaryKey = 'id_box';
    public $table = 'boxes';
  protected $fillabe = [
      'name_box', 'id_shelf', 'id_location'
  ];
  public function location() {
    return $this->belongsTo(\App\Location::class);
}
}