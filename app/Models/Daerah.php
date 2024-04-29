<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Daerah extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function daerah()
    {
        return $this->belongsTo(Daerah::class);
    }
}
