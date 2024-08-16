@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Pusher Test</h1>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <ul id="board">
                            @foreach($posts as $post)
                                <li>{{ $post->text }}</li>
                            @endforeach
                        </ul>
                    </div>

                    <form method="POST" action="{{ route('post.store')}}" class="max-w-sm mx-auto">
                    @csrf
                    <div class="card-body">
                            <input type="text" id="text" name="text" required>
                            <button type="submit" id="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">送信</button>
                        </div>
                        @error('text')
                            <span class="text-xs text-red-600">{{ $message }}</span>
                        @enderror
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
