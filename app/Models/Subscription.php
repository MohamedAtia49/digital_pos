<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    // Explicitly set the connection to the 'landlord' database
    protected $connection = 'landlord';
    protected $guarded = [];

    //Mutators and Accessors
    public function getArabicStartDateAttribute()
    {
        // Format the date
        $formattedDate = Carbon::parse($this->start_date)->format('Y/m/d');

        // Convert digits to Arabic
        $arabicNumbers = ['٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩'];
        return str_replace(range(0, 9), $arabicNumbers, $formattedDate);
    }

    public function getEnglishStartDateAttribute()
    {
        return Carbon::parse($this->start_date)->format('m/d/Y');
    }
    public function getArabicEndDateAttribute()
    {
        // Format the date
        $formattedDate = Carbon::parse($this->end_date)->format('Y/m/d');

        // Convert digits to Arabic
        $arabicNumbers = ['٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩'];
        return str_replace(range(0, 9), $arabicNumbers, $formattedDate);
    }

    public function getEnglishEndDateAttribute()
    {
        return Carbon::parse($this->end_date)->format('m/d/Y');
    }

    // Relations
    public function tenant()
    {
        return $this->belongsTo(Tenant::class,'tenant_id');
    }
}
