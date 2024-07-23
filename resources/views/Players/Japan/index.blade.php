@extends("layouts.app")
@section("content")

<div class="row max-w-screen-lg mx-auto">
    <div class="col-md-8 col-lg-9">
        <div class="mb-8 flex justify-end">
                <a href="{{ route('japan.create') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-6 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                    選手登録
                </a>
        </div>
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
