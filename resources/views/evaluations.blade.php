<!-- resources/views/evaluations.blade.php -->
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
        <!-- 会社フィルター[START] -->
        <!--<form id="evaluation_form" action="{{ '/evaluations' }}" method="POST" class="w-full">-->
        <!--    @csrf-->
            <div class="flex flex-row w-full min-h-screen">
                <div class="flex flex-col w-2/3 text-gray-700 text-left bg-red-100 p-2 ">
                    <div class="flex-1 text-gray-700 text-left bg-blue-100 px-4 py-2 m-2" id="filteredUsers">
                        <!-- ここにフィルターされたユーザーの情報が表示されます -->
                                    @foreach ($filteredUsers as $user)
                                        <div class="flex justify-between p-2 items-center bg-blue-500 text-white rounded-lg border-2 border-white">
                                            <div>
                                                <div>ID: {{ $user->id }}</div>
                                                <div>Name: {{ $user->name }}</div>
                                            </div>
                                            <button type="button" class="btn bg-blue-500 rounded-lg" onclick="addItem('{{ $user->id }}', '{{ $user->name }}', '{{ $user->user_company_id }}')">追加</button>
                                        </div>
                                    @endforeach
                    </div>
                </div>
                <!-- 会社フィルター[END] -->
                <!--<form id="monthYearForm">-->
                    <!-- 評価月決定フォーム[START] -->
                    <div class="flex flex-col w-1/3 text-gray-700 text-left bg-red-100 p-2">
                        <form id="evaluation_form" action="{{ '/evaluations' }}" method="POST" class="w-full">
                            @csrf
                            <div class="mb-4">
                                <label for="year" class="block text-gray-700 text-sm font-bold mb-2">西暦</label>
                                <select name="year" id="year" class="block w-full bg-white border border-gray-300 rounded py-2 px-3 focus:outline-none focus:border-indigo-500">
                                    <option value="">選択してください</option>
                                    @for ($i = date('Y'); $i >= date('Y') - 10; $i--)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="month" class="block text-gray-700 text-sm font-bold mb-2">月</label>
                                <select name="month" id="month" class="block w-full bg-white border border-gray-300 rounded py-2 px-3 focus:outline-none focus:border-indigo-500">
                                    <option value="">選択してください</option>
                                    @for ($month = 1; $month <= 12; $month++)
                                        <option value="{{ $month }}">{{ $month }}月</option>
                                    @endfor
                                </select>
                            </div>
                            <!-- ユーザーIDなどの隠しフィールド -->
                            <input type="hidden" id="user_ID" name="user_ID" value="">
                            <input type="hidden" id="user_name" name="user_name" value="">
                            <input type="hidden" id="user_company_id" name="user_company_id" value="">
                            <input type="hidden" id="hyouka_year" name="hyouka_year" value="">
                            <input type="hidden" id="hyouka_month" name="hyouka_month" value="">
                        </form>
                    </div>
                    <!-- 評価月決定フォーム[END] -->
                <!--</form>-->
            </div>
        <!--</form>-->
        <!--中央エリア[END]-->

        <!--右側エリア[[START]-->
        <div class="flex flex-col w-2/3 text-gray-700 text-left bg-red-100 p-2 ">
            <div class="flex-1 text-gray-700 text-left bg-blue-100 px-4 py-2 m-2">

                <!--評価シート一覧 sheetlistコンポーネント化に失敗したため直接挿入-->
                @if (count($filteredevaluations) > 0)
                    @foreach ($filteredevaluations as $evaluation)
                        <div class="flex justify-between p-4 items-center bg-blue-500 text-white rounded-lg border-2 border-white">
                            <div>{{ $evaluation->user_name }}</div>
                            
                            <form action="{{ url('evaluationsedit/'.$evaluation->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn bg-blue-500 rounded-lg">
                                    編集
                                </button>
                            </form>
                
                            <form action="{{ url('evaluationsconfirm/'.$evaluation->id) }}" method="POST">
                                @csrf
                                <!-- ボタンの名前を条件に応じて表示 -->
                                @if ($evaluation->send_flag === null)
                                    <input type="hidden" name="send_flag" value="1">
                                    <button type="submit" class="btn bg-blue-500 rounded-lg">
                                        確定
                                    </button>
                                @elseif ($evaluation->send_flag == 1)
                                    <input type="hidden" name="send_flag" value="0">
                                    <button type="submit" class="btn bg-blue-500 rounded-lg">
                                        提出済
                                    </button>
                                @else
                                    <input type="hidden" name="send_flag" value="1">
                                    <button type="submit" class="btn bg-blue-500 rounded-lg">
                                        回収中
                                    </button>
                                @endif
                            </form>
                
                            <form action="{{ url('evaluation/'.$evaluation->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn bg-blue-500 rounded-lg">
                                    削除
                                </button>
                            </form>
                        </div>
                    @endforeach
                @endif
                
            </div>
        </div>
        <!--右側エリア[[END]-->       
   
    </div>
    <!--全エリア[END]-->
</x-app-layout>

<script>
    function addItem(userId, userName, companyId) {
        var year = document.getElementById('year').value;
        var month = document.getElementById('month').value;
        
        if (year && month) {
            // ここで各隠しフィールドに値を設定する
            document.getElementById('user_ID').value = userId;
            document.getElementById('user_name').value = userName;
            document.getElementById('user_company_id').value = companyId;
            document.getElementById('hyouka_year').value = year;
            document.getElementById('hyouka_month').value = month;
            
            // フォームをサブミットする
            document.getElementById('evaluation_form').submit();
        } else {
            alert('年と月を選択してください。');
        }
    }
</script>