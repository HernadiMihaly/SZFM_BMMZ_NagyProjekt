<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Valasz extends Model
{
    use HasFactory;
    
    protected $table = 'valasz';
    
    public function kerdes()
    {
        return $this->belongsTo(Kerdes::class);
    }
}
