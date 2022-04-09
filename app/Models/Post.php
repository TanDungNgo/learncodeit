<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use willvincent\Rateable\Rateable;


// use Overtrue\LaravelFollow\Traits\CanBeBookmarked;
class Post extends Model
{
    use HasFactory;
    use Rateable;
    // use CanBeBookmarked;
    protected $table = "posts";
    protected $fillable = [
        'name',
        'description',
        'content',
        'menu_id',
        'active',
        'thumb'
    ];

    public function menu()
    {
        return $this->hasOne(Menu::class, 'id', 'menu_id')
            ->withDefault(['name' => '']);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)->whereNull('parent_id');
    }
}
