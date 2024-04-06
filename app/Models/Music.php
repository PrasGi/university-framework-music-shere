<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Music extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'file_music',
        'file_thumbnail',
        'artist',
        'lyrics',
        'views',
        'downloads',
        'user_id',
    ];

    // search filter
    public function scopeSearch($query, $search)
    {
        return $query->where('title', 'like', '%' . $search . '%')->orWhere('artist', 'like', '%' . $search . '%');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}