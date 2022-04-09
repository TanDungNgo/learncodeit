<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;
    protected $table = 'likes';

    public $fillable = ['user_id', 'likeable_id', 'like'];

    /**
     * @return mixed
     */
    public function Likeable()
    {
        return $this->morphTo('App\Models\Comment', 'likeable');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function comment()
    {
        return $this->belongsTo(Comment::class);
    }
}
