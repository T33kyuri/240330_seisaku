<!-- 評価中の評価シート -->
<!--<div class="flex justify-between p-4 items-center bg-blue-500 text-white rounded-lg border-2 border-white">-->
<!--  <div>{{ $slot }}</div>-->
  
<!--    <form action="{{ url('evaluationsedit/'.$id) }}" method="POST">-->
<!--        @csrf-->
<!--        <button type="submit"  class="btn bg-blue-500 rounded-lg">-->
<!--            編集-->
<!--        </button>-->
<!--    </form>-->

<!--            <form action="{{ url('evaluationsconfirm/'.$id) }}" method="POST">-->
<!--                @csrf-->
                <!-- ボタンの名前を条件に応じて表示 -->
<!--                @if ($evaluation->send_flag === null)-->
<!--                    <input type="hidden" name="send_flag" value="1">-->
<!--                    <button type="submit" class="btn bg-blue-500 rounded-lg">-->
<!--                        確定-->
<!--                    </button>-->
<!--                @elseif ($evaluation->send_flag == 1)-->
<!--                    <input type="hidden" name="send_flag" value="0">-->
<!--                    <button type="submit" class="btn bg-blue-500 rounded-lg">-->
<!--                        提出済み-->
<!--                    </button>-->
<!--                @else-->
<!--                    <input type="hidden" name="send_flag" value="1">-->
<!--                    <button type="submit" class="btn bg-blue-500 rounded-lg">-->
<!--                        回収中-->
<!--                    </button>-->
<!--                @endif-->
<!--            </form>-->


<!--    <form action="{{ url('evaluation/'.$id) }}" method="POST">-->
<!--        @csrf-->
<!--        @method('DELETE')-->
<!--        <button type="submit"  class="btn bg-blue-500 rounded-lg">-->
<!--            削除-->
<!--        </button>-->
<!--     </form>-->

<!--</div>-->