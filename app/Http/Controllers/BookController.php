<?php

namespace App\Http\Controllers;
use Illuminate\Pagination\Paginator;
use App\Models\Book;

use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books= Book::orderBy('id', 'DESC')->paginate(12);
        return view('books.index',compact('books'));
    }
    public function show($id)
    {
        $book = Book::findOrFail($id); 
        return view('books.show', compact('book'));
    }
    public function create()
    {
        return view('books.create');
    }
    public function store(Request $request)
    {
        //Validation
        $request->validate(
            [
                'title' => 'required | string | max:100',
                'desc' => 'required | string',
                'img' => 'nullable | mimes:jpg,png'
            ]);
        //move to public/uploads/books
        if ($request->hasFile('img')){
            $img = $request->file('img');
            $ext = $img->getClientOriginalExtension();
            $name ="Book-".time().".$ext";
            $img->move(public_path('uploads/books'),$name);
            $title = $request->title;
            $desc = $request->desc;
            Book::create([
                'title' => $title,
                'desc' => $desc,
                'img' => $name,
            ]);
        }else{
            $title = $request->title;
            $desc = $request->desc;
            Book::create([
                'title' => $title,
                'desc' => $desc,
            ]);
        }
        return redirect(route('books.index'));
    }
    public function edit($id)
    {
        $book = Book::findOrFail($id); 
        return view('books.edit', compact('book'));
    }
    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'title' => 'required | string | max:100',
                'desc' => 'required | string',
                'img' => 'nullable | mimes:png,jpg'
            ]);
        $book= Book::findOrFail($id);
        //////////////////
        $name= $book->img;
        //in case of edit the image
        if($request->hasFile('img') && $name !== null ){
            $img = $request->file('img');
            $img->move(public_path('uploads/books'),$name);
            $title = $request->title;
            $desc = $request->desc;
            $book->update([
                'title' => $title,
                'desc' => $desc,
                'img' => $name,
            ]); 
        // in case of add image 
        }else if($request->hasFile('img') && $name == null ){
            $img = $request->file('img');
            $ext = $img->getClientOriginalExtension();
            $name ="Book-".time().".$ext";
            $img->move(public_path('uploads/books'),$name);
            $title = $request->title;
            $desc = $request->desc;
            $book->update([
                'title' => $title,
                'desc' => $desc,
                'img' => $name,
            ]); 
        // in case of just edit name and description 
        }else{
            $title = $request->title;
            $desc = $request->desc;
            $book->update([
                'title' => $title,
                'desc' => $desc,
            ]);  
        }
        return redirect(route('books.show',$id));
    }
    public function delete($id){
        $book = Book::findOrFail($id);
        if($book->img !== null) {
        unlink(public_path('uploads/books/'.$book->img));
        }
        $book->delete();
        return back();
    }

}
