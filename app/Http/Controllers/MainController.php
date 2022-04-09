<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\Menu\MenuService;
use App\Http\Services\Post\PostService;
use App\Models\Post;

class MainController extends Controller
{
    protected $slider;
    protected $menu;
    protected $post;

    public function __construct(MenuService $menu,
        PostService $post)
    {
        $this->menu = $menu;
        $this->post = $post;
    }

    public function index(Request $request)
    {
        $search = $request->get('q');
        $this->post = Post::query()
            ->where('name', 'like', '%'.$search.'%');

        return view('home', [
            'title' => 'Trang Web học IT',
            'menus' => $this->menu->show(),
            'posts' => $this->post->get(),
            'search' => $search
        ]);
    }

    public function loadPost(Request $request)
    {
        $page = $request->input('page', 0);
        $result = $this->post->get($page);
        if (count($result) != 0) {
            $html = view('posts.list', ['posts' => $result ])->render();

            return response()->json([ 'html' => $html ]);
        }

        return response()->json(['html' => '' ]);
    }
}
