<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{

    protected $fillable = [
        'name', 
        'description', 
        'user_id', 
        'targetprice', 
        'contribution', 
        'is_achieved'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
