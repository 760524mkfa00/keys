<?php

namespace Keys\Http\Controllers;

use Keys\Models\Key;
use Illuminate\Http\Request;

class KeysController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('keys.index')
            ->withData(Key::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('keys.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'code' => 'unique:keys|max:255',
            'type' => 'required',
            'description' => 'required'
        ]);

        Key::create($request->all());

        return redirect()->route('key')->with('message', 'Key Added.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Key $key)
    {
        return view('keys.edit')
            ->withKey($key);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Key $key)
    {
        $this->validate($request, [
            'code' => 'max:255|unique:keys,id,' . $key->id,
            'type' => 'required',
            'description' => 'required'
        ]);

        $key->update($request->all());

        return redirect()->route('key')->with('message', 'Key Updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Key $key)
    {
        //
    }
}
