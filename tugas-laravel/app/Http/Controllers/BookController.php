<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BookController extends Controller
{
    public function create(){
        return view("book.tambah");
    }
    public function store(Request $request){
        $validated = $request->validate([
            'title' => 'required',
            'summary' => 'required',
            'author' => 'required',
            'release_year' => 'required',
        ]);

        $now = Carbon::now();

        DB::table('books')->insert([
            'title' => $request->input('title'),
            'summary' => $request->input('summary'),
            'author'=> $request->input('author'),
            'release_year'=> $request->input('release_year'),
            'created_at'=> $now,
            'updated_at'=> $now,
        ]);
        
        return redirect('/book');
    }
    public function index(){
        $books = DB::table('books')->get();

        return view('book.tampil',compact('books'));
    }
    public function show($id){
        $book = DB::table('books')->find($id);

        return view('book.detail',compact('book'));
    }
    public function edit($id){
        $book = DB::table('books')->find($id);

        return view('book.edit',compact('book'));
    }

    public function update (Request $request, $id){
        $validated = $request->validate([
            'title' => 'required',
            'summary' => 'required',
            'author' => 'required',
            'release_year' => 'required',
        ]);

        $now = Carbon::now();

       
        DB::table('books')
              ->where('id', $id)
              ->update(
        [
                'title' => $request->input('title'),
                'summary' => $request->input('summary'),
                'author'=> $request->input('author'),
                'release_year'=> $request->input('release_year'),
                'updated_at'=> $now,
                ]
            );
        
        return redirect('/book');
    }
    public function destroy($id){
        DB::table('books')->where('id', '=', $id)->delete();
        return redirect('/book');
    }
}
