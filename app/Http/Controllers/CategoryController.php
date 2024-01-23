<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories= Category::orderBy('id', 'DESC')->paginate(3); //select all
        return view('categories.index',compact('categories'));
    }
    public function show($id)
    {
        $category = Category::findOrFail($id); 
        return view('categories.show', compact('category'));
    }
    public function create()
    {
        return view('categories.create');
    }
    public function store(Request $request)
    {
        //Validation
        $request->validate(
            [
                'name' => 'required | string | max:100',
            ]);
        $name = $request->name;
        Category::create([
            'name' => $name,
        ]);
        return redirect(route('categories.index'));
    }
    public function edit($id)
    {
        $category = Category::findOrFail($id); 
        return view('categories.edit', compact('category'));
    }
    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'name' => 'required | string | max:100',
            ]);
        $category= Category::findOrFail($id);
        $name= $category->name;
        $name = $request->name;
        $category->update([
            'name' => $name,
        ]);    
        return redirect(route('categories.show',$id));
    }
    public function delete($id){
        $category = Category::findOrFail($id);
        $category->delete();
        return back();
    }

}
