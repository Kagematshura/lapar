<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiSearchController extends Controller
{
    public function Search(){
        return view("API.search");
    }
}
