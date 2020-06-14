<?php
session_start();

//unset($_SESSION['error']);
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
            <div class="onlinebuy-heroimg">
                <!-- popup content for registration - start --> 
                <div align="center" id="myModal" class="modal">
                     <form class="r-form" method="post" action="SaveUserDetails.php" onsubmit="return validateRegForm(this)">
                        <span class="close">&times;</span>
                        <h1><img src="images/Burguer.png" alt="burger1" width="40" height="40">Registro de Usuario</h1>
                        <p style="color:red;" id="txtHint"></p>
                         <label class="" for="username">Nombre y apellido</label><br>
                         <input type="text" name="username" onchange="checkIfExists(this.value)" required><br>  
                         <span style="color:red;" id="errEmail"></span><br>
                         <label for="email">Correo</label><br> 
                         <input type="email" id="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Invalid Email address. eg: abcd@some.domain" onchange="emailValidations(this.value)"><br> 
                         <label for="pwd">Contresena</label><br> 
                         <input type="password" id="registerpwd" name="pwd" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^\w]).{8,10}" title="Must contain at least one number and special character and one uppercase and lowercase letter, and between 8 to 10 characters" onchange="pwdValidations(this.value)" required><br>
                         <p style="color:red;" id="errorPwd"></p>
                         <label for="confirmPwd">Repetir Contresena</label><br>
                         <input type="password" name="confirmPwd" required><br> 
                            <p style="color:red;" id="err"></p>
                         <label for="address">Direccion</label><br>
                         <input type="address" name="address" style="height:100px;"><br>
                         <button type="submit">Cargar</button>
                    </form>
                </div>
                <!registration end>
                <!login popup start>
                <div align="center" id="loginModal" class="modal">
                    <form class="r-form login-form" action="login.php" method="post" onsubmit="return loginValidate(this)">
                        <span onclick="document.getElementById('loginModal').style.display='none'" class="closelogin close-top-right">&times;</span>
                        <h1><img src="images/Burguer.png" alt="burger1" width="40" height="40">Iniciar Sesion</h1>
                        <label class="" for="email">Usuario</label><br>
                         &nbsp;&nbsp;<input style=" width: 96%;" type="text" name="username" required><br><br>
                         <p style="color:red;" id="errorPwd"></p>
                         <label for="psw">Contrasena</label><br> 
                         &nbsp;&nbsp;<input type="password" name="pwd" required><br><br>
                         <button onclick="" type="submit">Entrar</button>
                    </form>                    
                </div>
                <!login end>
                <div id="in_wrapper" class="navhme">
                    <div class ="logo">
                        <a href="home"><img src="images/5.png" alt="logo"/></a>
                    </div>
                        <nav id="homenav">
                            <ul id="respnav" class="topnav">
                                <li><a href="home">INICIO</a></li>
                                <li><a href="sobre">SOBRE NOSOTROS</a></li>
                                <li><a class="active" href="order">ORDER ONLINE</a></li>
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
                <div class="online-header">
                    <h1 align="center">Menú</h1>
                </div>
                <span id="success"></span>
            </div> 
            <div class="cart-row1">
                 <p style="color:red;" id="txtHint"></p>
                <div class="buy-row2" >
                    <div class="col-buytable">
                        <div class="table-responsive">
                        <table id= "order-buy" class="order-table table">
                            <thead>
                          <tr>
                            
                            <th> Image </th>
                            <th>BurgerName</th>
                            <th>Price</th>
                            
                            <th></th>
                            <th colspan="2"></th>
                          </tr>
                        </thead>
                            <tbody>
                                @foreach($menu as $menus)
                              <tr class="shop-item">
                                <td class="hidden menu-itemId">{{$menus['burgerid']}}</td>
                                <td><img class="shop-item-image" src="{{URL::asset('images/'. $menus['image'])}}" width="40" height="40"></td>
                                <td class="shop-item-title">{{$menus['burgername']}}</td>
                                <td class="shop-item-price">{{$menus['price']}}</td>
                                 <td hidden class="menu-itemType">{{$menus['burgername']}}</td>
                                <td width="30%"><button class="btn btn-primary shop-item-button add-itm" type="button">ADD </button></td>
                                
                              </tr>
                               @endforeach
                            </tbody>
                        </table> 
                        </div>
                    </div>
                    
                </div>
                <br><br>
                <h1 align='center' style='color:white;'>CART</h1>
                  <div class="cart-row">
                    
                <span class="cart-item cart-header cart-column">ITEM</span>
                <span class="cart-price cart-header cart-column">PRICE</span>
                <span class="cart-quantity cart-header cart-column">QTY</span>
            </div>
                <form method="post"  onsubmit="">
                <div class="cart-items">
                    
                    
                </div>
                <br>
                    <div class="cart-total">
                        <strong class="cart-total-title">Total</strong>
                        <span class="cart-total-price">$0</span>
                    </div>
                    <br>
                    <button onclick="purchaseClicked();" type="button" class="btn btn-primary btn-purchase add-itm order-button"  >ORDER</button>
                    <br>
                    </form>
            </div>
            <div class="row5" id="borderimg1">
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
