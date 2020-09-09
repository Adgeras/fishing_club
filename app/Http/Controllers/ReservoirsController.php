<?php

namespace App\Http\Controllers;

use App\reservoirs;
use Illuminate\Http\Request;

class ReservoirsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('reservoirs.index', ['reservoirs' => reservoirs::orderBy('title')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reservoirs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reservoir = new reservoirs();
        // can be used for seeing the insides of the incoming request
        // var_dump($request->all()); die();
        $reservoir->fill($request->all());
        $reservoir->save();
        return redirect()->route('reservoirs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\reservoirs  $reservoir
     * @return \Illuminate\Http\Response
     */
    public function show(reservoirs $reservoir)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\reservoirs  $reservoir
     * @return \Illuminate\Http\Response
     */
    public function edit(reservoirs $reservoir)
    {
        return view('reservoirs.edit', ['reservoir' => $reservoir]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\reservoirs  $reservoir
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, reservoirs $reservoir)
    {
        $reservoir->fill($request->all());
        $reservoir->save();
        return redirect()->route('reservoirs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\reservoirs  $reservoir
     * @return \Illuminate\Http\Response
     */
    public function destroy(reservoirs $reservoir, Request $request)
    {
        $reservoir->delete();
        return redirect()->route('members.index', ['reservoirs_id' => $request->input('reservoirs_id')]);
    }
}