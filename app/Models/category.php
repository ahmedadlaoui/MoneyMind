<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'category',
        'description',
    ];


    public function depenses()
    {
        return $this->hasMany(Depense::class, 'category_id');
    }
}
