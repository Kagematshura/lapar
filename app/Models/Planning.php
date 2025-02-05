<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planning extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'kcal_intake'];
    protected $table = 'planning';
    public function user(){
        return $this->belongsTo(User::class);
    }

}
