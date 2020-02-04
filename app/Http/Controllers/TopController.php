<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use App\Vote;

class TopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pre()
    {
        return view('pre');
    }

    public function prestore(Request $request)
    {
        // マイナンバーはsessionに保存しておく
        session(['mynumber' => $request->input('mynumber')]);

        return redirect('/');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        \Log::emergency('システムがダウンしています！');
        if (empty(session('mynumber'))) {
            return redirect('/pre');
        }
        // dump(session());
        // dump($request->session()->getId());
        $vote = new Vote();

        return view('index', ['profiles' => Profile::all(), 'vote' => $vote]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $vote = new Vote();
        if (Vote::where('mynumber', session('mynumber'))->count() > 0) {
            return redirect('/')->with(['status' => 'すでに投票済みです']);
        }
        $vote->mynumber = session('mynumber');
        $vote->profile_id = $request->input('profile_id');
        $vote->save();

        return redirect('/')->with(['status' => '投票しました！']);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }
}
