<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kerdes extends Model
{
    use HasFactory;
	
	public function kerdoiv()
    {
        return $this->belongsTo(Kerdoiv::class);
    }
}
