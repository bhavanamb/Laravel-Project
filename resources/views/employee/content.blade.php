<?php
session_start();
?>
<html>
    <head>
        <title>iBras</title>
        <meta http-equiv="Content-Type" content="text/html; charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            <div class="bgadd-after">
                <div id="in_wrapper" class="navhme">
                    <div class ="logo">
                       <a href="home"> <img src="{{URL::asset('images/5.png')}}" alt="logo"/></a>
                    </div>
                        
                </div>
                <div class="profile profilehome">

                     <div class="account-options">
                        <a  href="employee">Home</a>
                        <a  href="{{action('EmpController@create')}}">Add Item</a>
                        <a  href="{{action('EmpController@createItem')}}">Modify/Delete Item</a>
                        <a href="popular">Popular Burgers</a>
                        <a class="active"  href="content">Modify Content</a>
                    </div>
                    </div>

                    <div class="emp-add">
                      <div class="edit-burger">
                  
                    
                   <div id="sc-edprofile">
                        <h1>Add Content</h1>
                        <form class="sc-container" method="post" action="{{action('ContentController@update',$content['id'])}}">
                           
                         {{csrf_field()}}
                         <input name="_method" type="hidden" value="PATCH">
    
                          <label>Part One:</label>
                          <textarea name="partone" placeholder="Part One" required/>{{$content['partone']}} </textarea>
                          <label>Part Two:</label>
                          <textarea name="parttwo" placeholder="Part Two" required/>{{$content['parttwo']}}</textarea>
                          <input type="submit" name="submit" value="Submit" required>
                          
                          
                       
                        </form>
                  </div>
                </div>
                </div>

                </div>
                
            </div>
           
            
        </div>
    </body>
</html>
