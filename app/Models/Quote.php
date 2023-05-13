<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
  use HasFactory;

  protected $guarded = [];

  public function tags()
  {
    return $this->belongsToMany(Tag::class, 'quote_tag');
  }
}
