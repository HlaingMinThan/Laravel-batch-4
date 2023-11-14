<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->belongsTo(Category::class, 'cat_id');
    }

    public function scopeFilter($query, $filters)
    {
        if ($filters['search'] ?? null) {
            $query
                ->where(function ($query) use ($filters) {
                    $query
                        ->where('title', 'Like', '%' . $filters['search'] . '%')
                        ->orWhere('body', 'Like', '%' . $filters['search'] . '%');
                });
        }
        if ($filters['category'] ?? null) {
            $query->whereHas('category', function ($catQuery) use ($filters) {
                $catQuery->where('slug', $filters['category']);
            });
        }
        if ($filters['author'] ?? null) {
            $query->whereHas('author', function ($userQuery) use ($filters) {
                $userQuery->where('username', $filters['author']);
            });
        }
    }

    public function author() //user_id
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
