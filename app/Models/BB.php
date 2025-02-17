<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BB extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'body_weight'];
    protected $table = 'bb';
    protected $casts = [
        'created_at' => 'datetime',
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }

}
