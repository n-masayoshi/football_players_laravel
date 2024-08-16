<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Events\Posted;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Providers\RouteServiceProvider;
use Exception;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $posts = Post::all();
        return view('Channels.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                // ひらがな、カタカナ、漢字、英字は許可 => NG: 記号
                'text' => ['required', 'string', 'regex:/^[ぁ-んァ-ヶ一-龠a-zA-Zー\s]+$/u'],
            ]);
        } catch (Exception $e) {
            Log::debug($e);
            throw $e;
        }

        DB::beginTransaction();
        try {
            $post = new Post($request->all());
            $post->save();
            event(new Posted($post));
            DB::commit();
        } catch (\Exception $e) {
            Log::debug($e);
            DB::rollback();
            return redirect()->back()->with('error', '投稿に失敗しました。')->withInput();
        }

        return redirect(RouteServiceProvider::CHATTING);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
