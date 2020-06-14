<?php
session_start();
//unset($_SESSION['error']);
?>
<html>
    <head>
        <title>Add Item</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <link rel="stylesheet" href="{{asset('css/custom.css')}}">
        <link href="//db.onlinewebfonts.com/c/41f5e8ff1d98d490a19c6d48ea7b74b1?family=Beyond+The+Mountains" rel="stylesheet" type="text/css"/>

        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    </head>
    <body>  
        <div id="wrapper">
            <div class="bgadd-after">
                <div id="in_wrapper" class="navhme">
                    <div class ="logo">
                      <a href="home">  <img src="{{URL::asset('images/5.png')}}" alt="logo"/></a>
                    </div>
                        
                </div>
                <div class="profile profilehome">
                    
                    <div class="account-options">
                       <a  href="{{action('EmpController@index')}}">Home</a>
                        <a class="active" href="{{action('EmpController@create')}}">Add Item</a>
                         <a  href="{{action('EmpController@createItem')}}">Modify/Delete Item</a>
                        <a href="{{action('PopularController@index')}}">Popular Burgers</a>
                        <a  href="{{action('ContentController@index')}}">Modify Content</a>
                    </div>
                    </div>
                  <div class="emp-add">
                      <div class="edit-burger">
                    
                    
                   <div id="sc-edprofile">
                        <h1>Add Burgers</h1>
                             @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div><br />
                        @endif
                        @if (\Session::has('success'))
                        <div class="alert alert-success">
                            <p>{{ \Session::get('success') }}</p>
                        </div><br />
                        @endif
                        <form class="sc-container" method="post" action="{{url('employee')}}"  onsubmit="return validateAddItem(this)" enctype="multipart/form-data">
                            {{csrf_field()}}
                          <label for="burgername">Burger Name:</label>
                          <input type="text" name="burgername" onchange="" placeholder="Enter Burger Name " maxlength="25"  >
                          <p style="color:red;" id="imgError"></p>
                          <label>Select Image:</label>                  
                          <input type="file" name="image" id="image" onchange="updateImgValidation()">
                          <div id="imagePreview"></div>
                          <br>
                          <br>
                          <p style="color:red;" id="burgertypeErr"></p>
                          <label>Burger Type:</label>
                          <select name="burgertype" >
                            <option value="">None</option>
                            <option value="Carne">Carne</option>
                            <option value="Pollo">Pollo</option>
                            <option value="Mixta">Mixta</option>
                            <option value="Todito">De todito</option>
                          </select>
                          <p style="color:red;" id="caloriesErr"></p>
                          <label>Calories:</label>
                          <input name="calories" type="text" placeholder="Calories" pattern="\d{1,5}" title="Only digits" >
                          <p style="color:red;" id="priceErr"></p>
                          <label>Price:</label>
                          <p style="color:red;" id="ingredientsErr"></p>
                          <input  name="price" type="text" placeholder="Price" >
                          <label>Ingredients:</label>
                          <input name="ingredients" type="text" placeholder="Ingredients" >                        
                          <label>Additional Details</label>
                          <textarea name="details" placeholder="Details" /></textarea>
                         <input type="submit" name="submit" value="Submit" >
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