<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
// use Illuminate\Database\Eloquent\Model;

class Admin extends Authenticatable
{
    use HasFactory;
    protected $fillable = [
        'username',
        'password'
    ];
    protected $hidden = [
        'remember_token'
    ];
    protected $table = 'admin';
    public function getAuthIdentifierName()
    {
        return 'username';
    }
}
