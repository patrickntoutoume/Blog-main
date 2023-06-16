<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Categories= Category::all();
        return view('Category.index', compact('Categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("Category.save");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required'
        ]);

        $category= new Category();

        $category->name= $request->name;

        $category->save();
        return redirect(route('Category.index'));

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
        $category= Category::findOrFail($id);
        return view('Category.update', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'=>'required|min:3'
        ]);

        $category= Category::findOrFail($id);

        $category->name= $request->name;

        $category->update();
        return redirect(route('Category.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Category::destroy($id);
         return redirect(route('Category.index'));
    }
}
