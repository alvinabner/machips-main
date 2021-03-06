<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
<<<<<<< HEAD
    // protected $guarded = [];
=======
    protected $guarded = [];
>>>>>>> e64af6b (First Commit)

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(Product::class, 'user_id', 'id');
    }
}
