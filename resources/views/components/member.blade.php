                <!--会社フィルター[START]-->   
<!--            <div class="flex flex-col w-1/3  text-gray-700 text-left bg-red-100 p-2 ">-->
<!--                <div class="flex-1 text-gray-700 text-left bg-blue-100 px-4 py-2 m-2" id="filteredUsers">-->
                    <!-- ここにフィルターされたユーザーの情報が表示されます -->
<!--                    @if (count($filteredUsers) > 0)-->
<!--                        @foreach ($filteredUsers as $user)-->
<!--                            <x-member id="{{ $user->id }}">{{ $user->id }}_{{ $user->name }}</x-member>-->
<!--    <div class="flex justify-between p-2 items-center bg-blue-500 text-white rounded-lg border-2 border-white">-->
<!--    <div>-->
        <!-- $slotの内容をidとnameに分けて表示 -->
<!--        @php-->
<!--            // $slotの内容をアンダースコアで分割してidとnameに分ける-->
<!--            $slot_parts = explode('_', $slot);-->
<!--            $id = $slot_parts[0];-->
<!--            $name = $slot_parts[1];-->
<!--        @endphp-->
<!--        <div>ID: {{ $id }}</div>-->
<!--        <div>Name: {{ $name }}</div>-->
<!--    </div>-->
<!--                        @endforeach-->
<!--                    @endif-->
<!--                </div>-->
<!--            </div>-->
            <!--会社フィルター[END]--> 
    
<!--            <div class="flex flex-col text-gray-700 w-1/6 text-left bg-red-100 p-2">-->
<!--                <div>更新</div>-->
<!--                <div>評価をつけた年</div>-->
<!--                <div>評価をつけた月</div>-->
                
<!-- 評価月決定フォーム -->
<!--<form id="evaluationMonthForm" class="max-w-md mx-auto">-->
<!--    @csrf-->
<!--    <div class="mb-4">-->
<!--        <label for="year" class="block text-gray-700 text-sm font-bold mb-2">西暦</label>-->
<!--        <select name="year" id="year" class="block w-full bg-white border border-gray-300 rounded py-2 px-3 focus:outline-none focus:border-indigo-500">-->
<!--            <option value="">選択してください</option>-->
<!--            @for ($i = date('Y'); $i >= date('Y') - 10; $i--)-->
<!--                <option value="{{ $i }}">{{ $i }}</option>-->
<!--            @endfor-->
<!--        </select>-->
<!--    </div>-->
<!--    <div class="mb-4">-->
<!--        <label for="month" class="block text-gray-700 text-sm font-bold mb-2">月</label>-->
<!--        <select name="month" id="month" class="block w-full bg-white border border-gray-300 rounded py-2 px-3 focus:outline-none focus:border-indigo-500">-->
<!--            <option value="">選択してください</option>-->
<!--            @for ($month = 1; $month <= 12; $month++)-->
<!--                <option value="{{ $month }}">{{ $month }}月</option>-->
<!--            @endfor-->
<!--        </select>-->
<!--    </div>-->
<!--    <div class="flex items-center justify-between">-->
<!--        <button type="button" onclick="submitEvaluationMonth()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">評価月 決定</button>-->
<!--    </div>-->
<!--</form>-->

<!-- メンバー一覧 -->

  
    <!--<div>-->
    <!--    <form id="evaluationForm" action="{{ url('evaluations') }}" method="POST">-->
    <!--         @csrf-->
          
    <!--        @if(!empty($year))-->
    <!--            <input type="hidden" name="year" value="{{ $year }}">-->
    <!--        @endif-->
    <!--        @if(!empty($month))-->
    <!--            <input type="hidden" name="month" value="{{ $month }}">-->
    <!--        @endif-->
            
            <!-- $id と $name を hidden input フィールドとして追加 -->
    <!--        <input type="hidden" id="member_id" name="id" value="{{ $id }}">-->
    <!--        <input type="hidden" id="member_name" name="name" value="{{ $name }}">-->
            
            <!-- 年と月が選択されている場合のみボタンを表示 -->
    <!--        @if(!empty($year) && !empty($month))-->
    <!--            <button type="button" onclick="submitForm()" class="btn bg-blue-500 rounded-lg">-->
    <!--                追加-->
    <!--            </button>-->
    <!--        @endif-->
            
    <!--    </form>-->
    <!--</div>-->
    
<!--</div>-->


<!--            </div>-->
