<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Evaluation;
use App\Models\User;
use App\Models\Company;
use Illuminate\Http\Request;


use Validator;//この行を上に追加

class InreceiptController extends Controller
{

    public function index(Request $request)
    {
    
        // ログインしたユーザーの情報を取得
        $user = Auth::user();

        // ログインしたユーザーの'id'を取得
        $selectedUser = $user->id;
        
        // // ログインしたユーザーの'user_company_id'を取得
        // $selectedCompany = $user->user_company_id;
        
        if ($selectedUser) {
            $filteredevaluations = evaluation::where('user_ID', $selectedUser)
                                ->orderBy('created_at', 'asc')
                                ->get();
        }
        
        // ビューに変数を渡す
        return view('inreceiptbox', [
            'filteredevaluations' => $filteredevaluations,
            'user' => $user, // $user変数をビューに渡す
        ]);
        
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        //
    }
    
    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Evaluation $evaluation)
    {
        //{evaluations}id 値を取得 => evaluation $evaluations id 値の1レコード取得
        return view('inreceiptsheet', ['evaluation' => $evaluation]);    
        
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, Evaluation $evaluation)
    // {
    
    //         // バリデーション
    //         $validator = Validator::make($request->only(['receipt_flag']), [
    //             'receipt_flag' => 'nullable', // 'required' から 'nullable' に変更
    //         ]);
            
    //         // $evaluation 変数がnullでないことを確認する
    //         if ($evaluation) {
    //             $evaluation->receipt_flag = $request->receipt_flag;
    //             $evaluation->save();
    //             return redirect('/');
    //         } else {
    //             // 評価が見つからない場合はエラーを返すなど適切な処理を行う
    //             return back()->with('error', '評価が見つかりませんでした。');
    //         }
    
    // }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        //
    }
    
        
    public function receipt(Request $request, Evaluation $evaluation)
    {
        // バリデーション
        $validator = Validator::make($request->all(), [
            'receipt_flag' => 'nullable', // 'required' から 'nullable' に変更
        ]);
        
        // バリデーションに失敗しても処理を続行する
    
        // データ更新
        if ($evaluation->receipt_flag === null) {
            $evaluation->receipt_flag = 1;
        } elseif ($evaluation->receipt_flag == 1) {
            $evaluation->receipt_flag = 0;
        } else {
            $evaluation->receipt_flag = 1;
        }
        
        $evaluation->save();
    
        return redirect('/');
    }
    
    
    
}
