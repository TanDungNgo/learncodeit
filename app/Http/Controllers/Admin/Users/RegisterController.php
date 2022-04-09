<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
class RegisterController extends Controller
{
    public function create()
    {
        return view('admin.users.register');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:3|max:32',
            'passwordAgain' => 'required|same:password'
        ], [
            'name.required'  => 'Bạn chưa nhập tên người dùng',
            'name.min'  => 'Tên người dùng phải có ít nhất 3 ký tự',
            'email.required'  => 'Bạn chưa nhập email',
            'email.email'  => 'Bạn chưa nhập đúng định dạng email',
            'email.unique'  => 'Email đã tồn tại',
            'password.required'  => 'Bạn chưa nhập mật khẩu',
            'name.min'  => 'Mật khẩu phải có ít nhất 3 ký tự',
            'name.max'  => 'Mật khẩu phải chỉ chứa tối đa 32 ký tự',
            'passwordAgain.required'  => 'Bạn chưa nhập lại mật khẩu',
            'passwordAgain.same'  => 'Mật khẩu nhập lại chưa đúng',
        ]);
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect()->route('login');
    }
}
