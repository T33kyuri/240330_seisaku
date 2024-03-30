<!-- resources/views/evaluationsedit.blade.php -->
<x-app-layout>

            
        <!-- バリデーションエラーの表示に使用-->
        <x-errors id="errors" class="bg-blue-500 rounded-lg">{{$errors}}</x-errors>
        <!-- バリデーションエラーの表示に使用-->
    
    <!--全エリア[START]-->
    <div class="flex bg-gray-100">

        <!--左エリア[START]--> 
        <div class="text-gray-700 text-left px-4 py-4 m-2">
            

        </div>
        <!--左エリア[END]--> 
    
    
    <!--右側エリア[START]-->
    <div class="flex-1 text-gray-700 text-left bg-blue-100 px-4 py-2 m-2">
            
            
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-500 font-bold">
                    評価結果
                </div>
            </div>
            
            <!-- 評価結果 -->
            <form action="{{ url('evaluations/update') }}" method="POST" class="w-full">
                @csrf
                
                  <div class="flex flex-col px-2 py-2">
                   <!-- カラム１ -->
                    <div class="w-full md:w-1/1 px-3 my-4 font-bold">
                        <!--<div>ID: {{ $evaluation->user_ID }}</div>-->
                        <div>対象者:　{{ $evaluation->user_name }}</div>
                      <!--<input name="user_name" value="{{$evaluation->user_name}}" class="appearance-none block w-full text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" type="text" placeholder="">-->
                    </div>
                    <!-- カラム２ -->
                    <div class="w-full md:w-1/1 px-3">
                      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        長所／強みの発揮①（活動内容への貢献：具体的な姿勢や成果など）
                      </label>
                      <input name="hyouka_content_1" value="{{$evaluation->hyouka_content_1}}" class="appearance-none block w-full h-40 mb-4 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text" placeholder="">
                    </div>
                    <!-- カラム３ -->
                    <div class="w-full md:w-1/1 px-3 mb-2 md:mb-0">
                      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        長所／強みの発揮②（活動組織への貢献：委員会やリーダーとしての貢献など）
                      </label>
                      <input name="hyouka_content_2" value="{{$evaluation->hyouka_content_2}}" class="appearance-none block w-full h-40 mb-4 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text" placeholder="">
                    </div>
                    <div class="w-full md:w-1/1 px-3 mb-2 md:mb-0">
                      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        活動組織または評価者の助けになってほしいこと／力を入れて取り組んでほしいこと
                      </label>
                    <!-- カラム４ -->
                      <input name="hyouka_content_3" value="{{$evaluation->hyouka_content_3}}" class="appearance-none block w-full h-40 mb-4 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text" placeholder="">
                    </div>
                  </div>
                  <!-- カラム５ -->
                  <div class="flex flex-col">
                      <div class="text-gray-700 text-center px-4 py-2 m-2">
                             <x-button class="bg-blue-500 rounded-lg">更新</x-button>
                      </div>
                   </div>
                <!-- id値を送信 -->
                <input type="hidden" name="id" value="{{$evaluation->id}}">
                <!--/ id値を送信 -->
            </form>
    </div>
    <!--右側エリア[[END]-->       

</div>
 <!--全エリア[END]-->

</x-app-layout>