<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RootController extends Controller
{
   public function root(){
        return view('root.root');
   }
}
