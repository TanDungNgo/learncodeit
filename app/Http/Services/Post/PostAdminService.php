<?php


namespace App\Http\Services\Post;


use App\Models\Menu;
use App\Models\Post;
use Illuminate\Support\Facades\Session;

class PostAdminService
{
    public function getMenu()
    {
        return Menu::where('active', 1)->get();
    }

    public function insert($request)
    {

        try {
            $request->except('_token');
            Post::create($request->all());
            Session::flash('success', 'Thêm bài viết thành công');
        } catch (\Exception $err) {
            Session::flash('error', 'Lỗi! Phải điền đầy đủ thông tin');
            \Log::info($err->getMessage());
            return  false;
        }

        return  true;
    }

    public function get()
    {
        return Post::with('menu')
            ->orderByDesc('id')->paginate(15);
    }

    public function update($request, $post)
    {
        try {
            $post->fill($request->input());
            $post->save();
            Session::flash('success', 'Cập nhật thành công');
        } catch (\Exception $err) {
            Session::flash('error', 'Có lỗi vui lòng thử lại');
            \Log::info($err->getMessage());
            return false;
        }
        return true;
    }

    public function delete($request)
    {
        $post = Post::where('id', $request->input('id'))->first();
        if ($post) {
            $post->delete();
            return true;
        }

        return false;
    }
}