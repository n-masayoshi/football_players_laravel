<?php

namespace App\Http\Controllers\Players;

use App\Models\Players\JapanesePlayer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JapanesePlayersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $japanesePlayers = JapanesePlayer::all();
        return view("Players.Japan.index", compact('japanesePlayers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("Players.Japan.create");
    }

    /**
     * Store a newly created resource in storage.
     * 日本人選手を登録する
     */
    // public function store(Request $request): RedirectResponse
    public function store(Request $request)
    {
        // try
        // {
        //     DB::transaction(function use($request) {
        //         $japanesePlayers = JapanesePlayer::create
        //         ([
        //             ''
        //         ]);
        //     });
        // }

        // return to_route('Players.Japan.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Players $players)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Players $players)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Players $players)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Players $players)
    {
        //
    }
}
