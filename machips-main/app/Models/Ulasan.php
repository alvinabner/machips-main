<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ulasan extends Model
{
    use HasFactory;

    protected  $fillable  = ['sale_id',
                            'user_id',
                            'ulasan',
                            'rating'];

    public function sale()
    {
        return $this->belongsTo(Sale::class, 'sale_id', 'id');
    }
}
