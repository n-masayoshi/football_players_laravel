@extends("layouts.app")
@section("content")

<div class="row max-w-screen-lg mx-auto">
    <div class="col-md-8 col-lg-9">
        {{-- @include('ClubTeam.search-form') --}}

        <div class="table-responsive mt-8 mb-12">
            <table class="border-collapse table-auto w-full text-sm border border-gray-200">
                <thead>
                    <tr>
                        {{-- TODO:エンブレム画像 --}}
                        <th class="border-b dark:border-slate-600 font-medium pt-4 pl-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">クラブチーム名</th>
                        {{-- <th class="border-b dark:border-slate-600 font-medium pt-4 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">リーグ優勝回数</th> --}}
                        {{-- <th class="border-b dark:border-slate-600 font-medium pt-4 pr-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">CL優勝回数</th>
                        <th class="border-b dark:border-slate-600 font-medium pt-4 pr-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">EL優勝回数</th> --}}
                    </tr>
                </thead>
                <tbody class="bg-white dark:bg-slate-800">
                    @forelse ($clubTeams as $clubTeam)
                    <tr>
                        <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">{{ $clubTeam->club_team_name }}</td>
                        {{-- <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-4 text-slate-500 dark:text-slate-400">{{ $clubteam->leadgue_wins_counts }}</td> --}}
                        {{-- <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-4 text-slate-500 dark:text-slate-400">{{ $player->club_team_name }}</td> --}}
                        {{-- <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-4 text-slate-500 dark:text-slate-400"></td> --}}
                    </tr>
                    @empty
                    <tr>
                        <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">該当する選手がいません。</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mb-8 flex justify-end">
            @if(isset($clubTeams[0]))
            {{-- <a href="{{ route('clubteams.create', ['club_team_id' => $clubTeams[0]->club_team_id]) }}" class="text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-6 mb-2 dark:bg-blue-600 dark:hover:bg-blue-600 focus:outline-none dark:focus:ring-blue-600">
                クラブチーム登録
            </a> --}}
            @endif
        </div>
        {{ $clubTeams->links() }}
    </div>
</div>
@endsection
