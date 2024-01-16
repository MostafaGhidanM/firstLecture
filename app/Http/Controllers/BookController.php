<?php

namespace App\Http\Controllers;
use App\Models\Book;

use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books= Book::paginate(2); //select all
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

}
