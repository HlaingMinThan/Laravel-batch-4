<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    // protected $fillable = ['name', 'slug'];


    //     blogs categories
    // a category hasmany blogs

    public function blogs()
    {
        return $this->hasMany(Blog::class, 'cat_id');
    }
}
