<!-- resources/views/inreceiptbox.blade.php -->
<x-app-layout>
    <!--ヘッダー[START]-->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight"></h2>
    </x-slot>
    <!--ヘッダー[END]-->
    <!-- バリデーションエラーの表示に使用-->
    <x-errors id="errors" class="bg-blue-500 rounded-lg">{{$errors}}</x-errors>
    <!-- バリデーションエラーの表示に使用-->
    
    <!--全エリア[START]-->
    <div class="flex bg-gray-100 min-h-screen">
        
        <!--左エリア[START]--> 
        <div class="text-gray-700 text-left w-1/3 px-2 py-2 m-2">
            <div class="py-2 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="pt-2 px-4 bg-white border-gray-500 font-bold"> 未完了 </div>
                <a href="{{ url('/') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline"> 受領評価 </a><br>
                <a href="{{ url('/eva') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline"> 実施評価 </a>
                 <div class="pt-4 pb-2 px-4  bg-white border-gray-500 font-bold"> 完了済 </div>
                <a href="{{ url('/') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline"> 受領評価 </a><br>
                <a href="{{ url('/') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline"> 実施評価 </a>
                <div class="pt-4 pb-2 px-4  bg-white border-gray-500 font-bold"> プロフィール </div>
                <a href="{{ url('/') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline"> 受領評価 </a><br>
                <a href="{{ url('/') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline"> 実施評価 </a><br>
                <a href="{{ url('/') }}" class="ml-4 mr-4 text-sm text-gray-700 dark:text-gray-500 underline"> プロフィールを設定 </a><br>
                <a href="{{ url('/') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline"> メッセージ </a>
            </div>
        </div>
        <!--左エリア[END]--> 
        
        <!--中央エリア[START]-->
        <div class="flex flex-row w-full min-h-screen">
            <div class="flex flex-col w-2/3 text-gray-700 text-left bg-red-100 p-2 ">
                <div class="flex-1 text-gray-700 text-left bg-blue-100 px-4 py-2 m-2" id="filteredUsers">
                    <!-- ここにフィルターされたユーザーのシート情報が表示されます -->
                                @foreach ($filteredevaluations as $evaluation)
                                    <div class="flex justify-between p-2 items-center bg-blue-500 text-white rounded-lg border-2 border-white">
                                        <div>
                                            <div>{{ $evaluation->hyouka_year }}年 {{ $evaluation->hyouka_month }}月実施 評価結果</div>
                                        </div>

                            <form action="{{ url('inreceiptsheet/'.$evaluation->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn bg-blue-500 rounded-lg">
                                    詳細
                                </button>
                            </form>
                            
                            
                            <form action="{{ url('inreceiptconfirm/'.$evaluation->id) }}" method="POST">
                                @csrf
                                <!-- ボタンの名前を条件に応じて表示 -->
                                @if ($evaluation->receipt_flag === null)
                                    <input type="hidden" name="receipt_flag" value="1">
                                    <button type="submit" class="btn bg-blue-500 rounded-lg">
                                        未確認
                                    </button>
                                @elseif ($evaluation->receipt_flag == 1)
                                    <input type="hidden" name="receipt_flag" value="0">
                                    <button type="submit" class="btn bg-blue-500 rounded-lg">
                                        確認済
                                    </button>
                                @else
                                    <input type="hidden" name="receipt_flag" value="1">
                                    <button type="submit" class="btn bg-blue-500 rounded-lg">
                                        確認中
                                    </button>
                                @endif
                            </form>


                                    </div>
                                @endforeach
                </div>
            </div>
        </div>

    </div>
    <!--全エリア[END]-->
</x-app-layout>
