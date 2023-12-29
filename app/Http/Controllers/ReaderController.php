<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reader;

class ReaderController extends Controller
{
    public function index()
    {
        $readers = Reader::latest()->paginate(50);
        return view('readers.index', compact('readers'));
    }

    

    public function edit(string $id)
    {
        $reader = Reader::find($id);
        return view('readers.edit', compact('reader'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'status' => 'required'
          ]);
          $readers = Reader::find($id);
          $readers->update($request->all());
        
          return redirect()->route('readers.index')
            ->with('success', 'Reader updated successfully');
    }
}
