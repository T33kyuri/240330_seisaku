<tr>
    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">{{ $team->team_name }}</td>
    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">{{ $team->user->name }}</td>
    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">{{ $team->members()->count() }}人参加中</td>
    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
        <a class="text-blue-500 hover:text-blue-700" href="#">詳細</a>
    </td>
    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
        @if(Auth::check())
            @if(Auth::id() != $team->user_id && $team->members()->where('user_id',Auth::id())->exists() !== true)
            <a class="text-blue-500 hover:text-blue-700" href="{{ url('team/'.$team->id) }}">参加</a>
            @endif
        @endif
    </td>
    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
        <a class="text-blue-500 hover:text-blue-700" href="#">編集</a>
    </td>
</tr>
