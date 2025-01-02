<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Category extends Model
{
    use HasFactory , HasTranslations , SoftDeletes;

    protected $guarded = [];
    public $translatable = ['name'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
