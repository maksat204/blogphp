<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emloyee extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'surname',
        'age',
        'phone_number'
    ];
}
