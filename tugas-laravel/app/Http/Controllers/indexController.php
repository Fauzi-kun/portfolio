<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class indexController extends Controller
{
    public function home(){
        return view("welcome");
    }
    public function table(){
    return view("page.data-table");
    }
}
