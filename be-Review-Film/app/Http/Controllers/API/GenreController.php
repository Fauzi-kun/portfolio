<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Genre;
use App\Models\Movie;

class GenreController extends Controller
{
    public function index(){
        $genre = Genre::get();
        return response()->json([
            "message"=> 'Berhasil Tampil semua genre',
            'genre'=>$genre
        ]);
    }

    public function store(Request $request){

        $validated = $request->validate([
            'name' => 'required',
        ],[
            'required' => ':attribute harus di isi',
        ]);

        $genre = new Genre();

        $genre->name = $request->input('name');

        $genre->save();
        return response(['message'=>'Berhasil tambah genre']);

    }
    public function show($id){
        $genre = Genre::find($id);

        $list = Movie::where('genre_id',$genre->id)->get();

        return response()->json([
            'message'=> 'Berhasil Detail data dengan id '. $genre->id,
            'data'=>$genre,
            'list_movies'=>$list
        ]);

    }
    public function update(Request $request, $id){
        $validated = $request->validate([
            'name' => 'required',
        ],[
            'required' => ':attribute harus di isi',
        ]);

        $genre = Genre::find($id);

        $genre->name = $request->input('name');

        $genre->save();
        return response(['message'=> 'berhasil melakukan update genre id :'.$genre->id]);

    }
    public function destroy($id){

        $genre = Genre::find($id);

        $genre->delete();

        return response(['message'=> 'data dengan id : '. $genre->id . 'berhasil dihapus']);
    }
}
