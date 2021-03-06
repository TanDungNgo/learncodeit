<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\Post\PostService;
use App\Models\Like;
use App\Models\Rating;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    protected $productService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function index($id = '', $slug = '')
    {
        $post = $this->postService->show($id);
        $postsMore = $this->postService->more($id);
        $likes = Like::query()->get();
        $average = DB::table('ratings')
                // ->where('rateable_id', $post->id)
                ->avg('rating');
        return view('posts.content', [
            'title' => $post->name,
            'post' => $post,
            'posts' => $postsMore,
            'likes' => $likes,
            'average' => $average
        ]);
    }
}
