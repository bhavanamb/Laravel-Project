<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

Use App\Review;
Use App\Content;



class SobreController extends Controller
{
    public function index()
    {  
    	$id = 1;
         $reviews = Review::all()->toArray();
    	 $content = Content::find($id);
    	 
        return view('sobre.index', ['reviews'=>$reviews],['content'=>$content]);
    }
}
