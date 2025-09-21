<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\TopHeader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TopHeaderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['fh'] = TopHeader::first();
        return view('backend.pages.top_header.index', $data);
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $count = TopHeader::count();
        if ($count >= 1) {
            return redirect()->back()->with('error', 'Data Already Exists! Please try to update or delete it');
        } else {
            $fh = new TopHeader();
            $fh->email = $request->email;
            $fh->phone = $request->phone;
            $fh->address = $request->address;
            $fh->logo = $request->logo;
            $fh->fb = $request->fb;
            $fh->ln = $request->ln;
            $fh->wh = $request->wh;

            // Image insertion

            $folderPath = public_path('upload/header_footer');

            if (!File::exists($folderPath)) {
                File::makeDirectory($folderPath, 0755, true, true);
            }

            if ($request->file('logo')) {
                $file = $request->file('logo');
                @unlink(public_path('upload/header_footer/' . $fh->logo));
                $fileName = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('upload/header_footer'), $fileName);
                $fh->logo = $fileName;
            }

            $fh->save();
            return redirect()->back()->with('msg', 'Created Successfully!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['info'] = TopHeader::find($id);
        return view('backend.pages.top_header.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = TopHeader::find($id);

        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;
        $data->logo = $request->logo;
        $data->fb = $request->fb;
        $data->ln = $request->ln;
        $data->wh = $request->wh;

        // Image insertion

        $folderPath = public_path('upload/header_footer');

        if (!File::exists($folderPath)) {
            File::makeDirectory($folderPath, 0755, true, true);
        }

        if ($request->file('logo')) {
            $file = $request->file('logo');
            @unlink(public_path('upload/header_footer/' . $data->logo));
            $fileName = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/header_footer'), $fileName);
            $data->logo = $fileName;
        }

        $data->save();

        return redirect()->route('topHeader')->with('msg', 'Updated Successfully');
    }


    public function destroy(string $id)
    {
        $data = TopHeader::find($id);
        @unlink(public_path('upload/header_footer/' . $data->logo));
        $data->delete();
        return redirect()->back()->with('success', 'Deleted Successfully');
    }
}
