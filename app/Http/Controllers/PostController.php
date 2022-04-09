<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\Post\PostService;

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

        return view('posts.content', [
            'title' => $post->name,
            'post' => $post,
            'posts' => $postsMore
        ]);
    }
}
