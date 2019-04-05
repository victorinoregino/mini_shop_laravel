<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <style>
        .parallax1 {
          /* The image used */
          background-image: url("/images/abstract.jpg");

          /* Set a specific height */
          min-height: 100vh; 

          /* Create the parallax scrolling effect */
          background-attachment: fixed;
          background-position: center;
          background-repeat: no-repeat;
          background-size: cover;
          padding:0px;
          margin:0px;
        }
        .parallax2 {
          /* The image used */
          background-image: url("/images/abstract2.jpeg");

          /* Create the parallax scrolling effect */
          background-attachment: fixed;
          background-position: center;
          background-repeat: no-repeat;
          background-size: cover;
          padding:0px;
          margin:0px;
        }
        body {
            padding: 0px;
            margin: 0px;
        }
        .no-spinners::-webkit-outer-spin-button,
        .no-spinners::-webkit-inner-spin-button {
          -webkit-appearance: none;
          margin: 0;
        }
        </style>
    </head>
    <body>
        <div class="parallax1">
            <div style="position: relative;width:100%;">
                @auth
                    <a href="{{ url('/home') }}" style="float: right;font-size: 30px;margin-right: 20px;color:white"><b>Proceed to Cart</b>
                    </a>
                @else
                    <a href="{{ route('login') }}">Login</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            </div>
            <center>
                <span style="font-size: 50px;line-height: 100vh;"><b>SHOP NOW!</b></span>
            </center>
        </div>

        <div style="height:250px;background-color:#9E9E9E;padding: 20px; font-size: 25px">
            <span style="font-size: 30px;"><b>About Us:</b></span> <br><br>
            <center>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </center>
        </div>
        <div class="parallax2" style="padding: 30px 15px;">
            <div style="position: relative;width:100%;">
                <span style="font-size: 30px;">
                    Products:
                </span>
                <center>
                    <table>
                        <tr>
                            @foreach($products as $product)
                            <td style="border: 1px solid gray;padding: 10px 20px">
                                <img src="{{ $product->img_path }}" alt="Smiley face" width="200" height="200"><br>
                                <center>
                                    <span>{{ $product->name }}</span>
                                </center>
                                @auth
                                    <center>
                                        <form method="post" action="{{ route('add.product','productID='.$product->id)}}">
                                            @csrf
                                            <button type="button" onclick="minusQty({{ $product }})">
                                                <span class="glyphicon glyphicon-minus"></span>
                                            </button>
                                            <input type="number" name="product{{ $product->id }}" id="product{{ $product->id }}" min="1" max="{{ $product->qty }}" value="0" style="text-align: center;" class="no-spinners">
                                            <button type="button" onclick="addQty({{ $product }})">
                                                <span class="glyphicon glyphicon-plus"></span>
                                            </button><br><br>
                                            <button type="submit" class="btn btn-primary">Add to Cart</button>
                                        </form>
                                    </center>
                                @endauth
                            </td>
                            @endforeach
                        </tr>
                    </table>
                </center>
            </div>
        </div>

        <div style="height:300px;background-color:#EEEEEE;padding: 20px;">
            <center>
                <span style="font-size: 35px;"><b>Contact Us:</b></span><br>
                <div class="row" style="position:relative;width:350px;">
                    <input type="text" placeholder="Your name..." class="form-control" style="margin:10px 0px">
                    <input type="text" placeholder="Your email address..." class="form-control" style="margin:10px 0px">
                    <textarea placeholder="Comment and feedback..." class="form-control" style="margin:10px 0px" rows="5"></textarea>
                </div>                
            </center>
        </div>
        <div style="height:50px;background-color:#616161; color: white">
            <center>
                <span style="color:red;line-height: 50px;font-size: 20px;"></span>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod"
            </center>
        </div>
        <div style="height:30px;background-color:#212121;color:#BDBDBD">
            <center>
                <span style="line-height: 30px;font-size: 10px;">Copyright © 2019 The Mini Shop | All Rights Reserved</span>
            </center>
        </div>
    </body>
    <script type="text/javascript">
        function minusQty(prdct){
            var prdctQty = document.getElementById('product'+prdct['id']).value;
            if (prdctQty > 0){
             document.getElementById('product'+prdct['id']).value--;
            }
        }

        function addQty(prdct){
            var prdctQty = document.getElementById('product'+prdct['id']).value;
            if (prdctQty < prdct['qty']){
             document.getElementById('product'+prdct['id']).value++;
            }
        }
    </script>
</html>
