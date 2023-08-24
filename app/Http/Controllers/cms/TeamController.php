<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        $team_members = Team::with('media')->get();
        return \view('cms.team.index',compact('team_members'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        return \view('cms.team.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): RedirectResponse
    {
        $team = new Team();
        $team->name = $request->name;
        $team->role = $request->role;
        if ($request->teamImage) {
            $team->collection_name = 'team';
        }
        $team->save();

        if ($request->teamImage){
            $team->addMedia($request->teamImage)
                ->toMediaCollection('team');
        }
        return redirect()->route('Team.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $Team): View
    {
        return \view('cms.team.edit')->with('team', $Team);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $Team): RedirectResponse
    {
        $Team->name = $request->name;
        $Team->role = $request->role;
        $Team->update();

        return redirect()->route('Team.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $Team): RedirectResponse
    {
        $Team->delete();
        return redirect()->back();
    }
}
