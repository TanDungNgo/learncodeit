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
        $input = $request->all();
        $input['user_id'] = auth()->user()->id;
        $input['rateable_id'] = $request->id;
        $rating = new Rating;
        Rating::create($input);
        return back();
    }
}
