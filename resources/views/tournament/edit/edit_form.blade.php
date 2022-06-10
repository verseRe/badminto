<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Tournament Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css'>
    <link rel="stylesheet" href="{{ URL::asset('css/tour.css'); }}">

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

                    <div class="dropdown" id="displayNotification" tabindex="-1" aria-labelledby="displayNotifiationLabel" aria-hidden="true">
                      <a class="notification" href="#" id="noti">
                      </a>
                      <div class="dropdown-content">

                      </div>
                    </div>

                    <form class="d-flex" role="search">
                      <button class="btn main-bg-color mx-1 round-button text-white" id= "profile"type="submit">Profile</button>
                      <button class="btn secondary-bg-color mx-1 round-button text-white" type="submit" >Logout</button>
                    </form>
                </div>
            </div>
        </nav>
    </header>


    <section>
        <form method="POST" action="" enctype="multipart/form-data">
        @csrf
        @if($tournament->match_type =='Friendly')
        <div class="d-md-flex p-2 flex-column justify-content-start align-items-start" style="margin-left: 50px">
              <div class="p-2"><h3 class="fw-bold">Enter Tournament Details</h3></div>
              <input type="hidden" name="match_type" value="Friendly">

              <div class="p-2"><label for="matchName">Match Name:</label></div>
              <div class="p-2 "><input type="text" style="width: 80vw" name="match_name" value="{!! $tournament->match_name !!}"></div>
              <div class="p-2"><label for="matchVenue">Match Venue:</label></div>
              <div class="p-2"><input type="text" style="width: 80vw" name="match_venue" value="{!! $tournament->match_venue !!}"></div>
              <div class="container-fluid">
                  <div class="d-flex p-3 flex-row justify-content-start">
                      <div class="d-flex flex-column mx-4">
                          <label for="matchEDate">Match Start Date:</label>
                          <input type="date" name="match_start_date" class="my-2" value="{!! $tournament->match_start_date !!}">
                          <label for="matchSDate" style="margin-top: 20px">Match End Date:</label>
                          <input type="date" name="match_end_date" class="my-2" value="{!! $tournament->match_end_date !!}">
                      </div>
                      <div class="d-flex flex-column mx-4">
                          <label for="matchTime">Match Time:</label>
                          <input type="time" name="match_time" class="my-2" value="{!! $tournament->match_start_time !!}">
                      </div>
                      <div class="d-flex flex-column mx-4">
                          <label for="chatLink">Chat link:</label>
                          <input type="text" size="40" name="chat_link" value="{!! $tournament->chat_url !!}">
                      </div>
                  </div>
              </div>
              <div class="container">
                  <div class="d-flex p-2 justify-content-end mx-4">
                      <input type="button" onclick="history.back()" value="Cancel"></input>
                      <input type="button" data-bs-toggle="modal" data-bs-target="#confirmEndMatchModal" value="Close Match"></input>
                      <input type="submit" value="Choose players"></input>
                  </div>
              </div>
          </div>

        @else
        <div class="d-md-flex p-2 flex-column justify-content-start align-items-start" style="margin-left: 50px">
              <div class="p-2"><h3 class="fw-bold">Enter Tournament Details</h3></div>

              <div class="p-2"><label for="matchName">Match Name:</label></div>
              <div class="p-2 "><input type="text" style="width: 80vw" name="match_name" value="{!! $tournament->match_name !!}"></div>
              <div class="p-2"><label for="matchVenue">Match Venue:</label></div>
              <div class="p-2"><input type="text" style="width: 80vw" name="match_venue" value="{!! $tournament->match_venue !!}"></div>
              <div class="container-fluid">
                  <div class="d-flex p-3 flex-row justify-content-start">
                      <div class="d-flex flex-column mx-4">
                          <label for="matchEDate">Match Start Date:</label>
                          <input type="date" name="match_start_date" class="my-2" value="{!! $tournament->match_start_date !!}">
                          <label for="matchSDate" style="margin-top: 20px">Match End Date:</label>
                          <input type="date" name="match_end_date" class="my-2" value="{!! $tournament->match_end_date !!}">
                      </div>
                      <div class="d-flex flex-column mx-4">
                          <label for="matchTime">Match Time:</label>
                          <input type="time" name="match_time" class="my-2" value="{!! $tournament->match_start_time !!}">
                      </div>
                      <div class="d-flex flex-column mx-4">
                          <label for="matchFee">Match Fee:</label>
                          <input type="text" name="match_fee" class="my-2" value="{!! $tournament->match_fee !!}" >
                          <label for="bannerImage" class="my-2">Banner Image:</label>
                          <input type="file" name="banner_image" class="my-2">
                      </div>
                  </div>
              </div>
              <div class="container">
                  <div class="d-flex p-2 justify-content-end mx-4">
                      <input type="button" onclick="window.location.href='index.php';" value="Cancel"></input>
                      <input type="button" data-bs-toggle="modal" data-bs-target="#confirmEndMatchModal" value="Close Match"></input>
                      <input type="submit" value="Submit"></input>
                  </div>
              </div>
          </div>
          
          <div class="modal fade" id="confirmDetailsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content" style="margin-top: 200px">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Confirm Details</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">Confirm match details ?</div>
                <div class="modal-footer">
                    <button type="button" class="btn grey-bg-color text-white" data-bs-dismiss="modal">No</button>
                    <input type="submit" class="btn secondary-bg-color text-white" data-bs-dismiss="modal" value="Yes"></input>
                </div>
            </div>
        </div>
    </div>
        @endif

        </form>

        <div class="modal fade" id="confirmEndMatchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content" style="margin-top: 200px">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Confirm end the match?</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        This action cannot be undone!
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-bs-dismiss="modal">No</button>
                        <form method="POST" action="{{url('close_form')}}">
                            @csrf
                            <input type="hidden" name="match_id" value="{!! $tournament->id !!}">
                            <input type="submit" data-bs-dismiss="modal" value="Yes"></input>
                        </form>
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
