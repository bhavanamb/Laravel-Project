<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Rules\emailformat;
use App\Rules\PasswordCheck;

use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;

use Auth;

class CustomAuthController extends Controller
{
    public function register(Request $request){ 
    	$this->validation($request);
    	$request['password'] = bcrypt($request->password);
    	$user = User::create($request->all());

        Mail::to($request['email'])->send(new WelcomeMail($user));

    	return redirect('home')->with('Status','Registered Successfuly!!');

    	return $request->all();
    }

    public function validation($request){
    	  return $this->validate($request,[
          'name' => 'required|unique:users',
          'email'=> ['required', new emailformat,'unique:users'],
          'password' => ['required','confirmed','min:8','max:10',new PasswordCheck],
          'address' =>'required'
        ]); 
    }

    public function login(Request $request){

    	   $this->validate($request,[
          'name' => 'required',
          'password' => 'required',
        ]); 

    	  

    	 if (Auth::attempt(['name'=>$request->name,'password'=>$request->password]))
    	 {
    	 	$user = User::where('name',$request->name)->first();
    	 	if($user->is_admin())
    	 	{
    	 	return redirect('employee')->with('Status','Login Successful!');	
    	 	}
    	 	return redirect('customer')->with('Status','Login Successful!');
    	 }

    	 return redirect('home')->with('message','Authetication Failed');
    }

    public function logout(){
    	Auth::logout();
    	return redirect('home');

    }
}
