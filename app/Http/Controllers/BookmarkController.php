<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bookmark;
use App\Models\Post;
use App\Http\Services\Menu\MenuService;

class BookmarkController extends Controller
{
    public function index(Request $request)
    {
        $title = $request->get('title');
        $datas = Bookmark::query()
                        ->where('user_id','=',auth()->user()->id)
                        ->get();

        $posts = Post::query()->get();
        return view('bookmark', [
            'title' => $title,
            'posts' => $posts,
            'datas' => $datas,
        ]);
    }
    public function store(Request $request)
    {
        $input = new Bookmark();
        $input['user_id'] = auth()->user()->id;
        $input['post_id'] = $request->get('post_id');
        $input->save();
        return back();
    }
}
