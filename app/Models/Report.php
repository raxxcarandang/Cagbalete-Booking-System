<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    // Specify the table name if it's not the plural form of the model's name
    protected $table = 'reports';

    // Allow mass assignment for the fields
    protected $fillable = [
        'report_date',
        'report_type',
        'total_bookings',
        'total_foreigners',
		'total_maubanins',
        'total_filipinos',
        'total_male',
        'total_female',
        'total_visitors',
        'total_specialneeds',
        'total_zero_to_7',
        'total_13_to_50',
        'total_above_60',
        'total_travelmeans',
        'total_parking',
        'total_boating',
        'status',
    ];

    
    protected $dates = [
        'report_date',
    ];

}
