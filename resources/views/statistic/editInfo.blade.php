<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Info</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="title icon" type="image/png" href="images/title-img.png" />

    <style>
        .navbar {
            overflow: hidden;
            position: fixed;
            top: 0;
            width: 100%;
        }

        .footer {
            padding-left: 30px;
            padding-right: 30px;
            padding-top: 30px;
            padding-bottom: 30px;

        }

        a:link {
            color: black;

        }

        .navbar-nav>li {
            padding-left: 30px;
            padding-right: 30px;
        }

        .text {
            color: #005254;
        }

        .box {
            height: 200px;
            width: 500px;
        }



        .main {
            padding: 16px;
            margin-top: 30px;
        }

        .button {
            border: none;
            color: white;
            padding: 6px 10px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 12px;
            cursor: pointer;
            border-radius: 10px;
        }

        .button1 {
            background-color: #00B9BC;
        }

        /* Green */
        .button2 {
            background-color: #005254;
        }

        /* Blue */

        .buttonsave {
            background-color: #005254;
            padding: 12px 18px;
            font-size: 16px;

        }
    </style>
</head>

<body>

    <!--Navigation bar-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top py-lg-0">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">
                    <img src="/images/badminton.png" height="30" width="60">
                </a>
            </div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="#"><strong>Home</strong></a></li>
                <li class="active"><a href="#"><strong>About Us</strong></a></li>
                <li class="active"><a href="#"><strong>Tournaments</strong></a></li>
                <li class="active"><a href="#"><strong>Training rooms</strong></a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><button class="button button1">Profile</button>
                <li><button class="button button2">Logout</button>
            </ul>
        </div>
    </nav>

    <!--Edit Information-->
    <div class="main">
        <div class="container">
            <br>
            <form method="POST" action="/clubinfo/{{ $clubinfo->id }}" enctype="multipart/form-data">

                @method('PUT')
                @csrf

                <h3 class=" text-center"><strong>EDIT DASHBOARD</strong></h3><br>
                <br>
                <h5 class="text"><strong>TITLE</strong></h5>
                <input id="title" name="title" style="width: 500px;" value="{{ $clubinfo->title }}">
                <br>
                <br>
                <h5 class="text"><strong>DESCRIPTION</strong></h5>
                <textarea id="desc" name="desc" style="width: 500px;">{{ $clubinfo->desc }}</textarea>
                <br>
                <br>
                <h5 class="text"><strong>BANNER PICTURE</strong></h5>
                @php
                    echo asset($clubinfo->headerImageUrl);
                @endphp
                <img src="{{ asset($clubinfo->headerImageUrl) }}" class="img-thumbnail">
                <input type="file" class="form-control" required name="headerImageUrl">

                <br>

                <!-- Button trigger modal -->
                <div class="container my-3">
                    <div class="col-md-12 text-center">
                        <button type="button" class="button buttonsave" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">Update</button>
                    </div>
                </div>

                <!-- Start Add Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Club Information</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                ARE YOU SURE TO SAVE THIS INFORMATION?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Add Modal-->
            </form>

        </div>
        <br>
        <br>

        <!--footer-->
        <footer style="background-color: #107067">
            <div class="container footer">
                <div class="row ">
                    <div class="col-md-4 text-center text-md-left ">

                        <div class="py-0">
                            <h3 class="text-white"> <i class="fa fa-phone  mx-2 "></i><span class="my-4 text-white">
                                    <strong>Contact Info</strong></span></h3>
                            <br>
                            <p class="text-white"> 06-45567823</p>
                            <p class="text-white"> 06-11223334</p>
                            <br>
                            <br>
                            <h3 class="text-white"> <i class="fa fa-map-marker mx-2 "></i><span
                                    class="my-4 text-white">
                                    <strong>Address</strong></span></h3>
                            <br>
                            <p class="text-white"> Bandar Seri Putra, </p>
                            <p class="text-white"> Hulu Langat, </p>
                            <p class="text-white"> Selangor </p>
                        </div>
                    </div>

                    <div class="col-md-4 text-white text-center text-md-left ">
                        <div class="py-2 my-4">
                            <div></div>
                        </div>
                    </div>

                    <div class="col-md-4 text-white my-4 text-center text-md-left ">
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <h3><span class=" font-weight-bold ">Social Media</span></h3>
                        <div class="py-2">
                            <a href="#"><i class="fab fa-twitter fa-2x text-light mx-3"></i></a>
                            <a href="#"><i class="fab fa-facebook fa-2x text-light mx-3"></i></a>
                            <a href="#"><i class="fab fa-instagram fa-2x text-light mx-3"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
                integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
        </script>

        <!-- fontawesome-->
        <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/all.js"
                integrity="sha384-xymdQtn1n3lH2wcu0qhcdaOpQwyoarkgLVxC/wZ5q7h9gHtxICrpcaSUfygqZGOe" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
        </script>
</body>

</html>
