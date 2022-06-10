<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Attendance</title>

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
                padding: 10px 24px;
                font-size: 16px;
                cursor: pointer;
                border-radius: 5px;
                position: static;
                right: 10px;
                top: 35px;
                margin-right:24px;
                margin-left:1400px;
                margin-bottom:10px;
                border: round;
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

            .cancel {
                background-color: #D3D3D3;
                color: white;
            }

            .cancel:hover {
                background-color: red;
                color: white;
            }


            footer {
                text-align: left;
                padding: 30px;
                background-color: #005254;
                color: white;
            }

            .grid-container1 {
                display: grid;
                grid-template-columns: auto auto auto auto;
                grid-gap: 10px;
                padding: 2px;
            }

            .grid-container2 {
                display: grid;
                grid-template-columns: 50% auto;
                grid-gap: 10px;
                padding: 2px;
            }

            .grid-container1 > div {
                background-color: rgba(255, 255, 255, 255);
                text-align: left;
            }

            .grid-container2 > div {
                background-color: rgba(255, 255, 255, 255);
                text-align: left;
            }

            .button-grid {
                display: grid;
                grid-template-columns: auto auto auto auto;
                grid-gap: 10px;
                padding: 2px;
            }

            .button-grid > div {
                background-color: rgba(255, 255, 255, 255);
                text-align: left;
                padding: 20px 0;
            }
        </style>
    </head>

    <!-- Header -->
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
    <!-- End of Header -->
    
    <body> 
        <div class="container">  
            <h1>Record Attendance</h1>
                            Training Session Name: <br><form><input type="text" style="font-weight: bold; width: 99%; padding: 5px;" id="trainingName" name="trainingName" value="{{$training->trainingName}}" readonly></form><br>
                            Venue: <br><form><input type="text" style="font-weight: bold; width: 99%; padding: 5px;" id="trainingVenue" name="trainingVenue" value="{{$training->trainingVenue}}" readonly></form>
                            <p><div class="grid-container1">
                                <div class="item1">Training Date: <br><form><input type="text" style="font-weight: bold; padding: 5px;" id="trainingDate" name="trainingDate" value="{{$training->trainingDate}}" readonly></form></div>
                                <div class="item2">Start Time: <br><form><input type="text" style="font-weight: bold; padding: 5px;" id="trainingTime" name="trainingTime" value="{{$training->trainingTime}}" readonly></form></div>
                                <div class="item3">End Time: <br><form><input type="text" style="font-weight: bold; padding: 5px;" id="trainingEndTime" name="trainingEndTime" value="{{$training->trainingEndTime}}" readonly></form></div>  
                                <div class="item4">Training Fee (RM): <br><form><input type="text" style="font-weight: bold; padding: 5px;" id="trainingPrice" name="trainingPrice" value="{{$training->trainingPrice}}" readonly></form></div>
                                
                            </div></p>
                            <p><div class="grid-container2">
                                <div class="item1">List of Players: <br><form><input type="checkbox" style="width: 99%; padding: 5px;" id="playerList" name="playerList" value="Attend"><label for="playerList"> Abdul Hakam bin Adli</label><br></form></div>
                                
                                <div class="item2">Total Shuttlecocks Used: <br><form><input type="number" style="font-weight: normal; padding: 5px;" id="totalShuttlecocks" name="totalShuttlecocks" value="" min="0" placeholder="0"></form></div>
                            </div></p>
                                <button class="btn cancel" onclick="">Cancel</button>
                                <button class="btn view" onclick="">Save</button>
                            </p>
        </div>

        <!-- Footer -->
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
