<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Movie;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movies = Movie::get();
        return response([
            "message"=> "berhasil tampil movie",
            "data"=> $movies
        ],201);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'poster' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'title'=>'required',
            'summary'=>'required',
            'year'=> 'required|numeric',
            'genre_id'=> 'required|exists:genres,id',
        ]);

        $uploadedFileUrl = cloudinary()->upload($request->file('poster')->getRealPath(), [
            'folder' => 'poster',
            
        ])->getSecurePath();

        $movie = new Movie;
 
        $movie->title = $request->input('title');
        $movie->summary = $request->input('summary');
        $movie->year = $request->input('year');
        $movie->genre_id = $request->input(key: 'genre_id');
        $movie->poster = $uploadedFileUrl;

 
        $movie->save();

        return response([
            'message'=>'berhasil tambah movie'
        ],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $movie = Movie::find($id);
        return response([
            'message'=> 'Berhasil tampil detail movie',
            'data'=> $movie
        ],201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'poster' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'title'=>'required',
            'summary'=>'required',
            'year'=> 'required|numeric',
            'genre_id'=> 'required|exists:genres,id',
        ]);

        $movie = Movie::find($id);
        if($request->hasFile('poster')){
            $uploadedFileUrl = cloudinary()->upload($request->file('poster')->getRealPath(), [
                'folder' => 'poster',
                
            ])->getSecurePath();
            $movie->poster = $uploadedFileUrl;
        }

        $movie->title = $request->input('title');
        $movie->summary = $request->input('summary');
        $movie->year = $request->input('year');
        $movie->genre_id = $request->input(key: 'genre_id');

        $movie->save();
        return response([
            'message'=> 'Berhasil update movie',
            'data'=> $movie
        ],201);
 
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $movie = Movie::find($id);
        if(! $movie){
            return response([
                'message'=> 'data tidak ditemukan'
            ],404);
    }
    $movie->delete();

    return response([
        'message'=> 'Berhasil delete movie',
        'data'=> $movie
    ],201);
    }
}
