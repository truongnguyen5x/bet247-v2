<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function getLogin()
    {
        return view('login');
    }

    //kiểm tra đăng nhập, cho qua hay không
    public function postLogin(Request $request)
    {
        $identity = $request->username;
        $data     = [
            filter_var($identity, FILTER_VALIDATE_EMAIL) ? 'email' : 'username' => $identity,
            'password'                                                          => $request->password,
        ];
        if (Auth::attempt($data)) {
            $user = Auth::user();
            if ($user->username == 'admin') {
                return redirect('header');
            } else {
                return redirect('/');
            }

        } else {
            return redirect('login')->with('notify', 'Tên đăng nhập,email hoặc mật khẩu không đúng');
        }
    }
    public function getLogout()
    {
        Auth::logout();
        return redirect('login');
    }
    public function getRegister()
    {
        return view('register');
    }

    //kiểm tra đăng ký
    public function postRegister(Request $request)
    {
        $this->validate($request, [
            'username'         => 'required|min:3|unique:users,username|alpha_num',
            'email'            => 'required|email|unique:users,email',
            'name'             => 'required|min:5',
            'phone_number'     => 'numeric|nullable',
            'password'         => 'required|min:3|max:60|alpha_num',
            'password_confirm' => 'required|same:password',
        ], [
            'username.required'         => 'Bạn cần nhập tên đăng nhập',
            'username.min'              => 'Tên đăng nhập cần lớn hơn 3 kí tự',
            'username.unique'           => 'Tên đăng nhập đã tồn tại',
            'username.alpha_num'        => 'Tên đăng nhập chỉ được chứa chữ và số',
            'email.required'            => 'Bạn cần nhập email',
            'email.email'               => 'Bạn cần nhập email',
            'email.unique'              => 'Địa chỉ email đã tồn tại',
            'phone_number.numeric'      => 'Bạn phải nhập đúng số điện thoại',
            'name.required'             => 'Bạn cần nhập tên của bạn',
            'name.min'                  => 'Tên của bạn quá ngắn, cần dài hơn 5 kí tự',
            'password.required'         => 'Bạn cần nhập mật khẩu',
            'password.alpha_num'        => 'Mật khẩu chỉ được chứa chữ và số',
            'password.min'              => 'Mật khẩu phải có độ dài từ 3 đến 60 kí tự',
            'password.max'              => 'Mật khẩu phải có độ dài từ 3 đến 60 kí tự',
            'password_confirm.required' => 'Bạn phải nhập lại mật khẩu',
            'password_confirm.same'     => 'Bạn nhập lại mật khẩu không khớp',
        ]);
        $user               = new User;
        $user->username     = $request->username;
        $user->email        = $request->email;
        $user->name         = $request->name;
        $user->phone_number = $request->phone_number;
        $user->password     = bcrypt($request->password);
        $user->save();
        return redirect('login')->with('notify', 'Bạn đã đăng ký tài khoản thành công, hãy đăng nhập để tiếp tục');
    }
}
