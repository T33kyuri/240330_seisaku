<?php
// EvaluationController.php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Evaluation;
use App\Models\User;
use App\Models\Company;
use Illuminate\Http\Request;

use Validator;//この行を上に追加

class EvaluationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function eva(Request $request)
    {
    
        // ログインしたユーザーの情報を取得
        $user = Auth::user();

        // ログインしたユーザーの'user_company_id'を取得
        $selectedCompany = $user->user_company_id;
        
        if ($selectedCompany) {
            $filteredUsers = User::where('user_company_id', $selectedCompany)
                                ->orderBy('created_at', 'asc')
                                ->get();
                                
            $filteredevaluations = evaluation::where('user_company_id', $selectedCompany)
                                ->orderBy('created_at', 'asc')
                                ->get();
                                
        }
        
        // registlist ビューを表示
        return view('evaluations', [
            // 'users' => $users,
            'filteredUsers' => $filteredUsers,
            'filteredevaluations' => $filteredevaluations,
        ]);
        
        // //保存されている本のデータを取得する
        // $evaluations = evaluation::orderBy('created_at', 'asc')->paginate(3);
        // return view('evaluations', [
        //     'evaluations' => $evaluations
        // ]);
        //** ↑ 上をコピー ↑ **
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
    public function store(Request $request)
{
    // フォームから送信されたデータを取得
    // $id = $request->input('user_ID');
    // $name = $request->input('user_name');
    // $user_company_id = $request->input('user_company_id');
    // $hyouka_year = $request->input('year');
    // $hyouka_month = $request->input('month');

    // バリデーション
    $validator = Validator::make($request->all(), [
            'user_ID' => 'required',
            'user_name' => 'required',
            'user_company_id' => 'required',
            'year' => 'required',
            'month' => 'required',
    ]);

    // // バリデーションエラーの場合はリダイレクト
    // if ($validator->fails()) {
    //     return redirect('/eva')
    //         ->withInput()
    //         ->withErrors($validator);
    // }

    // Evaluationモデルのインスタンスを作成し、データを保存
    $evaluations = new Evaluation;
    $evaluations->user_ID =  $request->user_ID;
    $evaluations->user_name =  $request->user_name;
    $evaluations->user_company_id =  $request->user_company_id;
    $evaluations->hyouka_year =  $request->year;
    $evaluations->hyouka_month =  $request->month;
    $evaluations->save();

    // リダイレクト
    return redirect()->back();
}
    
    /**
     * Display the specified resource.
     */
    public function show(Evaluation $evaluation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Evaluation $evaluation)
    {
        //{evaluations}id 値を取得 => evaluation $evaluations id 値の1レコード取得
        return view('evaluationsedit', ['evaluation' => $evaluation]);    
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Evaluation $evaluation)
    {
    
        // バリデーション
        // $validator = Validator::make($request->all(), [
        //     'user_ID' => 'required',
        //     'user_name' => 'required',
        //     'user_company_id' => 'required',
        //     'year' => 'required',
        //     'month' => 'required',
        //     'hyouka_content_1' => 'required',
        //     'hyouka_content_2' => 'required',
        //     'hyouka_content_3' => 'required',
                
        // ]);
        
            // バリデーション
        $validator = Validator::make($request->only(['hyouka_content_1', 'hyouka_content_2', 'hyouka_content_3']), [
            'hyouka_content_1' => 'required',
            'hyouka_content_2' => 'required',
            'hyouka_content_3' => 'required',
        ]);
        
    
        // // バリデーションエラーの場合はリダイレクト
        // if ($validator->fails()) {
        //     return redirect('/eva')
        //         ->withInput()
        //         ->withErrors($validator);
        // }
    
        //データ更新
        $evaluations = evaluation::find($request->id);
        // $evaluations->user_ID =  $request->user_ID;
        // $evaluations->user_name =  $request->user_name;
        // $evaluations->user_company_id =  $request->user_company_id;
        // $evaluations->hyouka_year =  $request->year;
        // $evaluations->hyouka_month =  $request->month;
        $evaluations->hyouka_content_1 =  $request->hyouka_content_1;
        $evaluations->hyouka_content_2 =  $request->hyouka_content_2;
        $evaluations->hyouka_content_3 =  $request->hyouka_content_3;
        $evaluations->save();
        return redirect('/eva');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Evaluation $evaluation)
    {
    $evaluation->delete();       //追加
    return redirect('/eva');  //追加
    }
    
    
public function send(Request $request, Evaluation $evaluation)
{
    // バリデーション
    $validator = Validator::make($request->all(), [
        'send_flag' => 'nullable', // 'required' から 'nullable' に変更
    ]);
    
    // バリデーションに失敗しても処理を続行する

    // データ更新
    if ($evaluation->send_flag === null) {
        $evaluation->send_flag = 1;
    } elseif ($evaluation->send_flag == 1) {
        $evaluation->send_flag = 0;
    } else {
        $evaluation->send_flag = 1;
    }
    
    $evaluation->save();

    return redirect('/eva');
}
    
    
    
    
    
    
}
