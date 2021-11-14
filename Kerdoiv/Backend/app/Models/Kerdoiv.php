<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kerdoiv extends Model
{
    use HasFactory;
	
	protected $table = 'kerdoivek';
	
	protected $fillable = ['title', 'is_separated', 'is_randomised', 'kerdesek'];
        
        //protected $visible = ['title', 'is_separated', 'is_randomised', 'kerdesek', 'id'];
	
	public function kerdesek(){
		return $this->hasMany(Kerdes::class, 'kerdoiv_id');
	}
}
