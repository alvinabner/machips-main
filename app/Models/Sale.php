<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;
    protected $fillable = ['ref_no',
                            'status',
                            'grand_total',
                            'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function prodSale()
    {
        return $this->hasMany(ProductSale::class);
    }

    public function ulasan()
    {
        return $this->hasOne(Ulasan::class);
    }

    public function buktiPembayaran()
    {
        return $this->hasOne(BuktiPembayaran::class);
    }
}
