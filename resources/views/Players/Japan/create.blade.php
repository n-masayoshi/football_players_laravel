@extends("layouts.app")
@section("content")

<div class="row max-w-screen-lg mx-auto">
    <div class="col-md-8 col-lg-9">
        <form method="post" action="{{ route('japan.store')}}" class="max-w-sm mx-auto">
            @csrf
            <div class="mb-5">
                <label for="playername" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">選手名</label>
                <input type="text" id="playername" name="playername" value="{{ old('playername') }}" class="mb-2 shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="選手名" required />
            </div>
            <div class="mb-5">
                <label for="age" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">年齢</label>
                <input type="number" id="age" name="age" value="{{ old('age') }}" class="mb-2 shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="年齢" required />
            </div>
            <div class="mb-5">
                <label for="clubteamname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">クラブチーム名</label>
                <input type="text" id="clubteamname" name="clubteamname" value="{{ old('clubteamname') }}" class="mb-6 shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="クラブチーム名" required />
            </div>
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">選手を登録する</button>
        </form>
    </div>
</div>
@endsection("content")
