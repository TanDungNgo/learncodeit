<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Rating;

class RatingController extends Controller
{
    public function Rating(Request $request)
    {
        request()->validate(['rating' => 'required']);
        $post = Post::find($request->id);
        $rating = new Rating;
        $rating->rating = $request->rating;
        $rating->user_id = auth()->user()->id;
        $post->ratings()->save($rating);
        return redirect()->back();
    }
}
