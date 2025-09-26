<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\WhoWeAre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class WhoWeAreController extends Controller
{
    public function index()
    {
        $whoweare['whoweare'] = WhoWeAre::all();
        return view('backend.pages.who_we_are.index', $whoweare);
    }


    public function create()
    {
        return view('backend.pages.who_we_are.create');
    }




    public function store(Request $request)
    {


        $count = WhoWeAre::count();
        if ($count >= 1) {
            return redirect()->back()->with('error', '1 items already Exists! Please try to update or delete one!');
        } else {
            $who = new WhoWeAre();
            $who->title = $request->title;
            $who->description = $request->description;
            $who->feature_one_title = $request->feature_one_title;
            $who->feature_one_desc = $request->feature_one_desc;
            $who->feature_two_title = $request->feature_two_title;
            $who->feature_two_desc = $request->feature_two_desc;

            $folderPath = public_path('upload/who_we_are');


            if (!File::exists($folderPath)) {
                File::makeDirectory($folderPath, 0755, true, true);
            }

            if ($request->file('feature_image_right')) {
                $file = $request->file('feature_image_right');
                @unlink(public_path('upload/who_we_are/' . $who->feature_image_right));
                $fileName = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('upload/who_we_are'), $fileName);
                $who->feature_image_right = $fileName;
            }

            if ($request->file('feature_image_one')) {
                $file = $request->file('feature_image_one');
                @unlink(public_path('upload/who_we_are/' . $who->feature_image_one));
                $fileName = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('upload/who_we_are'), $fileName);
                $who->feature_image_one = $fileName;
            }

            if ($request->file('feature_image_two')) {
                $file = $request->file('feature_image_two');
                @unlink(public_path('upload/who_we_are/' . $who->feature_image_two));
                $fileName = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('upload/who_we_are'), $fileName);
                $who->feature_image_two = $fileName;
            }


            $who->save();

            return redirect()->back()->with('msg', 'Created Successfully!');
        }
    }


    public function show(string $id)
    {
        //
    }

    // creating form



    public function edit(string $id)
    {
        $whowe['who'] = WhoWeAre::find($id);
        return view('backend.pages.who_we_are.edit', $whowe);
    }


    public function update(Request $request, string $id)
    {
        $who = WhoWeAre::find($id);
        $who->title = $request->title;
        $who->description = $request->description;
        $who->feature_one_title = $request->feature_one_title;
        $who->feature_one_desc = $request->feature_one_desc;
        $who->feature_two_title = $request->feature_two_title;
        $who->feature_two_desc = $request->feature_two_desc;

        $folderPath = public_path('upload/who_we_are');


        if (!File::exists($folderPath)) {
            File::makeDirectory($folderPath, 0755, true, true);
        }

        if ($request->file('feature_image_right')) {
            $file = $request->file('feature_image_right');
            @unlink(public_path('upload/who_we_are/' . $who->feature_image_right));
            $fileName = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/who_we_are'), $fileName);
            $who->feature_image_right = $fileName;
        }

        if ($request->file('feature_image_one')) {
            $file = $request->file('feature_image_one');
            @unlink(public_path('upload/who_we_are/' . $who->feature_image_one));
            $fileName = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/who_we_are'), $fileName);
            $who->feature_image_one = $fileName;
        }

        if ($request->file('feature_image_two')) {
            $file = $request->file('feature_image_two');
            @unlink(public_path('upload/who_we_are/' . $who->feature_image_two));
            $fileName = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/who_we_are'), $fileName);
            $who->feature_image_two = $fileName;
        }

        $who->save();
        return redirect()->back()->with('msg', 'Updated Successfully');
    }


    public function destroy(string $id)
    {
        $who = WhoWeAre::find($id);
        @unlink(public_path('upload/who_we_are/' . $who->feature_image_right));
        @unlink(public_path('upload/who_we_are/' . $who->feature_image_one));
        @unlink(public_path('upload/who_we_are/' . $who->feature_image_two));
        $who->delete();
        return redirect()->back()->with('success', 'Deleted Successfully');
    }
}
