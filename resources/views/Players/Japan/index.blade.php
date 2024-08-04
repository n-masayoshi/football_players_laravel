@extends("layouts.app")
@section("content")

<div class="row max-w-screen-lg mx-auto">
    <div class="col-md-8 col-lg-9">
        @include('Players.Japan.search-form')

        <div class="table-responsive mt-8 mb-12">
            <table class="border-collapse table-auto w-full text-sm border border-gray-200">
                <thead>
                    <tr>
                        <th class="border-b dark:border-slate-600 font-medium pt-4 pl-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">選手名</th>
                        <th class="border-b dark:border-slate-600 font-medium pt-4 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">年齢</th>
                        <th class="border-b dark:border-slate-600 font-medium pt-4 pr-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">クラブチーム</th>
                        <th class="border-b dark:border-slate-600 font-medium pt-4 pr-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">代表引退</th>
                        <th class="border-b dark:border-slate-600 font-medium pt-4 pr-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">選手引退</th>
                    </tr>
                </thead>
                <tbody class="bg-white dark:bg-slate-800">
                    @foreach ($players as $player)
                    <tr>
                        <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">{{ $player->player_name }}</td>
                        <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-4 text-slate-500 dark:text-slate-400">{{ $player->player_age }}</td>
                        <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-4 text-slate-500 dark:text-slate-400">{{ $player->club_team_name }}</td>
                        <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-4 text-slate-500 dark:text-slate-400"></td>
                        <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-4 text-slate-500 dark:text-slate-400"></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mb-8 flex justify-end">
            <a href="{{ route('players.create', ['country_id' => $players[0]->country_id]) }}" class="text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-6 mb-2 dark:bg-blue-600 dark:hover:bg-blue-600 focus:outline-none dark:focus:ring-blue-600">
                選手登録
            </a>
        </div>
        {{-- {{ $countries->links() }} --}}
    </div>
</div>
@endsection("content")
