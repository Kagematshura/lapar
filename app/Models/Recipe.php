<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Recipe extends Model
{
    use HasFactory;
    protected $fillable = [
        'recipe_name', 'description', 'ingredient', 'instruction', 'image', 'total_kcal', 'like_count', 'dislike_count'
    ];
    protected $table = 'recipe';
}
