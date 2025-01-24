<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormResepController extends Controller
{
    public function FormResep(){
        return view("resep.form_resep");
    }
}
