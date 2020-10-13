<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductMediaGallery extends Model
{
    protected $table = 'product_media_gallery';
    protected $fillable = ['product_id', 'value', 'label'];
    public $timestamps = false;
}
