<?php
// app/Http/Controllers/Admin/Auth/LoginController.php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User; // Userモデルをインポートする
use App\Models\Company; // Userモデルをインポートする
use Validator;//この行を上に追加

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            // ログイン成功の処理
            return redirect()->intended('/admin/dashboard');
        } else {
            // ログイン失敗時の処理
            return redirect()->back()->withInput()->withErrors(['email' => 'ログインに失敗しました。']);
        }
    }


    public function index(Request $request)
    {
        // フォームから送信された会社名を取得
        $selectedCompany = $request->input('company_id');
        /* キーワードから検索処理 */
        // $keyword = $request->input('keyword');


        // ユーザー一覧を取得
        $users = User::orderBy('created_at', 'asc')->get();
        
        // 会社一覧を取得
        $companies = Company::orderBy('created_at', 'asc')->get();
    
        // フィルターされたユーザー一覧を初期化
        $filteredUsers = null;
        
        // 会社名が選択されている場合は、その会社に所属するユーザーを取得
        if ($selectedCompany) {
            $filteredUsers = User::where('user_company_id', $selectedCompany)
                                ->orderBy('created_at', 'asc')
                                ->get();
        } else {
            // 会社名が選択されていない場合は、全てのユーザーを取得
            $filteredUsers = User::orderBy('created_at', 'asc')->get();
        }
        
        
        // registlist ビューを表示
        return view('registlist', [
            'users' => $users,
            'companies' => $companies,
            'filteredUsers' => $filteredUsers,

        ]);
    
    }

    public function store(Request $request)
    {
        //** ↓ 下をコピー ↓ **
        //バリデーション
        $validator = Validator::make($request->all(), [
             'company_name' => 'required',
            //  'published'   => 'required',
        ]);
    
        //バリデーション:エラー 
        if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }
        //以下に登録処理を記述（Eloquentモデル）
        
        // Eloquentモデル
        $companies = new Company;
        $companies->company_name   = $request->company_name;
        // $companies->published   = $request->published;
        $companies->save(); 
        return redirect('/');
          
          
        //** ↑ 上をコピー ↑ **    
    }

    // その他のメソッド
}
