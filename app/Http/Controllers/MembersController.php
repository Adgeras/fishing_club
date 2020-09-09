<?php

namespace App\Http\Controllers;

use App\Members;
use Illuminate\Http\Request;

class MembersController extends Controller
{

    public function index(Request $request)
    {
        if (isset($request->reservoir_id) && $request->reservoir_id !== 0)
            $members = \App\Members::where('reservoir_id', $request->reservoir_id)->orderBy('surname')->get();
        else
            $members = \App\Members::orderBy('surname')->get();
        $reservoirs = \App\Reservoirs::orderBy('title')->get();
        return view('members.index', ['members' => $members, 'reservoirs' => $reservoirs]);
    }
    public function create()
    {
        $reservoirs = \App\Reservoirs::orderBy('title')->get();
        return view('members.create', ['reservoirs' => $reservoirs]);
    }
    public function store(Request $request)
    {
        $member = new Members();
        // can be used for seeing the insides of the incoming request
        // var_dump($request->all()); die();
        $member->fill($request->all());
        $member->save();
        return redirect()->route('members.index');
    }
    public function show(Members $member)
    {
        //
    }
    public function edit(Members $member)
    {
        $reservoirs = \App\Reservoirs::orderBy('area')->get();
        return view('members.edit', ['member' => $member, 'reservoirs' => $reservoirs]);
    }
    public function update(Request $request, Members $member)
    {
        $member->fill($request->all());
        $member->save();
        return redirect()->route('members.index');
    }
    public function destroy(Members $member, Request $request)
    {
        $member->delete();
        return redirect()->route('members.index', ['reservoir_id' => $request->input('reservoir_id')]);
    }

    public function travel($id)
    {
        $member = Members::find($id);
        return view('members.travel', ['member' => $member]);
    }
}
