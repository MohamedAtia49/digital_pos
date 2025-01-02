<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Manger extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table =['mangers'];
    protected $connection = 'landlord';  // Use the landlord database connection

    protected $guarded = [];
}
