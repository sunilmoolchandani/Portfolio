<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    //use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'user_id',
        'category_name',
        'password',
    ];
    public function user()
    {
        return $this->hasone(User::class,'id','user_id');
    }
}
