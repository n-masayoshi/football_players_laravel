@extends("layouts.app")
@section("content")

<div class="row max-w-screen-lg mx-auto">
    <div class="col-md-8 col-lg-9">
        <form method="POST" action="{{ route('japan.store')}}" class="max-w-sm mx-auto">
            @csrf
            <div class="mb-5">
                <label for="country_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">国 ID</label>
                <input type="number" id="country_id" name="country_id" value="<?= $country_id ?>" class="mb-2 shadow-sm bg-gray-50 border border-gray-300 text-gray-400 text-sm rounded-lg focus:ring-gray-50 focus:border-gray-300 block w-full p-2.5 placeholder="国 id" readonly />
            </div>
            <div class="mb-5">
                <label for="player_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">選手名</label>
                <input type="text" id="player_name" name="player_name" value="{{ old('player_name') }}" class="mb-2 shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="選手名" required />
            </div>
            <div class="mb-5">
                <label for="player_age" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">年齢</label>
                <input type="number" id="player_age" name="player_age" value="{{ old('player_age') }}" class="mb-2 shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="年齢" required />
            </div>
            <div class="mb-5">
                <label for="club_team_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">クラブチーム ID</label>
                <input type="number" id="club_team_id" name="club_team_id" value="{{ old('club_team_id') }}" class="mb-6 shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="クラブチーム ID" required />
            </div>
            <div class="mb-5">
                <label for="club_team_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">クラブチーム名</label>
                <input type="text" id="club_team_name" name="club_team_name" value="{{ old('club_team_name') }}" class="mb-6 shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="クラブチーム名" required />
            </div>
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">選手を登録する</button>
        </form>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                失敗
            @endforeach
        </ul>
    </div>
@endif
@endsection("content")
