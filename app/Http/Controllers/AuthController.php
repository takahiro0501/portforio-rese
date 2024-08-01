<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $json = $request->getContent();
        $arr = json_decode($json,true);

        //ユーザチェック
        $user = User::where('email', $arr['email'])->first();
        if($user){
            return response()->json(['errRegister' => '既に登録されているユーザです'], 200);
        }
        //ユーザ作成
        $user = User::create([
            'email' => $arr['email'],
            'password' => Hash::make($arr['password']),
        ]);
        //ログイン
        if(Auth::attempt(['email' => $arr['email'], 'password' => $arr['password']])){
            $request->session()->regenerate();
            return response()->json(['email' => $arr['email']], 200);
        }else{
            return response()->json(['err' => 'ログインエラー']);
        }
    }

    public function login(Request $request)
    {
        // ログイン
        $json = $request->getContent();
        $arr = json_decode($json,true);
        if (Auth::attempt(['email' => $arr['email'], 'password' => $arr['password']])) {
            $request->session()->regenerate();
            return response()->json(['email' => $arr['email']], 200);
        }else{
            return response()->json(['errLogin' => 'メールアドレス又は、パスワードが間違っています'],200);
        }
    }
    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return response()->json(['msg' => 'ログアウトしました'], 200);
    }
}
