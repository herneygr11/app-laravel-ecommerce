<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductGallery extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'image', 'image_path', 'product_id'
    ];

    public function Product()
    {
        return $this->belongsTo( Product::class );
    } // End method Product

} # End class ProductGallery
