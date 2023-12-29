<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Reader;
use App\Models\Borrow;
use Illuminate\Support\Facades\Mail;
use App\Mail\BorrowMail;

class BookController extends Controller
{
    function __construct()
    {
        // $this->middleware(['permission:create-books|edit-books|delete-books'], ['only' => ['index', 'show']]);
        // $this->middleware(['permission:book-create'], ['only' => ['create', 'store']]);
        // $this->middleware(['permission:book-edit'], ['only' => ['edit', 'update']]);
        $this->middleware(['permission:book-delete'], ['only' => ['destroy']]);
    }
    public function index()
    {
        $books = Book::latest()->paginate(50);
        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required ',
            'author' => 'required',
            'status' => 'required'
        ]);

        Book::create($request->all());

        return redirect()->route('books.index')
            ->with('success', 'Book created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    { 
        $book = Book::find($id);
        return view('books.show', compact('book'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $book = Book::find($id);
        return view('books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'author' => 'required',
            'status' => 'required'
          ]);
          $book = Book::find($id);
          $book->update($request->all());
        
          return redirect()->route('books.index')
            ->with('success', 'Book updated successfully');
            
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $book = Book::find($id);
        $book->delete();
        return redirect()->route('books.index')
        ->with('success', 'Book deleted successfully');

    }

    public function issue($id)
    {
        $book = Book::find($id);
        $readers = Reader::get(); 
        return view('books.borrow_book', compact(['book','readers']));

    }

    public function borrows(Request $request, $id){
        request()->validate([
            'book_id' => 'required ',
            'user_id' => 'required',
            'issued_at' => now(),
            
        ]);

        $borrow = Borrow::create($request->all());
        $book = Book::find($id);
        $data = array(
            
        );
        $book = Book::increment('issued_count',1);

        $borrowed_book = Borrow::with(['book', 'user'])
        ->find($borrow->id);

        // Send Email to the Reader
        Mail::to(Reader::find($request->user_id)->email)->send(new BorrowMail($borrowed_book));

        return redirect()->route('books.index')
            ->with('success', 'Book borrowed successfully.');
    }

    public function history(){

    }

    
}
