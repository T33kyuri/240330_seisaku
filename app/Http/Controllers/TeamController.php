<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Team; //この行を上に追加
use App\Models\User;//この行を上に追加
use Auth;//この行を上に追加
use Validator;//この行を上に追加

class TeamController extends Controller
{
    //チーム管理画面
    public function index()
    {
            //チーム 全件取得
        $teams = Team::get();
        return view('teams',[
            'teams'=> $teams
            ]);
    }
    
    
    //チームの登録処理
    public function store(Request $request)
    {
        //バリデーション 
        $validator = Validator::make($request->all(), [
            'team_name' => 'required|max:255'
        ]);
        
        //バリデーション:エラー
        if ($validator->fails()) {
            return redirect('teams')
                ->withInput()
                ->withErrors($validator);
        }
        
        //以下に登録処理を記述（Eloquentモデル）
        $teams = new Team;
        $teams->team_name = $request->team_name;
        $teams->user_id = Auth::id();//ここでログインしているユーザidを登録しています
        $teams->save();
        
        
        //チームオーナーも中間テーブルに保存する処理
        //多対多のリレーションもここで登録
        $teams->members()->attach( Auth::user() );        
        
        return redirect('teams');
        
    }
    
    
    //チーム参加処理
    public function join($team_id)
    {
        //ログイン中のユーザーを取得
        $user = Auth::user();
        
        //参加するチームを取得
        $team = Team::find($team_id);
        
        //リレーションの登録
        $team->members()->attach($user);
        
        return redirect('teams');
        
    }
    
    
    
    
    
    
}
