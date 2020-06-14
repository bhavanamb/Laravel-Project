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
                        <a href="home"><img src="{{URL::asset('images/5.png')}}" alt="logo"/></a>
                    </div>
                        
                </div>
                <div class="profile profilehome">

                   <div class="account-options">
                        <a  href="{{action('EmpController@index')}}">Home</a>
                        <a  href="{{action('EmpController@create')}}">Add Item</a>
                        <a class="active" href="{{action('EmpController@createItem')}}">Modify/Delete Item</a>
                        <a href="{{action('PopularController@index')}}">Popular Burgers</a>
                        <a   href="{{action('ContentController@index')}}">Modify Content</a>
                    </div>
                    </div>
                    <div class="emp-add ">
                     <h1>Modify Items Data</h1>
                    <div class="add-item-row">
                        
                    <div class="col-25">
                       
                    </div>
                   </div>
                    
                     <div class="buy-row2" >
                    <div class="col-buytable">
                        <div class="table-responsive"> 
                        <table id= "order-buy" class="order-table table table-condensed table-borderless">
                            <thead>
                          <tr>
                            
                            <th> Image </th>
                            <th>BurgerName</th>
                            <th>Price</th>
                            <th>Calories</th>
                            <th>ingredients</th>
                            <th colspan="2"></th>
                          </tr>
                        </thead>
                            <tbody>
                                @foreach($menu as $menus)
                              <tr>
                                <td hidden>{{$menus['burgerid']}}</td>
                                <td><img src="{{URL::asset('images/'. $menus['image'])}}" width="60" height="60"></td>
                                <td>{{$menus['burgername']}}</td>
                                <td>${{$menus['price']}}</td>
                                <td>{{$menus['calories']}}Kcal</td>
                                 <td>{{$menus['ingredients']}}</td>
                                <td><a href="{{action('EmpController@edit', $menus['burgerid'])}}" class="btn btn-info">Edit</a></td>
                                <td>
                                  <form action="{{action('EmpController@destroy', $menus['burgerid'])}}" method="post">
                                    {{csrf_field()}}
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                  </form>
                                </td>
                              </tr>
                               @endforeach
                            </tbody>
                        </table> 
                          </div>                     
                    </div>
                </div>
            </div>
                    

                </div>
                
            </div>
           
            
        </div>
    </body>
</html>
