<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choose Players</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css'>
    <link rel="stylesheet" href="../css/tour.css">

    <style>
        a {
            color: black;
        }

        .seen_1 {
            background-color: white;
        }

        .seen_0 {
            background-color: #b6cdf0;
        }

        #nott:hover {
            background-color: rgba(0, 0, 0, 0.05);
        }

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
                        <button class="btn secondary-bg-color mx-1 round-button text-white" type="submit" >Logout</button>
                    </form>
                </div>
            </div>
        </nav>
    </header>

    <section>
          <div class="d-md-flex p-2 flex-column">
              <div class="p-2"><h3 class="fw-bold">Notifications</h3></div>
              <hr>
              <div style="height: 70vh;position:relative;">
              <div style="max-height:100%; overflow:auto;">
                <div class="container-fluid">
                    @forelse($notifications as $noti)
                    @if($noti->type == 'Invite')
                    <a href="{{ route('response', ['match_id' => $noti->tournamentID, 'notification_id' => $noti->id]) }}" class="row border border-dark rounded" style="width: 90vw; margin: 10px;">
                        <div class="seen_{!! $noti->seen !!}">
                            <div id="nott" style="padding: 10px">
                                <h4>
                                    <label>{!! $noti->content !!}</label>
                                </h4>
                            </div>
                        </div>
                    </a>
                    @else
                    <a href="{{ route('view', ['match_id' => $noti->tournamentID, 'notification_id' => $noti->id]) }}" class="row border border-dark rounded" style="width: 90vw; margin: 10px">
                        <div class="seen_{!! $noti->seen !!}">
                            <div id="nott" style="padding: 10px">
                                <h4>
                                    <label>{!! $noti->content !!}</label>
                                </h4>
                            </div>
                        </div>
                    </a>
                    @endif
                    @empty
                    <div class="row border border-dark rounded" style="margin-bottom: 10px; width: 90vw">
                        <h4>
                            <label>You don't have any notifications yet...</label>
                        </h4>
                    </div>
                    @endforelse
                </div>
              </div>
            </div>
          </div>
    </section>

    <footer>
        <div class="container-fluid secondary-bg-color fixed-bottom">
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
