<?php

namespace App\Http\Controllers;

use App\Models\Backend\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BannerController extends Controller
{
    public function index()
    {
        $banner['banners'] = Banner::all();
        return view('backend.pages.banner.index', $banner);
    }


    public function store(Request $request)
    {
        $count = Banner::count();
        if ($count >= 3) {
            return redirect()->back()->with('error', '3 items already Exists! Please try to update or delete one!');
        } else {
            $banner = new Banner();
            $banner->title = $request->title;
            $banner->subtitle = $request->subtitle;
            $folderPath = public_path('upload/banner');

            if (!File::exists($folderPath)) {
                File::makeDirectory($folderPath, 0755, true, true);
            }

            if ($request->file('image')) {
                $file = $request->file('image');
                @unlink(public_path('upload/banner/' . $banner->image));
                $fileName = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('upload/banner'), $fileName);
                $banner->image = $fileName;
            }
            $banner->save();
            return redirect()->back()->with('msg', 'Created Successfully!');
        }
    }


    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        $banner['banner'] = Banner::find($id);
        return view('backend.pages.banner.edit', $banner);
    }


    public function update(Request $request, string $id)
    {
        $banner = Banner::find($id);
        $banner->title = $request->title;
        $banner->subtitle = $request->subtitle;
        $folderPath = public_path('upload/banner');

        if (!File::exists($folderPath)) {
            File::makeDirectory($folderPath, 0755, true, true);
        }

        if ($request->file('image')) {
            $file = $request->file('image');
            @unlink(public_path('upload/banner/' . $banner->image));
            $fileName = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/banner'), $fileName);
            $banner->image = $fileName;
        }
        $banner->save();
        return redirect()->route('banner')->with('msg', 'Updated Successfully');
    }


    public function destroy(string $id)
    {
        $banner = Banner::find($id);
        @unlink(public_path('upload/banner/' . $banner->image));
        $banner->delete();
        return redirect()->back()->with('success', 'Deleted Successfully');
    }
}
