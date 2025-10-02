<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\WhyChooseUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class WhyChooseUsController extends Controller
{
    public function index()
    {
        $whyChooseUs['whyChooseUs'] = WhyChooseUs::all();
        return view('backend.pages.why_choose_us.index', $whyChooseUs);
    }


    public function create()
    {
        return view('backend.pages.why_choose_us.create');
    }




    public function store(Request $request)
    {

        $this->validate($request, [
            'title' => 'required',
            'desc' => 'required',
            'feature_1_title' => 'required',
            'feature_1_desc' => 'required',
            'feature_1_img' => 'required|mimes:jpg,jpeg,png,webp',
            'feature_2_title' => 'required',
            'feature_2_desc' => 'required',
            'feature_2_img' => 'required|mimes:jpg,jpeg,png,webp',
            'feature_3_title' => 'required',
            'feature_3_desc' => 'required',
            'feature_3_img' => 'required|mimes:jpg,jpeg,png,webp',

            // Section Image
            'section_img_1' => 'required|mimes:jpg,jpeg,png,webp',
            'section_img_2' => 'required|mimes:jpg,jpeg,png,webp',
            'section_img_3' => 'required|mimes:jpg,jpeg,png,webp',
            'section_img_4' => 'required|mimes:jpg,jpeg,png,webp',
        ]);


        $count = WhyChooseUs::count();
        if ($count >= 1) {
            return redirect()->back()->with('error', '1 items already Exists! Please try to update or delete one!');
        } else {
            $why = new WhyChooseUs();
            $why->title = $request->title;
            $why->desc = $request->desc;
            $why->feature_1_title = $request->feature_1_title;
            $why->feature_1_desc = $request->feature_1_desc;
            $why->feature_2_title = $request->feature_2_title;
            $why->feature_2_desc = $request->feature_2_desc;
            $why->feature_3_title = $request->feature_3_title;
            $why->feature_3_desc = $request->feature_3_desc;

            $folderPath = public_path('upload/why_choose_us');


            if (!File::exists($folderPath)) {
                File::makeDirectory($folderPath, 0755, true, true);
            }

            if ($request->file('feature_1_img')) {
                $file = $request->file('feature_1_img');
                @unlink(public_path('upload/why_choose_us/' . $why->feature_1_img));
                $fileName = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('upload/why_choose_us'), $fileName);
                $why->feature_1_img = $fileName;
            }

            if ($request->file('feature_2_img')) {
                $file = $request->file('feature_2_img');
                @unlink(public_path('upload/why_choose_us/' . $why->feature_2_img));
                $fileName = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('upload/why_choose_us'), $fileName);
                $why->feature_2_img = $fileName;
            }

            if ($request->file('feature_3_img')) {
                $file = $request->file('feature_3_img');
                @unlink(public_path('upload/why_choose_us/' . $why->feature_3_img));
                $fileName = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('upload/why_choose_us'), $fileName);
                $why->feature_3_img = $fileName;
            }



            // Section Image

            if ($request->file('section_img_1')) {
                $file = $request->file('section_img_1');
                @unlink(public_path('upload/why_choose_us/' . $why->section_img_1));
                $fileName = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('upload/why_choose_us'), $fileName);
                $why->section_img_1 = $fileName;
            }

            if ($request->file('section_img_2')) {
                $file = $request->file('section_img_2');
                @unlink(public_path('upload/why_choose_us/' . $why->section_img_2));
                $fileName = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('upload/why_choose_us'), $fileName);
                $why->section_img_2 = $fileName;
            }

            if ($request->file('section_img_3')) {
                $file = $request->file('section_img_3');
                @unlink(public_path('upload/why_choose_us/' . $why->section_img_3));
                $fileName = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('upload/why_choose_us'), $fileName);
                $why->section_img_3 = $fileName;
            }

            if ($request->file('section_img_4')) {
                $file = $request->file('section_img_4');
                @unlink(public_path('upload/why_choose_us/' . $why->section_img_4));
                $fileName = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('upload/why_choose_us'), $fileName);
                $why->section_img_4 = $fileName;
            }

            // End Section Image

            $why->save();

            return redirect()->route('whyChooseUs')->with('msg', 'Created Successfully!');
        }
    }




    public function edit(string $id)
    {
        $why['why'] = WhyChooseUs::find($id);
        return view('backend.pages.why_choose_us.edit', $why);
    }


    public function update(Request $request, string $id)
    {
        $why = WhyChooseUs::find($id);
        $why->title = $request->title;
        $why->desc = $request->desc;
        $why->feature_1_title = $request->feature_1_title;
        $why->feature_1_desc = $request->feature_1_desc;
        $why->feature_2_title = $request->feature_2_title;
        $why->feature_2_desc = $request->feature_2_desc;
        $why->feature_3_title = $request->feature_3_title;
        $why->feature_3_desc = $request->feature_3_desc;


        $folderPath = public_path('upload/why_choose_us');

        if (!File::exists($folderPath)) {
            File::makeDirectory($folderPath, 0755, true, true);
        }

        if ($request->file('feature_1_img')) {
            $file = $request->file('feature_1_img');
            @unlink(public_path('upload/why_choose_us/' . $why->feature_1_img));
            $fileName = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/why_choose_us'), $fileName);
            $why->feature_1_img = $fileName;
        }

        if ($request->file('feature_2_img')) {
            $file = $request->file('feature_2_img');
            @unlink(public_path('upload/why_choose_us/' . $why->feature_2_img));
            $fileName = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/why_choose_us'), $fileName);
            $why->feature_2_img = $fileName;
        }

        if ($request->file('feature_3_img')) {
            $file = $request->file('feature_3_img');
            @unlink(public_path('upload/why_choose_us/' . $why->feature_3_img));
            $fileName = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/why_choose_us'), $fileName);
            $why->feature_3_img = $fileName;
        }



        // Section Image

        if ($request->file('section_img_1')) {
            $file = $request->file('section_img_1');
            @unlink(public_path('upload/why_choose_us/' . $why->section_img_1));
            $fileName = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/why_choose_us'), $fileName);
            $why->section_img_1 = $fileName;
        }

        if ($request->file('section_img_2')) {
            $file = $request->file('section_img_2');
            @unlink(public_path('upload/why_choose_us/' . $why->section_img_2));
            $fileName = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/why_choose_us'), $fileName);
            $why->section_img_2 = $fileName;
        }

        if ($request->file('section_img_3')) {
            $file = $request->file('section_img_3');
            @unlink(public_path('upload/why_choose_us/' . $why->section_img_3));
            $fileName = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/why_choose_us'), $fileName);
            $why->section_img_3 = $fileName;
        }

        if ($request->file('section_img_4')) {
            $file = $request->file('section_img_4');
            @unlink(public_path('upload/why_choose_us/' . $why->section_img_4));
            $fileName = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/why_choose_us'), $fileName);
            $why->section_img_4 = $fileName;
        }

        // End Section Image



        $why->save();
        return redirect()->route('whyChooseUs')->with('msg', 'Updated Successfully');
    }


    public function destroy(string $id)
    {
        $why = WhyChooseUs::find($id);

        // Feature Image
        @unlink(public_path('upload/why_choose_us/' . $why->feature_1_img));
        @unlink(public_path('upload/why_choose_us/' . $why->feature_2_img));
        @unlink(public_path('upload/why_choose_us/' . $why->feature_3_img));

        // Section Image
        @unlink(public_path('upload/why_choose_us/' . $why->section_img_1));
        @unlink(public_path('upload/why_choose_us/' . $why->section_img_2));
        @unlink(public_path('upload/why_choose_us/' . $why->section_img_3));
        @unlink(public_path('upload/why_choose_us/' . $why->section_img_4));

        $why->delete();

        return redirect()->back()->with('success', 'Deleted Successfully');
    }
}
