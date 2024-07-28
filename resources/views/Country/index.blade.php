@extends("layouts.app")
@section("content")

<div class="row max-w-screen-lg mx-auto">
    <x-flash-message status="session('status')" />
    <div class="col-md-8 col-lg-9">
        <div class="table-responsive mb-12">
            <table class="border-collapse table-auto w-full text-sm">
                <thead>
                    <tr>
                        <th class="border-b dark:border-slate-600 font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">国名</th>
                        <th class="border-b dark:border-slate-600 font-medium p-4 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left"></th>
                        <th class="border-b dark:border-slate-600 font-medium p-4 pr-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left"></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody class="bg-white dark:bg-slate-800">
                    @foreach ($countries as $country)
                    <tr>
                        <td class="border-b p-4 pl-8 text-black">
                            <a href="{{ route('players.index', ['country_id' => $country->country_id]) }}">
                                {{ $country->country_name }}
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $countries->links() }}
    </div>
</div>
@endsection("content")
