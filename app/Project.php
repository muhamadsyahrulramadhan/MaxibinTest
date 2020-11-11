<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model {
    public $primaryKey = 'id_project';
    public $table = 'projects';
  protected $fillabe = [
      'name_project'
  ];
  
}