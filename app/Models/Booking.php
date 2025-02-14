<?php
	
	namespace App\Models;
	
	use Illuminate\Database\Eloquent\Factories\HasFactory;
	use Illuminate\Database\Eloquent\Model;
	use App\Models\User;
	
	class Booking extends Model
	{
		use HasFactory;
		protected $fillable = [
        'id',
        'userid', 
        'accommodationid', 
        'arrival', 
        'departure', 
        'foreigners', 
        'filipinos', 
        'maubanins', 
        'totalmale', 
        'totalfemale', 
        'totalvisitors', 
        'specialneeds', 
        'zeroto7yold',
        'thirteento50yold',
        'above60yold',
        'travelmeans', 
        'parking', 
        'boating', 
        'purpose', 
        'status',
		'remark',
		];
		
		public function user() {
			return $this->belongsTo(User::class, 'userid');  
		}
		
	}
