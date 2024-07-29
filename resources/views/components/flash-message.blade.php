@props(['status' => 'info'])

@php
// if(session('status') === 'info'){$bgColor = 'bg-blue-300';}
if(session('status') === 'alert'){$bgColor = 'bg-red-100';}
@endphp

@if(session('message'))
    <div class="{{ $bgColor }} w-1/2 mx-auto p-2 my-4 border border-red-400 rounded px-4 py-3 text-red-700">
        {{ session('message' )}}
    </div>
@endif
