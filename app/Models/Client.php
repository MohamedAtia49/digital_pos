<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function phone(): Attribute
    {
        return Attribute::make(
            // Accessor: Format the phone numbers as a string
            get: fn ($value) => is_array($phoneNumbers = json_decode($value, true))
                ? implode(' - ', $phoneNumbers)
                : $value,

            // Mutator: Encode the array of phone numbers as JSON
            set: fn ($value) => json_encode(array_filter($value ?? []))
        );
    }

    // Relations

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }
}
