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
      'user_id', 'name', 'desc', 'is_done', 'is_important'
  ];

  protected $attributes = [
    'is_done' => false,
    'is_important' => false
  ];


  public function user() 
  {
    return $this->belongsTo(User::class);
  }

}
