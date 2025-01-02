<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Product extends Model
{

    use HasFactory , HasTranslations , SoftDeletes;
    protected $guarded = [];
    public $translatable = ['name','description'];

    /**
     * Calculate profit amount (sale price - purchase price).
     */
    public function getProfitAttribute()
    {
        return $this->sale_price - $this->purchase_price;
    }

    /**
     * Calculate profit percentage.
     */
    public function getProfitPercentAttribute()
    {
        return $this->purchase_price > 0
            ? round(($this->profit / $this->purchase_price) * 100, 2)
            : 0;
    }

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }

}
