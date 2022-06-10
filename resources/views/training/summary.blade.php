<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Summary</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->

        <style>
            header {
                position: sticky;
                top: 0;
                background-color:white;
            }
            body {
                font-family: 'Nunito', sans-serif;
            }
            .logo img{
                position: absolute;
                margin-left:25px;
            }
            ul {
                list-style-type: none;
                margin: 0 0 0 150px;
                padding: 0;
                overflow: auto;
                background-color: white;
                }
            li {
                float: left;
                padding:5px
            }
           
            nav a {
                width:100px;
                display: block;
                color: black;
                text-align: center;
                padding: 20px 15px;
                text-decoration: none;
            }
            .tab:hover {
            border-bottom: 2px solid #00b9bc;
            }
            .item.buttons{
                width:auto;
                order:1;
            }
            .button a{
                color:white;
                padding: 8px 8px;
                background: #005254;
                border-radius:50em;
            }
            .button.secondary a{
                background: #00B9BC;
            }
            .button a:hover {
                background-color: transparent;
                color:black;
                border: 1px #006d6d solid;
            }
            .container{
                border: 1px outset black;
                padding: 20px;
                margin: 50px;
            }
            .btn {
                display: inline-block;
                text-align: center;
                color: white;
                padding: 14px 28px;
                font-size: 16px;
                cursor: pointer;
                border-radius: 5px;
                position: static;
                right: 10px;
                top: 35px;
                margin-left:1400px;
                margin-bottom:10px;
            }
            .view:hover {
                border-color: #007C7D;
                background-color: transparent;
                color: #007C7D;
            }

            .view {
                background-color: #007C7D;
                color: white;
            }


            footer {
                text-align: left;
                padding: 30px;
                background-color: #005254;
                color: white;
            }
        </style>
    </head>
    <header>
        <div class="logo"><a href="#home"><img src="{{URL::asset("assets/bsplogo.png")}}" width="130" height="70"></a></div>
        <nav>
            <ul>
                <li><a class="tab" href="#home">Home</a></li>
                <li><a class="tab" href="#about">About</a></li>
                <li><a class="tab" href="#tournament">Tournaments</a></li>
                <li><a class="tab" href="#training">Training</a></li>
                <li><a class="tab" href="#payment">Payment</a></li>
                <li style="float:right" class="item button"><a href="#">Log Out</a></li>
                <li style="float:right" class="item button secondary"><a href="#">Profile</a></li>
            </ul>
            
        </nav>
    </header>
    <body> 
        <div class="container">  
            <h1>Summary for Training {{$training->trainingName}}</h1>
                            <em class="text-md text-gray-600">Created at {{$training->created_at}}. Updated_at {{$training->updated_at}}.</em>
                            <p>{{$training->trainingVenue}}<br>
                            {{$training->trainingCapacity}} persons capacity<br>
                            RM {{$training->trainingPrice}} / person<br>
                            RM {{$training->shuttlePrice}} / shuttle<br>
                            at {{$training->trainingDate}}
                            <button class="btn view" onclick="">Pay Now</button></p>
        </div> 
        <footer>
            <h2>Contact Info</h2>
            
            <img src="{{URL::asset("assets/call.png")}}" alt="" style="width:50px;height:50px;float:left;">
            <p style="margin:5px;height:32px;max-idth:100%;float:left;overflow:visible;">
            06-45567832<br>
            06-11223334</p>
    
            <table style="width:100%">
                <tr>
                    <th style="width:70%"><h2>Address</h2></th>
                    <th><h2>Social Media</h2></th>
                </tr>
                <tr>
                    <td><p>Bandar Seri Putra,<br>
                    Hulu Langat,<br>
                    Selangor</p></td>
                    <td>
                        <a href=""><img src="{{URL::asset("assets/twitter.png")}}" alt="" style="width:50px;height:50px;float:left;"></a>
                        <a href=""><img src="{{URL::asset("assets/facebook.png")}}" alt="" style="width:50px;height:50px;float:left;"></a>
                        <a href=""><img src="{{URL::asset("assets/instagram.png")}}" alt="" style="width:50px;height:50px;float:left;"></a>
                    </td>
                </tr>
            </table>
            
        </footer>
    </body>
</html>
