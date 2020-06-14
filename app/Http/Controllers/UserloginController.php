<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Menu;
use App\Popularitems;
use DB;
Use App\Content;

class UserloginController extends Controller
{
    public function index()
    {

    	$menu = Menu::all()->toArray();
    	 $popular = Popularitems::all()->toArray();
    	 $pollocount = Menu::where('burgertype','=','Pollo')->count();
    	 $mixtacount = Menu::where('burgertype','=','Mixta')->count();
    	 $carnecount = Menu::where('burgertype','=','Carne')->count();
    	 $tocount = Menu::where('burgertype','=','De todito')->count();
    	 $data=[$pollocount,$mixtacount,$carnecount,$tocount];

    	 $polloarr = DB::table('menus')->where('burgertype','=','Pollo')->get();
    	 $mixtaarr = DB::table('menus')->where('burgertype','=','Mixta')->get();
    	 $carnearr = DB::table('menus')->where('burgertype','=','Carne')->get();
    	 $dearr = DB::table('menus')->where('burgertype','=','Todito')->get();
    	 //dd($polloarr);

         $id = 1;
         $content = Content::find($id);
        return view('userlogin.index', array('menu'=>$menu,'popular'=>$popular,'polloarr'=>$polloarr,'mixtaarr'=>$mixtaarr,'carnearr'=>$carnearr,'dearr'=>$dearr,'content'=>$content));
    }
}
