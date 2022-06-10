<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Tournament</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="tour.css">
    <style>

    </style>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg ">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Navbar</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Tournament</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Training Rooms</a>
                        </li>
                    </ul>
                    <form class="d-flex" role="search">
                        <button class="btn main-bg-color mx-1 round-button text-white" id= "profile"type="submit">Profile</button>
                        <button class="btn secondary-bg-color mx-1 round-button text-white" type="submit">Logout</button>
                    </form>
                </div>
            </div>
        </nav>
    </header>

    <section>
        <div class="d-flex p-2 flex-column justify-content-center align-items-center">
                    <h2 style="margin: 30px">Choose Event</h2>
                    <form method="GET" action="{{url('edit_result_form')}}">
					@csrf
                      <div class="d-flex p-2 flex-row">
                          <div class="dropdown">
                            <label for="MatchName" style="margin-bottom: 5px">Match name: </label>
                            <br>
                            <select name="match_id" style="width: 800px; height: 40px">

								<optgroup label="3rd Party">
								@forelse($tp_tournaments as $tournament)
								<option value="{!! $tournament->id !!}">{!! $tournament->match_name !!}</option>
								@empty
								<option value=null disabled>There is no finished match currently</option>
								@endforelse

								<optgroup label="Internal">
								@forelse($int_tournaments as $tournament)
								<option value="{!! $tournament->id !!}">{!! $tournament->match_name !!}</option>
								@empty
								<option value=null disabled>There is no finished match currently</option>
								@endforelse

                            </select>
                          </div>
                      </div>
                      <div style="margin-top: 30px; float: right">
                          <input type="button" class="btn btn-light mx-2 my-1" value="Cancel" onClick="window.location.href='../';"></input>
                          <input type="submit" value="Edit" class="btn main-bg-color mx-2 my-1"></input>
                      </div>
                    </form>
        </div>
    </section>

    <footer>
        <div class="container-fluid secondary-bg-color">
            <div class="row align-items-start py-2">
                <div class="col">
                    <h4 class="text-white">Contact Info</h4>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>

</body>
</html>