<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Validator;

class ApiBookController extends Controller
{
    public function index()
    {
        $books = Book::with('categories')->select()->get();
        return response()->json($books);
    }
    public function show($id)
    {
        $book = Book::with('categories')->findOrFail($id);
        return response()->json($book);
    }
    public function store(Request $request)
    {
        //Validation
        // $request->validate(
        //     [
        //         'title' => 'required | string | max:100',
        //         'desc' => 'required | string',
        //         'img' => 'required | mimes:jpg,png',
        //         'category_ids' => 'required',
        //         'category_ids.*' => 'exists:categories,id'
        //     ]
        // );
        $validator = Validator::make($request->all(), [
            'title' => 'required | string | max:100',
            'desc' => 'required | string',
            'img' => 'required | mimes:jpg,png',
            // 'category_ids' => 'required',
            'category_ids.*' => 'exists:categories,id'
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            return response()->json($errors);
        }
        $title = $request->title;
        $desc = $request->desc;
        //move to public/uploads/books
        if ($request->hasFile('img')) {
            $img = $request->file('img');
            $ext = $img->getClientOriginalExtension();
            $name = "Book-" . time() . ".$ext";
            $img->move(public_path('uploads/books'), $name);
            $book = Book::create([
                'title' => $title,
                'desc' => $desc,
                'img' => $name,
            ]);
            $book->categories()->sync($request->category_ids);
        } else {
            $book = Book::create([
                'title' => $title,
                'desc' => $desc,
            ]);
            $book->categories()->sync($request->category_ids);
        }
        $success = 'Book Has Been Created Succussfully';
        return response()->json($success);
    }
    public function update(Request $request, $id)
    {
        // $request->validate(
        //     [
        //         'title' => 'required | string | max:100',
        //         'desc' => 'required | string',
        //         'img' => 'nullable | mimes:png,jpg',
        //         'category_ids' => 'nullable',
        //         'category_ids.*' => 'exists:categories,id'
        //     ]
        // );
        $validator = Validator::make($request->all(), [
            'title' => 'nullable | string | max:100',
            'desc' => 'nullable | string',
            'img' => 'nullable | mimes:jpg,png',
            'category_ids' => 'nullable',
            'category_ids.*' => 'exists:categories,id'
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            return response()->json($errors);
        }
        $book = Book::findOrFail($id);
        $name = $book->img;
        $title = $request->title;
        $desc = $request->desc;
        //in case of edit the image
        if ($request->hasFile('img') && $name !== null) {
            $img = $request->file('img');
            $img->move(public_path('uploads/books'), $name);
            $book->update([
                'title' => $title,
                'desc' => $desc,
                'img' => $name,
            ]);
            $book->categories()->sync($request->category_ids);
            // in case of add image 
        } else if ($request->hasFile('img') && $name == null) {
            $img = $request->file('img');
            $ext = $img->getClientOriginalExtension();
            $name = "Book-" . time() . ".$ext";
            $img->move(public_path('uploads/books'), $name);
            $book->update([
                'title' => $title,
                'desc' => $desc,
                'img' => $name,
            ]);
            $book->categories()->sync($request->category_ids);

            // in case of just edit name and description 
        } else {
            $book->update([
                'title' => $title,
                'desc' => $desc,
            ]);
            $book->categories()->sync($request->category_ids);
        }
        $success = 'Book Has Been Created Succussfully';
        return response()->json($success);
    }
    public function delete($id)
    {
        $book = Book::findOrFail($id);
        if ($book->img !== null) {
            unlink(public_path('uploads/books/' . $book->img));
        }
        $book->delete();
        $success = 'Book Has Been Deleted Succussfully';
        return response()->json($success);
    }
}
