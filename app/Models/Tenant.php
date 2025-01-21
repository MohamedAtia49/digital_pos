<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    use HasFactory;

    // Explicitly set the connection to the 'landlord' database
    protected $connection = 'landlord';
    protected $guarded = [];

    //Mutators and Accessors
    public function getArabicDateAttribute()
    {
        // Format the date
        $formattedDate = Carbon::parse($this->created_at)->format('Y/m/d');

        // Convert digits to Arabic
        $arabicNumbers = ['٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩'];
        return str_replace(range(0, 9), $arabicNumbers, $formattedDate);
    }

    public function getEnglishDateAttribute()
    {
        return Carbon::parse($this->created_at)->format('m/d/Y');
    }

    // Relations
    public function subscription()
    {
        return $this->hasOne(Subscription::class, 'tenant_id', 'id');
    }
}
