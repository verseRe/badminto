<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Payment Summary</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <link rel="title icon" type="image/png" href="{{ asset('assets/images/bsplogo.png') }}" />
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        header {
            position: sticky;
            top: 0;
            background-color: white;
        }

        body {
            font-family: 'Nunito', sans-serif;
        }

        .logo img {
            position: absolute;
            margin-left: 25px;
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
            padding: 5px
        }

        nav a {
            width: 100px;
            display: block;
            color: black;
            text-align: center;
            padding: 20px 15px;
            text-decoration: none;
        }

        li a:hover {
            background-color: #00b9bc;
        }

        .item.buttons {
            width: auto;
            order: 1;
        }

        .button a {
            color: white;
            padding: 8px 8px;
            background: #005254;
            border-radius: 50em;
        }

        .button.secondary a {
            background: #00B9BC;
        }

        .button a:hover {
            background-color: transparent;
            color: black;
            border: 1px #006d6d solid;
        }

        th,
        td {
            text-align: left;
        }

        footer {
            text-align: left;
            padding: 30px;
            background-color: #005254;
            color: white;
        }
    </style>
</head>

<body>

    <!--Navigation bar-->
    <header>
        <div class="logo"><a href="#home"><img src="{{ asset('assets/images/bsplogo.png') }}" width="130"
                    height="70"></a></div>
        <nav>
            <ul>
                <li><a class="active" href="#home">Home</a></li>
                <li><a href="#news">News</a></li>
                <li><a href="#contact">Contact</a></li>
                <li><a href="#about">About</a></li>
                <li style="float:right" class="item button"><a href="#">Log Out</a></li>
                <li style="float:right" class="item button secondary"><a href="#">Profile</a></li>
            </ul>
        </nav>
    </header>

    <!--Payment summary-->
    <div class="container">
        <br>
        <h3 class=" text-center"><strong>Payment Summary</strong></h3><br>
        <br>
        <h4 class="text-black"><strong>User ID: {{ request()->get('userID') }}</strong></h4>
        <h4 class="text-black"><strong>Name: {{ request()->get('name') }}</strong></h4>
        <br>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Description</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>

                @if (request()->get('tournamentID') != null)
                    <tr>
                        <td>Tournament - Friendly match</td>
                        <td>RM 10.00</td>
                    </tr>
                @endif

                @if (request()->get('trainingID') != null)
                    @php
                        $trainings = \App\Models\Training::where(['trainingID' => request()->get('trainingID')])
                            ->get()
                            ->first();
                    @endphp

                    <tr>
                        <td>{{ $trainings->trainingName }}</td>
                        <td>{{ 'RM' . $trainings->trainingPrice }}</td>
                    </tr>

                    <tr>
                        <td>{{ 'Shuttle Used: ' . $trainings->shuttleUsed }}</td>
                        <td>{{ 'RM' . $trainings->shuttlePrice }}</td>
                    </tr>
                @endif




            </tbody>
        </table>
        <div class="row text-right">
            <div class="col-xs-2 col-xs-offset-8">
                <p>
                <h3><strong>Total :</strong></h3>
                </p>
            </div>
            <div class="col-xs-2">
                <h3><strong>{{ $trainings->trainingPrice + $trainings->shuttleUsed * $trainings->shuttlePrice }}</strong>
                </h3><br>
            </div>
        </div>
        <div class="container my-3">
            <div class="col-md-12 text-center">
                <input type="hidden" id="paymentSummaryData" value='@json(['userID' => request()->get('userID'), 'trainingID' => request()->get('trainingID'), 'tournamentID' => request()->get('tournamentID')])'>
                <button type=" button" class="btn btn-danger"
                    style="margin-right: 20px"><strong>Cancel</strong></button>
                <button type="button" class="btn btn-success" id="paymentSummaryBtn"><strong>Pay
                        Now</strong></button>
            </div>
        </div>
    </div>
    <br>
    <br>

    <!--footer-->
    <footer>
        <h2>Contact Info</h2>
        <img src="{{ asset('assets/images/call.png') }}" alt="" style="width:50px;height:50px;float:left;">
        <p style="margin:5px;height:32px;max-idth:100%;float:left;overflow:visible;">
            06-45567832<br>
            06-11223334</p>

        <table style="width:100%">
            <tr>
                <th style="width:70%">
                    <h2>Address</h2>
                </th>
                <th>
                    <h2>Social Media</h2>
                </th>
            </tr>
            <tr>
                <td>
                    <p>Bandar Seri Putra,<br>
                        Hulu Langat,<br>
                        Selangor</p>
                </td>
                <td>
                    <a href="#twitter"><img src="{{ asset('assets/images/twitter.png') }}" alt=""
                            style="width:50px;height:50px;float:left;"></a>
                    <a href="#facebook"><img src="{{ asset('assets/images/facebook.png') }}" alt=""
                            style="width:50px;height:50px;float:left;"></a>
                    <a href="#instagram"><img src="{{ asset('assets/images/instagram.png') }}" alt=""
                            style="width:50px;height:50px;float:left;"></a>
                </td>
            </tr>
        </table>
    </footer>
    <!-- fontawesome-->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/all.js"
        integrity="sha384-xymdQtn1n3lH2wcu0qhcdaOpQwyoarkgLVxC/wZ5q7h9gHtxICrpcaSUfygqZGOe" crossorigin="anonymous">
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
    </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('assets/js/payment/action.js') }}"></script>
</body>

</html>
