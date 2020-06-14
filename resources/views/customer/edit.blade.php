<?php
session_start();

?>
<html>
     <head>
        <title>iBras</title>
        <meta http-equiv="Content-Type" content="text/html; charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="{{asset('css/ibras.css')}}">
        <link href="//db.onlinewebfonts.com/c/41f5e8ff1d98d490a19c6d48ea7b74b1?family=Beyond+The+Mountains" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="{{asset('css/custom.css')}}">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    </head>
    <body>
        <div id="wrapper">
            <div class="edit-div">
                <div id="in_wrapper" class="navhme">
                    <div class ="logo">
                       <a href="home"> <img src="{{URL::asset('images/5.png')}}" alt="logo"/></a>
                    </div>
                        
                </div>
                <div class="edit-nav-links">
                    
                     
                <div class="profile profilehome">
                    
                    
                    <div class="account-options">
                       <a href="{{action('CustomerController@index')}}">Home</a> 
                        <a class="active" href="{{action('CustomerController@edit',$user->id)}}">Edit Profile</a>                       
                        <a href="{{action('CustomerController@show',$user->id)}}">Address</a>
                
                        <a href="/review">Add Review</a>
                    </div>
                    <br>
                    <br>
                </div>
                    <br>
                    <br>
                     <br>
                <div class="edit-profile">
                    
                   <div id="sc-edprofile">
                        <h1>Edit Profile</h1>
                        <form class="sc-container" action="{{action('CustomerController@update',$user->id)}}" method="post">
                        {{csrf_field()}}
                        <input name="_method" type="hidden" value="PATCH">
                        <label>Username:</label>
                            <input style="background: #dddddd;" name="name" type="text" type="hidden" value="{{$user->name}}" />
                            <label>Email Address:</label>
                            <input  type="email" name="email" value="{{$user->email}}" />
                            <label>Address</label>
                            <textarea placeholder="" name="address" />{{$user->address}}</textarea>
                          <input type="submit" name="submit" value="Submit" required />
                        </form>
                  </div>
                </div>
                </div>   
            </div>
            <div class="row5">
                
                <script src="js/ibras.js"></script>
                <script src="js/validations.js"></script>
            </div>
            
        </div>
    </body>
</html>

