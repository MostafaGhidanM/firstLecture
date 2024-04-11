<?php

namespace App\Http\Controllers;

use Illuminate\Pagination\Paginator;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::orderBy('id', 'DESC')->paginate('6');
        return view('books.index', compact('books'));
    }
    public function show($id)
    {
        $book = Book::findOrFail($id);
        return view('books.show', compact('book'));
    }
    public function create()
    {
        $categories = Category::select('id', 'name')->get();
        return view('books.create', compact('categories'));
    }
    public function store(Request $request)
    {
        //Validation
        $request->validate(
            [
                'title' => 'required | string | max:100',
                'desc' => 'required | string',
                'img' => 'nullable | mimes:jpg,png',
                // 'category_ids' => 'required',
                // 'category_ids.*' => 'exists:categories,id'
            ]
        );
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
        return redirect(route('books.index'));
    }
    public function edit($id)
    {
        $categories = Category::select('id', 'name')->get();
        $book = Book::findOrFail($id);
        return view('books.edit', compact('book', 'categories'));
    }
    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'title' => 'required | string | max:100',
                'desc' => 'required | string',
                'img' => 'nullable | mimes:png,jpg',
                'category_ids' => 'nullable',
                'category_ids.*' => 'exists:categories,id'
            ]
        );
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
        return redirect(route('books.show', $id));
    }
    public function delete($id)
    {
        $book = Book::findOrFail($id);
        if ($book->img !== null) {
            unlink(public_path('uploads/books/' . $book->img));
        }
        $book->delete();
        return back();
    }
    public function search(Request $request)
    {
        $keyword = $request->keyword;
        $books =  Book::where('title', 'like', "%$keyword%")->get();
        return response()->json($books);
    }
}
