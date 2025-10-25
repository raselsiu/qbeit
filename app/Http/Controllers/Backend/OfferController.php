<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class OfferController extends Controller
{
    public function index()
    {
        $whoweare['whoweare'] = Offer::all();
        return view('backend.pages.what_we_offer.index', $whoweare);
    }


    public function create()
    {
        return view('backend.pages.what_we_offer.create');
    }

    public function store(Request $request)
    {

        $this->validate($request,[
            'description' => 'required',
        ]);


        if (Offer::where('slug', Str::slug($request->title))->exists()) {
            return back()->with('error','Exists! Change your service title.');
        }

        $who = new Offer();
        $who->title = $request->title;
        $who->slug =  Str::slug($request->title);
        $who->description = $request->description;

        $folderPath = public_path('upload/what_we_offer');


        if (!File::exists($folderPath)) {
            File::makeDirectory($folderPath, 0755, true, true);
        }

        if ($request->file('image')) {
            $file = $request->file('image');
            @unlink(public_path('upload/what_we_offer/' . $who->image));
            $fileName = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/what_we_offer'), $fileName);
            $who->image = $fileName;
        }


        $who->save();

        return redirect()->route('offer')->with('msg', 'Created Successfully!');

    }


    public function show(string $id)
    {
        //
    }

    // creating form



    public function edit(string $id)
    {
        $whowe['what'] = Offer::find($id);
        return view('backend.pages.what_we_offer.edit', $whowe);
    }


    public function update(Request $request, string $id)
    {
        $who = Offer::find($id);
        $who->title = $request->title;
        $who->slug = Str::slug($request->title);
        $who->description = $request->description;

        $folderPath = public_path('upload/what_we_offer');


        if (!File::exists($folderPath)) {
            File::makeDirectory($folderPath, 0755, true, true);
        }

        if ($request->file('image')) {
            $file = $request->file('image');
            @unlink(public_path('upload/what_we_offer/' . $who->image));
            $fileName = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/what_we_offer'), $fileName);
            $who->image = $fileName;
        }

        $who->save();
        return redirect()->route('offer')->with('msg', 'Updated Successfully');
    }


    public function destroy(string $id)
    {
        $who = Offer::find($id);
        @unlink(public_path('upload/what_we_offer/' . $who->feature_image_right));
        $who->delete();
        return redirect()->back()->with('success', 'Deleted Successfully');
    }
}
