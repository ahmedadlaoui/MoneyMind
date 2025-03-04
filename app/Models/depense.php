<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Depense extends Model
{
    use HasFactory;

    protected $table = 'depenses'; // Explicitly defining the table name

    protected $fillable = [
        'title',
        'date',
        'category_id',
        'price',
        'type',
        'user_id'
    ];

    /**
     * Relationship: A depense belongs to a category.
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
