<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Task extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'user_id', 'name', 'desc', 'done', 'priority'
  ];


  public function user() {
    return $this->belongsTo('App\User');
  }

}
