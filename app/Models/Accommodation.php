<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accommodation extends Model
{
    use HasFactory;

    protected $fillable = [
        
        'id',
        'name', 
        'description',
		'thumbnail',
		'header',
		'type',
		'amenities',
        'address', 
        'contactno', 
        'fee', 
    
    ];
    
}
