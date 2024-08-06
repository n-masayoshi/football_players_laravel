
<div id="accordion-collapse" data-accordion="collapse">
    <h2 id="accordion-collapse-heading-1">
        <button type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right bg-sky-100 border border-sky-200 rounded-t focus:ring-1 focus:ring-sky-100 dark:focus:ring-sky-800 dark:border-sky-700 dark:text-sky-400 hover:bg-sky-200 dark:hover:bg-sky-800 gap-3" data-accordion-target="#accordion-collapse-body-1" aria-expanded="false" aria-controls="accordion-collapse-body-1">
            <span>検索条件</span>
            <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
            </svg>
        </button>
    </h2>
    <div id="accordion-collapse-body-1" class="hidden" aria-labelledby="accordion-collapse-heading-1">
        <div class="text-gray-900 p-5 border border-sky-200 dark:border-sky-700 dark:bg-sky-900">
            <!-- Validation Errors -->
            <x-search-form-validation-errors class="mb-4" :errors="$errors" />
            <form class="space-y-4" method="POST" action="{{ route('players.search', ['country_id' => '1']) }}">
                @csrf
                <div class="flex">
                    <div class="w-1/4 px-3">
                        <x-input-label for="player_name" :value="'選手名'" />
                        <x-text-input id="player_name" class="block mt-1 w-full" type="text" name="player_name" :value="old('player_name', $request->player_name)" for="player_name" :value="''" autocomplete="選手名" />
                        @error('player_name')
                            <span class="text-xs text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="w-1/4 px-3">
                        <x-input-label for="player_age" :value="'年齢'" />
                        <x-text-input id="player_age" class="block mt-1 w-full" type="number" name="player_age" :value="old('player_age', $request->player_age)" for="player_age" :value="''" min="10" max="200" autocomplete="年齢" />
                    </div>
                    <div class="w-1/4 px-3">
                        <x-input-label for="club_team_name" :value="'クラブチーム'" />
                        <x-text-input id="club_team_name" class="block mt-1 w-full" type="text" name="club_team_name" :value="old('club_team_name', $request->club_team_name)" for="club_team_name" :value="''" autocomplete="クラブチーム" />
                        @error('club_team_name')
                            <span class="text-xs text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="text-center pt-4 flex justify-end">
                    <button type="submit" class="py-2 px-4 bg-blue-500 hover:bg-blue-600 text-white rounded-md">
                        検索
                    </button>
                    <button type="submit" name="reset" value="1" class="ml-3 py-2 px-4 bg-orange-400 hover:bg-orange-500 text-white rounded-md">
                        リセット
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
