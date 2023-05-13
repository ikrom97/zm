<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use League\CommonMark\Extension\SmartPunct\Quote;

class Tag extends Model
{
  use HasFactory, Sluggable;

  protected $guarded = [];

  public function sluggable(): array
  {
    return [
      'slug' => [
        'source' => ['title', 'id']
      ]
    ];
  }

  public function quotes()
  {
    return $this->belongsToMany(Quote::class, 'quote_tag');
  }
}
