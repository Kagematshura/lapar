<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Recipe extends Model
{
    use HasFactory;
    protected $fillable = [
        'recipe_name', 'description', 'ingredient', 'instruction', 'image', 'total_kcal', 'user_id',
    ];
    protected $table = 'recipes';

    public function likes()
    {
        return $this->hasMany(Like::class);
    }
}
