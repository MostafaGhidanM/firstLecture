<?php

namespace App\Http\Controllers;
use Illuminate\Pagination\Paginator;
use App\Models\Book;

use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books= Book::orderBy('id', 'DESC')->paginate(12); //select all
        //$books = Book::select('title','desc')->get();
        //$books = Book::where('id','=>',2)->get();
        //$books = Book::select('title','desc')->where('id','>=',1)->orderBy('id','DESC')->get();
        //dd($books);
        return view('books.index',compact('books'));
    }
    public function show($id)
    {
        //Book::where('id','=',$id)->first();   
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
                'img' => 'required | mimes:jpg,png'
            ]);
        //move to public/uploads/books
        $img = $request->file('img');
        $ext = $img->getClientOriginalExtension();
        $name ="book-". uniqid().".$ext";
        $img->move(public_path('uploads/books'),$name);
        $title = $request->title;
        $desc = $request->desc;
        Book::create([
            'title' => $title,
            'desc' => $desc,
            'img' => $name,
        ]);
        return redirect(route('books.index'));
    }
    public function edit($id)
    {
        //Book::where('id','=',$id)->first();   
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
        $name= $book->img;
        //move to public/uploads/books
        if($request->hasFile('img')){
            if($name !== null){
                unlink(public_path('uploads/books/'.$name));
            }
            $img = $request->file('img');
            $ext = $img->getClientOriginalExtension();
            $name = "book-". uniqid(). ".$ext";
            $img->move(public_path('uploads/books'. $name));
        }
        $title = $request->title;
        $desc = $request->desc;
        $book->update([
            'title' => $title,
            'desc' => $desc,
            'img' => $name,
        ]);    
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
