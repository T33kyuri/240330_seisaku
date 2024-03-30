<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

use Validator;  //この1行だけ追加！



class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function bo()
    {
        //** ↓ 下をコピー ↓ **    
        //保存されている本のデータを取得する
        $books = Book::orderBy('created_at', 'asc')->paginate(3);
        return view('books', [
            'books' => $books
        ]);
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
        //** ↓ 下をコピー ↓ **
        //バリデーション
        $validator = Validator::make($request->all(), [
             'item_name' => 'required|min:3|max:255',
             'item_number' => 'required | min:1 | max:3',
             'item_amount' => 'required | max:6',
             'published'   => 'required',
        ]);
    
        //バリデーション:エラー 
        if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }
        //以下に登録処理を記述（Eloquentモデル）
        
        // Eloquentモデル
        $books = new Book;
        $books->item_name   = $request->item_name;
        $books->item_number = $request->item_number;
        $books->item_amount = $request->item_amount;
        $books->published   = $request->published;
        $books->save(); 
        return redirect('/eva');
          
          
        //** ↑ 上をコピー ↑ **    
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        //{books}id 値を取得 => Book $books id 値の1レコード取得
        return view('booksedit', ['book' => $book]);    
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
    $book->delete();       //追加
    return redirect('/');  //追加
    }
}
