<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carousel extends Model
{
    protected $fillable = ['name','description', 'created_by', 'sort_order', 'published'];

    public function images()
    {
      return $this->hasMany(\App\CarouselImage::class);
    }
}
