<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wish extends Model
{
    use HasFactory;

    protected $table = 'wishes';  // Explicitly defining the table name (optional if it follows Laravel's naming convention)

    protected $fillable = [
        'title',
        'user_id',
        'price',
        'is_achieved',
        'imageURL',
        'category_id',  // Updated to category_id
    ];

    /**
     * Relationship: A wish belongs to a user.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Relationship: A wish belongs to a category.
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
