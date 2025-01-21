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

    // Accessor to get the sale price in Arabic numbers
    public function getSalePriceArabicAttribute()
    {
        // Convert sale_price to a string with two decimal places
        $formattedPrice = number_format($this->sale_price, 2);

        // Replace English numerals with Arabic numerals
        $arabicNumbers = ['0' => '٠', '1' => '١', '2' => '٢', '3' => '٣', '4' => '٤', '5' => '٥', '6' => '٦', '7' => '٧', '8' => '٨', '9' => '٩'];
        $arabicFormattedPrice = strtr($formattedPrice, $arabicNumbers);

        return $arabicFormattedPrice;
    }
    // Accessor to get the sale price in Arabic numbers
    public function getStockArabicAttribute()
    {
        $englishStock = $this->stock;
        // Replace English numerals with Arabic numerals
        $arabicNumbers = ['0' => '٠', '1' => '١', '2' => '٢', '3' => '٣', '4' => '٤', '5' => '٥', '6' => '٦', '7' => '٧', '8' => '٨', '9' => '٩'];
        $arabicStock = strtr($englishStock, $arabicNumbers);

        return $arabicStock;
    }

    // Relations
    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }

    public function sales()
    {
        return $this->belongsToMany(Sale::class,'product_sale');
    }

}
