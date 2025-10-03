<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\WorkWithUs;
use Illuminate\Http\Request;

class WorkWithUsController extends Controller
{
        public function index()
    {
        $wwu['data'] = WorkWithUs::all();
        return view('backend.pages.work_with_us.index', $wwu);
    }


    public function create()
    {
        return view('backend.pages.work_with_us.create');
    }


    public function store(Request $request)
    {
        $wwu = new WorkWithUs();
        $wwu->title = $request->title;
        $wwu->email = $request->email;
        $wwu->save();
        return redirect()->route('workWithUs')->with('msg', 'Created Successfully!');
    }


    public function edit(string $id)
    {
        $wwu['data'] = WorkWithUs::find($id);
        return view('backend.pages.work_with_us.edit', $wwu);
    }


    public function update(Request $request, string $id)
    {
        $wwu = WorkWithUs::find($id);
        $wwu->title = $request->title;
        $wwu->email = $request->email;
        $wwu->save();
        return redirect()->route('workWithUs')->with('msg', 'Updated Successfully');
    }


    public function destroy(string $id)
    {
        $wwu = WorkWithUs::find($id);
        $wwu->delete();
        return redirect()->back()->with('success', 'Deleted Successfully');
    }
}
