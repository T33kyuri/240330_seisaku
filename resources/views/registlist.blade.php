<!-- resources/views/registlist.blade.php -->
<x-app-layout>

    <!--ヘッダー[START]-->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            
        </h2>
    </x-slot>
    <!--ヘッダー[END]-->
            
        <!-- バリデーションエラーの表示に使用-->
       <x-errors id="errors" class="bg-blue-500 rounded-lg">{{$errors}}</x-errors>
        <!-- バリデーションエラーの表示に使用-->
    
    <!--全エリア[START]-->
    <div class="flex bg-gray-100">

        <!--左エリア[START]--> 
        <div class="text-gray-700 w-1/6 text-left px-4 py-2 m-2">
            
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="px-6 py-2 bg-white border-b border-gray-500 font-bold">
                    会社/所属組織
                </div>
            </div>
            
                                <div class="flex-1 text-gray-700 overflow-scroll whitespace-nowrap text-left bg-white h-52 py-2 px-1 border">
                                <!-- 現在の本 -->
                                @if (count($companies) > 0)
                                    @foreach ($companies as $company)
                                        <x-companycollection id="{{ $company->company_id }}">{{ $company->company_name }}</x-compancollection>
                                    @endforeach
                                @endif
                                </div>

            <!-- 会社/所属組織 -->
            <form action="{{ route('admin.dashboard') }}" method="POST" class="w-full max-w-lg">
                @csrf
                  <div class="flex flex-col px-2 py-2">
                   <!-- カラム１ -->
                    <div class="w-full md:w-1/1 px-3 mb-2 md:mb-0">
                      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                       追加の会社/所属組織
                      </label>
                      <input name="company_name" class="appearance-none block w-full text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" type="text" placeholder="">
                    </div>
                  </div>
                    <!-- カラム２ -->
                  <div class="flex flex-col">
                      <div class="text-gray-700 text-center px-4 py-2 m-2">
                             <x-button class="bg-blue-500 rounded-lg">新規作成</x-button>
                      </div>
                   </div>
            </form>
        </div>
        <!--左エリア[END]--> 
    
    
        <!--右側エリア[START]-->
            <div class="flex flex-col w-1/3 text-gray-700 text-left bg-red-100 p-2 ">
                <div class="flex-1 text-gray-700 text-left bg-blue-100 px-4 py-2 m-2">
                    <!-- ユーザー一覧 -->
                    @if (count($users) > 0)
                        @foreach ($users as $user)
                            <x-usercollection id="{{ $user->id }}">{{ $user->name }}</x-usercollection>
                        @endforeach
                    @endif
                </div>
            </div>
            
            
            
<div class="flex flex-col text-gray-700 w-1/6 text-left bg-red-100 p-2">
    <form action="{{ route('admin.dashboard') }}" method="GET">
    @csrf
    <select name="company_id" id="companySelect" class="block w-full text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" onchange="document.getElementById('selectedCompanyId').textContent = this.value;">
        @foreach ($companies as $company)
            <option value="{{ $company->company_id }}">{{ $company->company_name }}</option>
        @endforeach
    </select>
    <input type="submit" value="検索" class="bg-blue-500 text-white font-bold py-2 px-4 rounded">
</form>
    
    
<!--ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー-->
    
    <!-- 検索機能ここから -->
        <!--<div>-->
        <!--  <form action="{{ url('/admin/dashboard') }}" method="POST" class="w-full max-w-lg">-->
        
        <!--  @csrf-->
        
        <!--    <input type="text" name="keyword">-->
        <!--    <input type="submit" value="検索">-->
        <!--  </form>-->
        <!--</div>-->
        
        
<!--ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー-->
        
<!--    <select name="company_id" id="companySelect" class="block w-full text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">-->
<!--        @foreach ($companies as $company)-->
<!--            <option value="{{ $company->company_id }}">{{ $company->company_name }}</option>-->
<!--        @endforeach-->
<!--    </select>-->
    
<!--    <div id="selectedCompanyId"></div>-->
    
    
<!--                    <div class="flex flex-col">-->
<!--                        <div class="text-gray-700 text-center px-4 py-2 m-2">-->
<!--                            <x-button id="searchButton" class="bg-blue-500 rounded-lg">検索</x-button>-->
<!--                        </div>-->
<!--                    </div>-->
</div>

<script>
    // select要素の変更時に実行される関数
    document.getElementById('companySelect').addEventListener('change', function() {
        // 選択されたoptionのvalueを取得
        var selectedCompanyId = this.value;
        // 選択されたcompany_idを表示するdiv要素を取得
        var selectedCompanyIdDiv = document.getElementById('selectedCompanyId');
        // 選択されたcompany_idを表示する
        selectedCompanyIdDiv.textContent = 'company_id: ' + selectedCompanyId;
    });
</script>
            
<!--<script>-->
<!--    document.getElementById('searchButton').addEventListener('click', function() {-->
<!--        // 選択された会社のIDを取得-->
<!--        var selectedCompanyId = document.getElementById('companySelect').value;-->

<!--        // Ajaxリクエストを送信-->
<!--        var xhr = new XMLHttpRequest();-->
<!--        xhr.open('GET', '/admin/dashboard/get-users?company_id=' + selectedCompanyId, true);-->
<!--        xhr.onload = function() {-->
<!--            if (xhr.status >= 200 && xhr.status < 400) {-->
<!--                // サーバーからのレスポンスを処理-->
<!--                var response = xhr.responseText;-->
<!--                // レスポンスを表示-->
<!--                document.getElementById('filteredUsers').innerHTML = response;-->
<!--            } else {-->
<!--                // エラー処理-->
<!--            }-->
<!--        };-->
<!--        xhr.send();-->
        
<!--    });-->
<!--</script>            -->

<!--ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー-->

            
            <!--会社フィルター[START]-->   
            <div class="flex flex-col w-1/3  text-gray-700 text-left bg-red-100 p-2 ">
                <div class="flex-1 text-gray-700 text-left bg-blue-100 px-4 py-2 m-2" id="filteredUsers">
                    <!-- ここにフィルターされたユーザーの情報が表示されます -->
                    @if (count($filteredUsers) > 0)
                        @foreach ($filteredUsers as $user)
                            <x-usercollection id="{{ $user->id }}">{{ $user->name }}</x-usercollection>
                        @endforeach
                    @endif
                </div>
            </div>
            <!--会社フィルター[END]--> 
        <!--右側エリア[[END]-->       
    
    
    </div>
     <!--全エリア[END]-->

</x-app-layout>