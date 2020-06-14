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
            
            <div class="hero-img">
            
             
                <div id="in_wrapper" class="navhme">
                    <div class ="logo">
                        <a href="home"><img src="{{URL::asset('images/5.png')}}" alt="logo"/></a>
                    </div>
                        <nav id="homenav">
                            <ul id="respnav" class="topnav">
                                <li><a class="active" href="home">INICIO</a></li>
                                <li><a href="sobre">SOBRE NOSOTROS</a></li>
                                <li><a href="order">ORDER ONLINE</a></li>
                                <li><a href="menu">MENU</a></li>
                                <li><a href="http://bhavanamb.uta.cloud/wordpress/">BLOG</a></li>
                                <li><a href="contact">CONTACTO</a></li>
                                <li><a href="register">REGISTRO</a></li>
                                <li><a href="userlogin">INICIAR SESION</a></li>
                                <a href="javascript:void(0);"  class="icon" onclick="myFunction()" style="color: red;">
                                        <i class="fa fa-bars"></i>
                                      </a>
                               
                            </ul>
                        </nav>
                </div>
                <div id="zigzag-border"></div>
                <div class="hero-text">
                  @if (count($errors)>0)
                            @foreach ($errors->all() as $error)
                                 <p class="alert alert-danger">{{$error}}</p>
                            @endforeach

                  @endif
                  @if(session('message')== 'Authetication Failed')
                      <div class="alert alert-danger">{{session('message')}}</div>
                  @endif
                   @if(session('Status'))
                      <div class="alert alert-success">{{session('Status')}}</div>
                  @endif
                    <p class="open-sans-font" style="color: #fff; opacity: 0.8;">LAS MEJORES DE LA CIUDAD</p>
                    <h1>Hamburguesas</h1>
                    <br>

                    <button onclick="location.href='menu'">VER MENÚ HOY</button>
                </div>
            </div>
            <div id="row2">
                <div align="center" class="burger-icon"><img src="images/Burguer.png" alt="burger1" width="40" height="40"></div>
                <h1 class="banner-title1">Nuestra historia</h1>
                <div class="sub-row2">
                    <div class="text-col txt-height">
                    {{$content['partone']}}
                    </div>
                    <div class="text-col txt-height">
                    {{$content['parttwo']}}
                    </div>
                </div>
            </div>
            <div class="row3">
               <div align="center" class="burger-icon1"><img src="images/Burguer.png" alt="burger1" width="40" height="40"></div>
                <h1 class="banner-title2">Las más vendidos</h1>
                <div class="row">
                  @foreach ($popular as $popular_i)
                  
                    <div class="col-xs-6 col-sm-3">
                      <img src="{{URL::asset('images/'. $popular_i['image'])}}" alt="burger1" width="100" height="100">
                        <p>{{$popular_i['burgertype']}}</p>
                      <div class="">${{$popular_i['price']}}</div>
                      <div class="hm-grid-btn"><a href="menu">Ordenar </a></div>
                    </div>
                  
                  @endforeach
                  
                </div> 
                <br>
                <div class="banner-butn-pop grid-btn"><button onclick="location.href='menu'">VER MENÚ HOY</button></div>
            </div>
            <div class="row4">
                <div align="center" class="burger-icon1"><img src="images/Burguer.png" alt="burger1" width="40" height="40"></div>
                <h1 class="banner-title2">Nuestro menú</h1>
                <div class="container">
                  <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#home">All</a></li>
                    <li><a data-toggle="tab" href="#menu1">Pollo</a></li>
                    <li><a data-toggle="tab" href="#menu2">Carne</a></li>
                    <li><a data-toggle="tab" href="#menu3">Mixta</a></li>
                    <li><a data-toggle="tab" href="#menu4">De Todito</a></li>
                  </ul>

                  <div class="tab-content">
                    <div id="home" class="tab-pane fade in active">
                      
                      <div class="col-sm-6">
                      <h1 align="center"></h1>
                      <table align="right" class="menu-tab .table-borderless">
                       
                        @foreach ($menu as $menus)
                        <tr>
                                 <td width="20%"><img src="{{URL::asset('images/'. $menus['image'])}}" alt="burger2.2" width="60" height="60"></td>
                                  <td width="40%">{{$menus['burgername']}}</td>
                                  <td style="color:#EF0031">${{$menus['price']}}</td>         
                        </tr>
                        @if($loop->iteration ==  round(count($menu)/2))                                                                      
                           @break
                        @endif
                      
                        @endforeach
                        </table>
                      </div>
                      <div class="col-sm-6 other">
                      <h1></h1>
                      <table align="right" class="menu-tab .table-borderless">
                        @foreach ($menu as $menus)
                          @if($loop->iteration >  round(count($menu)/2))
                          <tr>
                                   <td width="20%"><img src="{{URL::asset('images/'. $menus['image'])}}" alt="burger2.2" width="55" height="55"></td>
                                    <td width="40%">{{$menus['burgername']}}</td>
                                    <td style="color:#EF0031">${{$menus['price']}}</td>         
                          </tr>
                          @endif
                        @endforeach
                        </table>
                      </div>
                    </div>
                    <div id="menu1" class="tab-pane fade">
                      <h3>Pollo</h3>
                      <div class="col-sm-6">
                      <h1></h1>
                      <table align="right" class="menu-tab .table-borderless">
                       
                        @foreach ($polloarr as $pollos)
                          
                          <tr>
                                   <td width="20%"><img src="{{URL::asset('images/'. $pollos->image)}}" alt="burger2.2" width="60" height="60"></td>
                                    <td width="40%">{{$pollos->burgername}}</td>
                                    <td style="color:#EF0031">${{$pollos->price}}</td>         
                          </tr>
                          @if($loop->iteration ==  round(count($polloarr)/2))                                                                      
                           @break
                        @endif
                                           
                        @endforeach
                        </table>
                      </div>
                      <div class="col-sm-6 other">
                      <h1></h1>
                      <table align="right" class="menu-tab .table-borderless">
                        @foreach ($polloarr as $pollos)
                           @if($loop->iteration >  round(count($polloarr)/2))
                          <tr>
                                   <td width="20%"><img src="{{URL::asset('images/'. $pollos->image)}}" alt="burger2.2" width="60" height="60"></td>
                                    <td width="40%">{{$pollos->burgername}}</td>
                                    <td style="color:#EF0031">${{$pollos->price}}</td>         
                          </tr>
                         @endif
                                           
                        @endforeach
                        </table>
                      </div>
                    </div>
                    <div id="menu2" class="tab-pane fade">
                      <h3></h3>
                      <div class="col-sm-6">
                      <h1>Carne</h1>
                      <table align="right" class="menu-tab .table-borderless">
                       @foreach ($carnearr as $carnes)
                          
                          <tr>
                                   <td width="20%"><img src="{{URL::asset('images/'. $carnes->image)}}" alt="burger2.2" width="60" height="60"></td>
                                    <td width="40%">{{$carnes->burgername}}</td>
                                    <td style="color:#EF0031">${{$carnes->price}}</td>         
                          </tr>
                          @if($loop->iteration ==  round(count($carnearr)/2))                                                                      
                           @break
                        @endif
                                           
                        @endforeach
                        </table>
                      </div>
                      <div class="col-sm-6 other">
                      <h1></h1>
                      <table align="right" class="menu-tab .table-borderless">
                         @foreach ($carnearr as $carnes)
                           @if($loop->iteration >  round(count($carnearr)/2))
                          <tr>
                                   <td width="20%"><img src="{{URL::asset('images/'. $carnes->image)}}" alt="burger2.2" width="60" height="60"></td>
                                    <td width="40%">{{$carnes->burgername}}</td>
                                    <td style="color:#EF0031">${{$carnes->price}}</td>         
                          </tr>
                         @endif
                                           
                        @endforeach
                        </table>

                      </div>
                    </div>
                    <div id="menu3" class="tab-pane fade">
                      <h3></h3>
                      <div class="col-sm-6">
                      <h1>Mixta</h1>
                      <table align="right" class="menu-tab .table-borderless">
                       
                         @foreach ($mixtaarr as $mixtas)
                          
                          <tr>
                                   <td width="20%"><img src="{{URL::asset('images/'. $mixtas->image)}}" alt="burger2.2" width="60" height="60"></td>
                                    <td width="40%">{{$mixtas->burgername}}</td>
                                    <td style="color:#EF0031">${{$mixtas->price}}</td>         
                          </tr>
                          @if($loop->iteration ==  round(count($mixtaarr)/2))                                                                      
                           @break
                        @endif
                                           
                        @endforeach
                        </table>
                      </div>
                      <div class="col-sm-6 other">
                      <h1></h1>
                      <table align="right" class="menu-tab .table-borderless">
                         @foreach ($mixtaarr as $mixtas)
                          @if($loop->iteration >  round(count($mixtaarr)/2))
                          <tr>
                                   <td width="20%"><img src="{{URL::asset('images/'. $mixtas->image)}}" alt="burger2.2" width="60" height="60"></td>
                                    <td width="40%">{{$mixtas->burgername}}</td>
                                    <td style="color:#EF0031">${{$mixtas->price}}</td>         
                          </tr>
                          @endif
                                           
                        @endforeach
                        </table>
                      </div>
                    </div>
                    <div id="menu4" class="tab-pane fade">
                      <h3>De Toditos</h3>
                      <div class="col-sm-6">
                      <h1></h1>
                      <table align="right" class="menu-tab .table-borderless">
                       
                        @foreach ($dearr as $detos)
                          
                          <tr>
                                   <td width="20%"><img src="{{URL::asset('images/'. $detos->image)}}" alt="burger2.2" width="60" height="60"></td>
                                    <td width="40%">{{$detos->burgername}}</td>
                                    <td style="color:#EF0031">${{$detos->price}}</td>         
                          </tr>
                          @if($loop->iteration ==  round(count($dearr)/2))                                                                      
                           @break
                        @endif
                                           
                        @endforeach
                        </table>
                      </div>
                      <div class="col-sm-6 other">
                      <h1></h1>
                      <table align="right" class="menu-tab .table-borderless">
                        @foreach ($dearr as $detos)
                          @if($loop->iteration >  round(count($dearr)/2))
                         <tr>
                                   <td width="20%"><img src="{{URL::asset('images/'. $detos->image)}}" alt="burger2.2" width="60" height="60"></td>
                                    <td width="40%">{{$detos->burgername}}</td>
                                    <td style="color:#EF0031">${{$detos->price}}</td>         
                          </tr>
                          @endif
                                           
                        @endforeach
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
                  

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
                <script src="{{asset('js/ibras.js')}}"></script>
                <script src="{{asset('js/validations.js')}}"></script>
              
            </div>
        </div>
    </body>
</html>