<?php

namespace App\Http\Controllers;

use App\Menu;
use App\Popularitems;

use Illuminate\Http\Request;

class MenuController extends Controller
{
     public function index()
    {  
    	
         $menu = Menu::all()->toArray();
    	 $popular = Popularitems::all()->toArray();
        return view('menu.index', ['menu'=>$menu],['popular'=>$popular]);
    }
}
