@extends("layouts.app")
@section("content")

<div class="row">
    <div class="col-md-8 col-lg-9">
        <div class="table-responsive mb-12">
            <table class="border-collapse table-auto w-full text-sm">
                <thead>
                    <tr>
                        <th class="border-b dark:border-slate-600 font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">選手名</th>
                        <th class="border-b dark:border-slate-600 font-medium p-4 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">年齢</th>
                        <th class="border-b dark:border-slate-600 font-medium p-4 pr-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">クラブチーム</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody class="bg-white dark:bg-slate-800">
                    @foreach ($japanesePlayers as $japanesePlayer)
                    <tr>
                        <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">{{ $japanesePlayer->player_name }}</td>
                        <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-4 text-slate-500 dark:text-slate-400">{{ $japanesePlayer->player_age }}</td>
                        <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-4 text-slate-500 dark:text-slate-400">{{ $japanesePlayer->club_team_name }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{-- {{ $countries->links() }} --}}
    </div>
</div>
@endsection("content")
