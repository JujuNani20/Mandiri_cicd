<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
       

        
        return view ('home');
}

    public function detail($id, $deskripsi){
        $data['id'] = $id;
        $data ['deskripsi'] = $deskripsi;

        return view('detail', $data);
    
    }

    
}


