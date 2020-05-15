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

    public function product()
    {
        return $this->belongsTo( Product::class );
    } // End method product

} # End class ProductGallery
