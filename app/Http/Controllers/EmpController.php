<?php

namespace App\Http\Controllers;

use App\Menu;
use App\Content;


use Illuminate\Http\Request;

class EmpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('employee.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('employee.create');
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
          'burgername' => 'required',
          'price'=> 'required|numeric',
          'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]); 

         $menu= new Menu();

         if ($request->hasFile('image')) {
        $image = $request->file('image');
        $filename = $image->getClientOriginalName();
        $destinationPath = public_path('/images');
        $image->move($destinationPath, $filename);
        $menu->image = $filename;
         }

        $menu->burgername=$request->get('burgername');
        $menu->burgertype=$request->get('burgertype');
        $menu->calories=$request->get('calories');
        $menu->price=$request->get('price');
        $menu->ingredients=$request->get('ingredients');
        $menu->details=$request->get('details');
        
        
    
        $menu->save();
        return redirect('employee')->with('success', 'Item has been added');

    }

    public function createItem()
    {
        $menu = Menu::all()->toArray();
         return view('employee.createItem', compact('menu'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $burgerid
     * @return \Illuminate\Http\Response
     */
    public function show($burgerid)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $burgerid
     * @return \Illuminate\Http\Response
     */
    public function edit($burgerid)
    {
        $menu = Menu::find($burgerid);
        return view('employee.edit',compact('menu','burgerid'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $burgerid)
    {
        
        $image_name = $request->hidden_image;
        $image = $request->file('image');
        $menu = Menu::find($burgerid);
        
        if($image!='')
        {
            $request->validate([
          'burgername' => 'required',
          'price'=> 'required|numeric',
          'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]); 
            $image_name = $image->getClientOriginalName();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $image_name);
            $menu->image = $image_name;

        }
        else{
            $request->validate([
          'burgername' => 'required',
          'price'=> 'required|numeric',
        ]); 
        }

       $menu->burgername=$request->get('burgername');
        $menu->burgertype=$request->get('burgertype');
        $menu->calories=$request->get('calories');
        $menu->price=$request->get('price');
        $menu->ingredients=$request->get('ingredients');
        $menu->details=$request->get('details');
        $menu->save();

        return redirect('employee')->with('success', 'Item details updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($burgerid)
    {
        $menu = Menu::find($burgerid);
        $menu->delete();
        return redirect('employee')->with('success', 'Item has been deleted');
    }

}
