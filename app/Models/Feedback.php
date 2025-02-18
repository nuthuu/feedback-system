<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    // Define the table name if different from the plural of the model name
    protected $table = 'feedbacks';

    // Define the fillable attributes
    protected $fillable = [
        'user_id',
        'feedback'
    ];

    // Define the relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

