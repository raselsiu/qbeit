<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TeamController extends Controller
{
    public function index()
    {
        $team['team'] = Team::all();
        return view('backend.pages.team.index', $team);
    }


    public function create()
    {
        return view('backend.pages.team.create');
    }


    public function store(Request $request)
    {

        $team = new Team();
        $team->name = $request->name;
        $team->designation = $request->designation;
        $team->fb = $request->fb;
        $team->twitter = $request->twitter;
        $team->linkd = $request->linkd;
        $team->insta = $request->insta;

        $folderPath = public_path('upload/team');


        if (!File::exists($folderPath)) {
            File::makeDirectory($folderPath, 0755, true, true);
        }

        if ($request->file('image')) {
            $file = $request->file('image');
            @unlink(public_path('upload/team/' . $team->image));
            $fileName = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/team'), $fileName);
            $team->image = $fileName;
        }


        $team->save();

        return redirect()->route('team')->with('msg', 'Created Successfully!');
    }


    public function show(string $id)
    {
        //
    }

    // creating form

    public function edit(string $id)
    {
        $team['team'] = Team::find($id);
        return view('backend.pages.team.edit', $team);
    }


    public function update(Request $request, string $id)
    {
        $team = Team::find($id);
        $team->name = $request->name;
        $team->designation = $request->designation;
        $team->fb = $request->fb;
        $team->twitter = $request->twitter;
        $team->linkd = $request->linkd;
        $team->insta = $request->insta;

        $folderPath = public_path('upload/team');


        if (!File::exists($folderPath)) {
            File::makeDirectory($folderPath, 0755, true, true);
        }

        if ($request->file('image')) {
            $file = $request->file('image');
            @unlink(public_path('upload/team/' . $team->image));
            $fileName = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/team'), $fileName);
            $team->image = $fileName;
        }

        $team->save();
        return redirect()->route('team')->with('msg', 'Updated Successfully');
    }


    public function destroy(string $id)
    {
        $team = Team::find($id);
        @unlink(public_path('upload/team/' . $team->image));
        $team->delete();
        return redirect()->back()->with('success', 'Deleted Successfully');
    }
}
