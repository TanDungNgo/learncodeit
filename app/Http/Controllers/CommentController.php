<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Like;

class CommentController extends Controller
{
    public function store(Request $request)
    {
    	$request->validate([
            'body'=>'required',
        ]);
        $input = $request->all();
        $input['user_id'] = auth()->user()->id;
        Comment::create($input);
        return back();
    }

    public function Like(Request $request)
    {
        $input = $request->all();
        $input['comment_id'] = $request->comment_id;
        $input['user_id'] = auth()->user()->id;
        $like = new Like;
        Like::create($input);
        return back();
    }

    public function Dislike(Request $request)
    {
        $input = $request->all();
        $input['likeable_id'] = $request->comment_id;
        $input['user_id'] = auth()->user()->id;
        $like = new Like;
        Like::create($input);
        return back();
    }

}
