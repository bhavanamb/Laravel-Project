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
            <div class="afterlgn bg-after">
                <div id="in_wrapper" class="navhme">
                    <div class ="logo">
                       <a href="home"><img src="{{URL::asset('images/5.png')}}" alt="logo"/></a>
                    </div>
                        <nav id="respnav" class="topnav">
                            <ul>
                                <li><a href="home">INICIO</a></li>
                                <li><a href="sobre">SOBRE NOSOTROS</a></li>
                                <li><a href="order">ORDER ONLINE</a></li>
                                <li><a href="menu">MENU</a></li>
                                <li><a href="http://bhavanamb.uta.cloud/wordpress/">BLOG</a></li>
                                <li><a href="contact">CONTACTO</a></li>
                                <li><a href="/logout">LOGOUT</a></li>
                                <a href="javascript:void(0);"  class="icon" onclick="myFunction()" style="color: red;">
                                        <i class="fa fa-bars"></i>
                                      </a>
                            </ul>
                        </nav>
                </div>
                
                <div class="profile profilehome">
                    @if (\Session::has('success'))
                  <div class="alert alert-success">
                      {{ \Session::get('success') }}
                  </div><br />
                  @endif
                     @if(session('Status'))
            
                    <div class="alert alert-success">{{session('Status')}}</div>
                     
                  @endif
                    <br>
                    <h1>Welcome {{$user->name}} !</h1>
                    <br>
                    <div class="account-options">
                        <a class="active" href="customer">Home</a> 
                        <a href="{{action('CustomerController@edit',$user->id)}}">Edit Profile</a>                       
                        <a href="{{action('CustomerController@show',$user->id)}}">Address</a>
                        <a href="/review">Add Review</a>
                    </div>
                    <br>
                    <br>
                      
                      
                    <div class="profile-button">
                        <button onclick="location.href='order'">VER MENÚ HOY</button>
                    </div>
                    <br>
                
            </div>
            <div class="row5">
                <div class="footer-logoimg"><img src="images/5.png" alt="logo"/>
                    <p class="title-text">Habla a:</p> 
                    <p>Av. Intercomunal, sector la Mora, calle 8</p>
                    <br/>
                    <p class="title-text">Telefono:</p>
                    <p>+58 251 261 00 01</p>
                    <br/>
                    <p class="title-text">Correo:</p>
                    <p>yourmail@gmail.com</p>
                </div>
                <div align="center" class="social-media-div">
                    <ul>
                        <li><a href="https://www.facebook.com/" class="social-icon" target="_blank">
                                <i class="fa fa-facebook"></i></a></li>
                        <li><a href="https://twitter.com/" class="social-icon" target="_blank"> 
                                <i class="fa fa-twitter"></i></a></li>
                        <li><a href="https://www.youtube.com/" class="social-icon" target="_blank"> 
                                <i class="fa fa-youtube"></i></a></li>
                        <li><a href="https://www.linkedIn.com/" class="social-icon" target="_blank"> 
                                <i class="fa fa-linkedin"></i></a></li>
                        <li><a href="https://www.pinterest.com/" class="social-icon" target="_blank"> 
                                <i class="fa fa-pinterest"></i></a></li>
                        <li><a href="https://www.instagram.com/" class="social-icon" target="_blank"> 
                                <i class="fa fa-instagram"></i></a></li>
                    </ul>                    
                </div>
                <footer>
                    <div id="footer"><i>Copyright&copy;2020 Todos los derachos reservados| Este sitio esta hecho con &hearts; por DiazApps</i></div>
                </footer>
                <script src="js/ibras.js"></script>
                <script src="js/validations.js"></script>
            </div>
            
        </div>
    </body>
</html>
