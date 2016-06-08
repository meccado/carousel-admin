<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarouselImage extends Model
{
  protected $fillable = ['carousel_id', 'file_name', 'file_size', 'file_mime', 'file_path', 'created_by'];

  public function Carousel()
  {
    return $this->belongsTo(\App\Carousel::class);
  }
}
