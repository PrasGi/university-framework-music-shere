<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'forumcomment';
    protected $fillable = [
        'comment_content',
        'user_id',
        'forum_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function forum()
    {
        return $this->belongsTo(Forum::class);
    }
}
