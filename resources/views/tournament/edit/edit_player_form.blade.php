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
		<script src="jquery-3.6.0.min.js"></script>

		<style>
		option.accept {
			background-color: #66ff8f;
		}
		option.reject {
			background-color: #ff6666;
		}
		option.pending {
			background-color: #ffff66;
		}

    .checkbox {
        width: 1em;
        height: 1em;
        border-radius: 50%;
        vertical-align: middle;
        border: 2px solid #888;
        appearance: none;
        -webkit-appearance: none;
        outline: none;
        cursor: pointer;
    }

    .checkbox:checked {
        background-color: dodgerblue;
    }

    .statusLabel-Accept {
      width: 0.6em;
      height: 0.6em;
      vertical-align: middle;
      border-radius: 50%;
      background-color: #66ff8f;
    }

    .statusLabel-Reject {
      width: 0.6em;
      height: 0.6em;
      vertical-align: middle;
      border-radius: 50%;
      background-color: #ff6666;
    }

    .statusLabel-Pending {
      width: 0.6em;
      height: 0.6em;
      vertical-align: middle;
      border-radius: 50%;
      background-color: #ffff66;
    }

    .status-popup {
    position: relative;
    display: inline-block;
    }

    .status-popup .status-popup-text {
    visibility: hidden;
    width: 120px;
    background-color: black;
    color: #fff;
    text-align: center;
    font-size: 15px;
    border-radius: 6px;
    padding: 4px 0;
    position: absolute;
    z-index: 1;
    top: 5px;
    left: 130%;
    }

    .status-popup .status-popup-text::after {
    content: "";
    position: absolute;
    top: 50%;
    right: 100%;
    margin-top: -5px;
    border-width: 5px;
    border-style: solid;
    border-color: transparent black transparent transparent;
    }
    .status-popup:hover .status-popup-text {
    visibility: visible;
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
        <form method="POST" action="{{url('edit_player_form')}}">
        @csrf
        <input type="hidden" name="match_id" value="{!! $match_id !!}"></input>
          <div class="d-md-flex p-2 flex-column justify-content-start align-items-start" style="margin-left: 50px">
          
              <div class="p-2"><h3 class="fw-bold">List of already invited players</h3></div>
              <div class="container-fluid">
                @forelse($inv_player as $participant)
                <div class="row border border-dark rounded" style="margin-bottom: 10px; width: 90vw">
                    <div class="col-md-4">
                        <h4>
                            <label>{!! $participant->name !!}</label>
                            <div class="status-popup">
                                <label class="statusLabel-{!! $participant->acceptStatus !!}"><span class="status-popup-text">{!! $participant->acceptStatus !!}</span></label>
                            </div>
                        </h4>
                    </div>
                </div>
                @empty
                <div class="row border border-dark rounded" style="margin-bottom: 10px; width: 90vw">
                    <div class="col-md-4">
                        <h4>
                            <label>No one is invited yet</label>
                        </h4>
                    </div>
                </div>
                @endforelse

                <div class="p-2"><h3 class="fw-bold">Select players to invite</h3></div>
                @forelse($uinv_player as $player)
                <div class="row border border-dark rounded" style="margin-bottom: 10px; width: 90vw">
                    <div class="col-md-4">
                        <h4>
                            <label>{!! $player->name !!}</label>
                        </h4>
                    </div>
                    <div class="col-md-4 offset-md-4 d-flex justify-content-end align-items-center">
                        <input type="checkbox" class="checkbox" name="newPlayerList[]" value="{!! $player->userID !!}" multiple data-mdb-filter="true"></input>
                    </div>
                </div>
                @empty
                @endforelse

              </div>

			<!-- Modal -->
              <div class="container">
                  <div class="d-flex p-2 justify-content-end mx-4">
                      <input type="button" onclick="history.back()" value="Back"></input>
                      <button type="button" data-bs-toggle="modal" data-bs-target="#confirmDetailsModal">Submit</button>
                      <!-- Modal -->
                      <div class="modal fade" id="confirmDetailsModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                      aria-hidden="true">
                      <div class="modal-dialog">
                          <div class="modal-content" style="margin-top: 200px">
                              <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Confirm Details</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal"
                                      aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                  Confirm match details ?
                              </div>
                              <div class="modal-footer">
                                  <button type="button" data-bs-dismiss="modal">No</button>
                                  <input type="submit" data-bs-dismiss="modal" value="Yes"></input>
                              </div>
                          </div>
                      </div>
                      </div>
                  </div>
              </div>
          </div>
        </form>
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
