@extends("layouts.app")
@section("content")

<div class="row max-w-screen-lg mx-auto">
    <x-flash-message status="session('status')" />
    <div class="col-md-8 col-lg-9">
        {{-- 検索フォーム --}}
        @include('Country.search-form', ['allCountries'])
        <div class="table-responsive mt-8 mb-12">
            <table class="`border-collapse table-auto w-full text-sm border border-gray-200">
                <thead>
                    <tr>
                        <th class="border-b dark:border-slate-600 font-medium pt-4 pl-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">国名</th>
                    </tr>
                </thead>
                <tbody class="bg-white dark:bg-slate-800">
                    @forelse ($countries as $country)
                    <tr>
                        <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">
                            <a href="{{ route('players.index', ['country_id' => $country->country_id]) }}">
                                {{ $country->country_name }}
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">該当する国がありません。</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($countries->count() >= 1)
        {{ $countries->links() }}
        @endif
    </div>
</div>
@endsection("content")
