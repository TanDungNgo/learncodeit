<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\PostRequest;
use App\Http\Services\Post\PostAdminService;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    protected $productService;

    public function __construct(PostAdminService $postService)
    {
        $this->postService = $postService;
    }

    public function index()
    {
        return view('admin.post.list', [
            'title' => 'Danh Sách Bài Viết',
            'posts' => $this->postService->get()
        ]);
    }

    public function create()
    {
        return view('admin.post.add', [
            'title' => 'Thêm Bài viết Mới',
            'menus' => $this->postService->getMenu()
        ]);
    }


    public function store(PostRequest $request)
    {
        $this->postService->insert($request);

        return redirect()->back();
    }

    public function show(Post $post)
    {
        return view('admin.post.edit', [
            'title' => 'Chỉnh Sửa Bài Viết',
            'post' => $post,
            'menus' => $this->postService->getMenu()
        ]);
    }


    public function update(Request $request, Post $post)
    {
        $result = $this->postService->update($request, $post);
        if ($result) {
            return redirect('/admin/posts/list');
        }

        return redirect()->back();
    }


    public function destroy(Request $request)
    {
        $result = $this->postService->delete($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công bài viết'
            ]);
        }

        return response()->json([ 'error' => true ]);
    }
}