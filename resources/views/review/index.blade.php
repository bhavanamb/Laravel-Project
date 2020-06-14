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
            <div class="bgadd-after">
                <div id="in_wrapper" class="navhme">
                    <div class ="logo">
                        <img src="{{URL::asset('images/5.png')}}" alt="logo"/>
                    </div>
                       
                </div>
                <div class="profile profilehome">
                    
                    <div class="account-options">
                       <a href="customer">Home</a> 
                       
                    </div>
                    </div>
                  <div class="emp-add">
                      <div class="edit-burger">
                  
                    
                   <div id="sc-edprofile">
                        <h1>Add Review</h1>
                        <form class="sc-container" method="post" action="{{url('review')}}">
                           
                         {{csrf_field()}}
                          <label for="title">Title:</label>
                          <input type="text" name="title" placeholder="Enter Title " maxlength="25"  required>
                          <label for="title">Name:</label>
                          <input type="text" name="name" placeholder="Enter Name " maxlength="25"  required>
                          <label>Review:</label>
                          <textarea name="review" placeholder="Review" /></textarea>
                          <input type="submit" name="submit" value="Submit" required>
                          
                          
                       
                        </form>
                  </div>
                </div>
                </div>
                
                
            </div>
            <div class="">
               
                <script src="js/ibras.js"></script>
                <script src="js/validations.js"></script>
            </div>
            
        </div>
    </body>
</html>