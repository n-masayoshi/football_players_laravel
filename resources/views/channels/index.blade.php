@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="max-w-screen-lg mx-auto">Pusher & Laravel Echo</h1>
        <div class="max-w-screen-sm mx-auto">
            <div class="chat-area">
                <ul id="board">
                    @foreach($posts as $post)
                    <div class="grid grid-cols-2 gap-4">
                        <div class="flex flex-col max-w-[320px] mb-2">
                            <div class="flex flex-col leading-1.5 p-1 border-green-400 bg-green-400 rounded-e-xl rounded-es-xl dark:bg-green-700">
                                <li class="flex flex-col leading-1.5 p-4 border-green-400 bg-green-400 rounded-e-xl rounded-es-xl dark:bg-green-700">
                                    <p class="text-sm font-normal text-gray-900 dark:text-white">{{ $post->text }}</p>
                                </li>
                            </div>
                        </div>
                        <div class="flex flex-col col-end-4 h-10 bg-orange-500 items-center justify-center max-w-[80px] m-auto rounded-xl">
                            <form action="{{ route('post.destroy', ['id' => $post->id]) }}" method="POST">
                                @csrf
                                <button type="submit" class="mx-4">削除</button>
                            </form>
                        </div>
                    </div>
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
@endsection
