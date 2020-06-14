
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
                        <img src="{{URL::asset('images/5.png')}}" alt="logo"/>
                    </div>
                        
                </div>
                <div class="profile profilehome">
                    
                    <div class="account-options">
                         <a  href="employee">Home</a>
                        <a  href="{{action('EmpController@create')}}">Add Item</a>
                         <a  href="{{action('EmpController@createItem')}}">Modify/Delete Item</a>
                        <a class="active" href="popular">Popular Burgers</a>
                        <a   href="content">Modify Content</a>
                    </div>
                    </div>
                  <div class="emp-add">
                      <div class="edit-burger">
                    <div aligh='center' class="del-pop">
                      
                       
                       <button type="button" class="btn btn-warning"> <a align="center" href="popular/create">Delete Popular Burger</a></button>
                    </div>
                    
                   <div id="sc-edprofile">
                        <h1>Add Popular Burgers</h1>
                        <form class="sc-container" method="post" action="{{url('/popular')}}"   enctype="multipart/form-data">
                            {{csrf_field()}}
                            <p style="color:red;" id="burgernameErr"></p>
                          <label for="burgername">Burger Name:</label>
                          <input type="text" name="burgername" onchange="" placeholder="Enter Burger Name " maxlength="25"  required>
                          <p style="color:red;" id="imgError"></p>
                          <label>Select Image:</label>                  
                          <input type="file" name="image" id="image" onchange="fileExtValidation()">
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
                          <p style="color:red;" id="priceErr"></p>
                          <label>Price:</label>
                          <input  name="price" type="text" placeholder="Price" pattern='[0-9]+(\\.[0-9][0-9]?)?' title="Price format eg: 12" required>
                         <input type="submit" name="submit" value="Submit" required>
                        </form>
                  </div>
                </div>
                <br/>
               
                </div>
                
                
            </div>
            
            
        </div>
    </body>
</html>