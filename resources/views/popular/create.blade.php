
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
                         <a  href="{{action('EmpController@index')}}">Home</a>
                        <a  href="{{action('EmpController@create')}}">Add Item</a>
                         <a  href="{{action('EmpController@createItem')}}">Modify/Delete Item</a>
                        <a class="active" href="{{action('PopularController@index')}}">Popular Burgers</a>
                        <a  href="{{action('ContentController@index')}}">Modify Content</a>
                    </div>
                    </div>
                  <div class="emp-add">
                      
                <br/>
                <div class="container">
                    <h2>Delete Popular Items</h2>
                    <p></p>            
                    <table class="table order-table">
                      <thead>
                        <tr>
                          <th>Burger</th>
                          <th>Price</th>
                          <th>Burger Type</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($popular as $populars)
                        <tr>
                          
                                <td><img src="{{URL::asset('images/'. $populars['image'])}}" width="60" height="60"></td>
                                
                                <td>{{$populars['price']}}</td>
                                <td>{{$populars['burgertype']}}</td>
                                
                                <td>
                                  <form action="{{action('PopularController@destroy', $populars['id'])}}" method="post">
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
    </body>
</html>