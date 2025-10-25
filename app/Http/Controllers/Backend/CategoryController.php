<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $category['data'] = Category::all();
        return view('backend.pages.service_category.index', $category);
    }


    public function create()
    {
        return view('backend.pages.service_category.create');
    }


    public function store(Request $request)
    {

        $this->validate($request,[
            'name' => 'required|unique:categories,name',
        ]);


        if (Category::where('slug', Str::slug($request->name))->exists()) {
            return back()->withErrors(['error' => 'Slug already exists.'])->withInput();
        }



        $category = new Category();
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->save();
        return redirect()->route('serviceCategory')->with('msg', 'Created Successfully!');
    }


    public function edit(string $id)
    {
        $category['data'] = Category::find($id);
        return view('backend.pages.service_category.edit', $category);
    }


    public function update(Request $request, string $id)
    {
        $category = Category::find($id);
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->save();
        return redirect()->route('serviceCategory')->with('msg', 'Updated Successfully');
    }


    public function destroy(string $id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->back()->with('success', 'Deleted Successfully');
    }
}
