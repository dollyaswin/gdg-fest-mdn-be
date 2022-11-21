<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BookController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function create(Request $request)
    {
        $book = Book::create($request->all());
        return response()->json($book, Response::HTTP_CREATED);
    }
 
    public function update(Request $request, $id)
    {
        $book  = Book::find($id);
        $book->isbn   = $request->input('isbn');
        $book->title  = $request->input('title');
        $book->author = $request->input('author');
        $book->publisher = $request->input('publisher');
        $book->save();
 
        return response()->json($book, Response::HTTP_OK);
    }

    public function delete($id)
    {
        $book  = Book::find($id);
        $book->delete();
 
        return response()->json([], Response::HTTP_NO_CONTENT);
    }

    public function fetchAll()
    {
        $books  = Book::all();
        return response()->json($books);
    }
}
