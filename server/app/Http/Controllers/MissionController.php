<?php

namespace App\Http\Controllers;

use App\Models\Mission;
use App\Http\Resources\MissionResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Validator;

class MissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Mission::all();
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
            'user_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'tags' => 'required',
            'needed_roles' => 'required',
            'needed_skills' => 'required',
            'estimated_time' => 'required'
        ]);

        $input = $request->all();

        $mission = Mission::create($input);
        $mission->tags = $request->input('tags.*');;
        $mission->needed_skills = $request->input('needed_skills.*');
        $mission->needed_roles = $request->input('needed_roles.*');

        $mission->save();

        return new MissionResource($mission);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mission  $mission
     * @return \Illuminate\Http\Response
     */
    public function show(Mission $mission)
    {
        return new MissionResource($mission);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mission  $mission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mission $mission)
    {
        // $request->validate([
        //     'title' => 'required',
        //     'description' => 'required',
        // ]);

        // check if currently authenticated user is the owner of the mission
        if ($request->user()->id != $mission->user_id) {
            return response()->json(['error' => 'You can only edit your own missions.'], 403);
        }

        $mission->title = $request->title;
        $mission->description = $request->description;
        // ->update($request->only(['title', 'description']));
        $mission->save();

        return new MissionResource($mission);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mission  $mission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mission $mission)
    {
        $mission->delete();

        return response()->json(null, 204);
    }
}
