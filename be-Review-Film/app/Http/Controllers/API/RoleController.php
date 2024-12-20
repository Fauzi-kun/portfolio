<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Roles;

class RoleController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth:api','isadmin']);
    }

    public function index(){
        $role = Roles::all();

        if(!$role){
            return response('Data kosong');
        }

        return response()->json([
            'message'=> 'tampil data berhasil',
            'data'=>$role,
        ],200);
        }
    public function store(Request $request){

        $validated = $request->validate([
            'name' => 'required',
        ],[
            'required' => 'input :attribute harus terisi',
        ]);

    $role = new Roles();

    $role->name = $request->input('name');

    $role->save();

    return response('Tambah Role berhasil');

    }

    public function show($id){
       
        $role = Roles::find($id);

        if(!$role){
            return response('Data tidak ada');
        }

        return response()->json([
            'message'=>'Detail Data Role',
            'data'=>$role,    
        ]);


    }
    public function update(Request $request, $id){

        $validated = $request->validate([
            'name' => 'required',
        ],[
            'required' => 'input :attribute harus terisi',
        ]);

        $role = Roles::find($id);

        if(!$role){
            return response('Data tidak ada');
        }

        $role->name = $request->input('name');

        $role->save();
        
        return response('Update Role berhasil');
    }

    public function destroy($id){
        $role = Roles::find($id);
        if(!$role){
            return response('Data kosong');
        }
        $role->delete();
        return response(['Message'=>'berhasil Menghapus Role']);

    }

}
