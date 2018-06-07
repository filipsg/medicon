<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaginasController extends Controller
{
    //
    public function inicio(){
    	return view('front.inicio');
    }

    public function nosotros(){
    	return view('front.nosotros');
    }

    public function servicios(){
    	return view('front.servicios');
    }
    
    public function contacto(){
    	return view('front.contacto');
    }
}
