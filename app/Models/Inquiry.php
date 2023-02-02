<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inquiry extends Model
{
    use HasFactory, SoftDeletes;
    

    protected $fillable = [

        'name',
        'last_name',
        'email',
        'inquiry',
        'phone_number',
        'pending',
    ];
}
