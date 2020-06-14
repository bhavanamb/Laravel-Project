<?php

namespace App\Http\Controllers;

use App\Menu;

use Illuminate\Http\Request;

class OrderController extends Controller
{
	public function index()
    { 
	    $menu = Menu::all()->toArray();
	    return view('order.index', compact('menu'));

	}
}
