<?php

namespace App\Http\Controllers\Api;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Requests\BookRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\ApiBookRequest;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\returnSelf;

class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware('manager')->except('index','show');
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $request->validate([
            'sub_category_id' =>['integer']
        ]);
        $query=Book::query();
        if($request->sub_category_id)
            $query->where('sub_category_id',$request->sub_category_id);
        $books= $query->get();

        return response()->json($books,200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BookRequest $request)
    {
        $book=new Book();
        $book->name=$request->name;
        $book->author=$request->author;
        $book->year=$request->year;
        $book->sub_category_id=$request->sub_category_id;
        
        $book->save();
      
        return response()->json($book,200); 
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return response()->json($book,200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ApiBookRequest $request, Book $book)
    {
        $book->name=$request->name??$book->name;
        $book->author=$request->author??$book->author;
        $book->year=$request->year??$book->year;
        $book->sub_category_id=$request->sub_category_id??$book->sub_category_id;

        $book->save();

        return response()->json($book,200);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return response()->json(
            [
                'message' =>'you delete book successfuly'
            ],200);
    }
}
