<?php

namespace App\Http\Controllers;

use App\Models\Backend\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{
    public function index()
    {
        $slider['sliders'] = Slider::all();
        return view('backend.pages.slider.index', $slider);
    }

    public function store(Request $request)
    {
        $slider = new Slider();
        $slider->title = $request->title;
        $slider->subtitle = $request->subtitle;

        $folderPath = public_path('upload/slider');
        if (!File::exists($folderPath)) {
            File::makeDirectory($folderPath, 0755, true, true);
        }
        if ($request->file('image')) {
            $file = $request->file('image');
            @unlink(public_path('upload/slider/' . $slider->image));
            $fileName = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/slider'), $fileName);
            $slider->image = $fileName;
        }

        $slider->save();
        return redirect()->back()->with('msg', 'Created Successfully!');
    }


    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        $slider['slider'] = Slider::find($id);
        return view('backend.pages.slider.edit', $slider);
    }


    public function update(Request $request, string $id)
    {
        $slider = Slider::find($id);
        $slider->title = $request->title;
        $slider->subtitle = $request->subtitle;
        $folderPath = public_path('upload/slider');

        if (!File::exists($folderPath)) {
            File::makeDirectory($folderPath, 0755, true, true);
        }

        if ($request->file('image')) {
            $file = $request->file('image');
            @unlink(public_path('upload/slider/' . $slider->image));
            $fileName = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/slider'), $fileName);
            $slider->image = $fileName;
        }

        $slider->save();
        return redirect()->route('slider')->with('msg', 'Updated Successfully');
    }


    public function destroy(string $id)
    {
        $slider = Slider::find($id);
        @unlink(public_path('upload/slider/' . $slider->image));
        $slider->delete();
        return redirect()->back()->with('success', 'Deleted Successfully');
    }
}
