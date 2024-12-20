<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\cast;


class CastController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cast = cast::all();

        return response([
            'message'=>"Tampil Data Berhasil",
            'data' => $cast,
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:2',
            'age' => 'required',
            'bio' => 'required',
        ],[
            'required' => 'harus di isi ya',
            'min' => 'kurang',
        ]);

        $cast = new cast;
 
        $cast->name = $request->input('name');
        $cast->age = $request->input('age');
        $cast->bio = $request->input('bio');

        $cast->save();

        return response([
            'message'=>"Tambah cast berhasil"
        ], 201);
  
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cast = cast::find($id);
        if(!$cast){
            return response([
                "message" => "Data tidak ditemukan"
            ], 404);
        }

        return response([
            "message"=> "Detail Data Cast",
            "data" => $cast
            ],200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        

        
        $validated = $request->validate([
            'name' => 'required|min:2',
            'age' => 'required',
            'bio' => 'required',
        ],[
            'required' => 'harus di isi',
            'min' => 'kurang',
        ]);
        
        $cast = cast::find($id);
        
        if(!$cast){
            return response([
                "message" => "Data tidak ditemukan"
            ], 404);
        }
        
 
        $cast->name = $request->input('name');
        $cast->age = $request->input('age');
        $cast->bio = $request->input('bio');
        
        $cast->save();

        return response([
            'message'=>"Update Data Berhasil",
            'data' => $cast,
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cast = cast::find($id);

        if(!$cast){
            return response([
                "message" => "Data tidak ditemukan"
            ], 404);
        }

        $cast->delete();

        return response([
            'message'=>"Berhasil menghapus Cast",
            'data' => $cast,
        ], 201);
    }
    }

