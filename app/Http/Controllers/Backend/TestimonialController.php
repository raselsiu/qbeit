<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TestimonialController extends Controller
{
    public function index()
    {
        $testi['data'] = Testimonial::all();
        return view('backend.pages.testimonial.index', $testi);
    }


    public function create()
    {
        return view('backend.pages.testimonial.create');
    }


    public function store(Request $request)
    {

        $testi = new Testimonial();
        $testi->desc = $request->desc;

        $folderPath = public_path('upload/testimonial');


        if (!File::exists($folderPath)) {
            File::makeDirectory($folderPath, 0755, true, true);
        }

        if ($request->file('image')) {
            $file = $request->file('image');
            @unlink(public_path('upload/testimonial/' . $testi->image));
            $fileName = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/testimonial'), $fileName);
            $testi->image = $fileName;
        }

        $testi->save();
        return redirect()->route('testimonial')->with('msg', 'Created Successfully!');
    }


    public function edit(string $id)
    {
        $testi['data'] = Testimonial::find($id);
        return view('backend.pages.testimonial.edit', $testi);
    }


    public function update(Request $request, string $id)
    {
        $testi = Testimonial::find($id);
        $testi->desc = $request->desc;

        $folderPath = public_path('upload/testimonial');

        if (!File::exists($folderPath)) {
            File::makeDirectory($folderPath, 0755, true, true);
        }

        if ($request->file('image')) {
            $file = $request->file('image');
            @unlink(public_path('upload/testimonial/' . $testi->image));
            $fileName = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/testimonial'), $fileName);
            $testi->image = $fileName;
        }

        $testi->save();
        return redirect()->route('testimonial')->with('msg', 'Updated Successfully');
    }


    public function destroy(string $id)
    {
        $testi = Testimonial::find($id);
        @unlink(public_path('upload/testimonial/' . $testi->image));
        $testi->delete();
        return redirect()->back()->with('success', 'Deleted Successfully');
    }
}
