<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    protected $table = 'forum';
    protected $fillable = [
        'title',
        'content',
        'user_id',     
        'comment_count',
        'status',
    ];

    

        // Define the relationship with the User model
        public function user()
        {
            return $this->belongsTo(User::class);
        }
        
        public function comments()
        {
            return $this->hasMany(Comment::class);
        }
}
