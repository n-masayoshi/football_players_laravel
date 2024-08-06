@props(['errors'])

@if ($errors->any())
    <div {{ $attributes }}>
        <div class="font-medium text-red-600">
            {{ __('入力内容を間違えています。') }}
        </div>
    </div>
@endif
