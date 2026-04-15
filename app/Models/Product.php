<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $table = 'product';
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


}
