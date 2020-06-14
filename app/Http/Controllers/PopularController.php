<?php

namespace App\Http\Controllers;
use App\Popularitems;


use Illuminate\Http\Request;

class PopularController extends Controller
{
     public function index()
    {
    	$popular = Popularitems::all()->toArray();
        return view('popular.index', compact('popular'));
    }

    public function create()
    {
    		$popular = Popularitems::all()->toArray();
            return view('popular.create', compact('popular'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(Request $request)
    {
        
         $request->validate([
          'burgertype' => 'required',
          'price'=> 'required|numeric',
          'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]); 

         $popular= new Popularitems();

         if ($request->hasFile('image')) {
        $image = $request->file('image');
        $filename = $image->getClientOriginalName();
        $destinationPath = public_path('/images');
        $image->move($destinationPath, $filename);
        $popular->image = $filename;
         }

        
        $popular->burgertype=$request->get('burgertype');
        $popular->price=$request->get('price');
        $popular->burgername=$request->get('burgername');
        
        
        
    
        $popular->save();
        return redirect('employee')->with('success', 'Popular Item has been added');

    }
    public function destroy($id)
    {
    	
        $popular = Popularitems::find($id);
        $popular->delete();
        return redirect('employee')->with('success', 'Item has been deleted');
    }
}
