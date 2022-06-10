<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choose Players</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

		<style>
        tr:nth-child(even) {
        background-color: #e8e8e8;
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
        <form method="POST" enctype="multipart/form-data">
        @csrf
          <div class="d-md-flex p-2 flex-column justify-content-start align-items-start" style="margin-left: 50px">
              <div class="p-2"><h3 class="fw-bold">Set Position for Each Player</h3></div>

              <input type="hidden" name="match_id" value="{!! $_GET['match_id'] !!}">
              <table style="width: 85vw">
                <tr style="font-size: 20px">
                  <th style="width: 80%">Player</th>
                  <th style="width: 5%">Place <label style="font-size: 14px; color: grey">(0 if no place)</label</th>
                </tr>
                @php
                $i = 1
                @endphp
                @forelse($users as $user)
                <tr>
                  <th>{!! $user->name !!}</th>
                  <input type="hidden" name="participant_list[]" value="{!! $user->userID !!}" multiple data-mdb-filter="true">
                  <th><input id="input_{!! $i++ !!}" type="text" name="rank_{!! $user->userID !!}" oninput="checkInput()" value="{!! $user->place !!}"></input></th>
                </tr>
								@empty
								<tr>
                  <th>No Participants</th>
                </tr>
								@endforelse
              </table>

              @if(Session::has('message'))
              <div id="messageModal" class="modal fade" style="margin-top: 20vh" >
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                          <h4>Nice!</h4>
                        </div>
                        <div class="modal-body">
                          <p>
                          {{ Session::get('message') }}
                          </p>
                        </div>
                        <div class="modal-footer">
                          <button id="exit_button" type="button" class="btn btn-primary">Ok</button>
                        </div>
                    </div>
                </div>
              </div>
              @endif

				<!-- Modal -->
        <div class="container">
                <div class="d-flex p-2 justify-content-end mx-4">
                  <button type="button" onclick="history.back()">Back</button>
                  <button type="button" id="submitButton" data-bs-toggle="modal" data-bs-target="#confirmDetailsModal">Submit</button>
                  <!-- Modal -->
                  <div class="modal fade" id="confirmDetailsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content" style="margin-top: 200px">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Confirm Details</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">Confirm results ?
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    @if(Session::has('message'))
    <script language="JavaScript" type="text/javascript">

    $(document).ready(function(){
      $("#messageModal").modal('show');
    });

    document.getElementById("exit_button").onclick = function () {
        location.href = "/tournament/result";
    };

    </script>
    {{!! Session::forget('message') !!}}
    @endif

    <script language="JavaScript" type="text/javascript">
    function checkInput() {
      var haveDuplicate = false;
      var invalidInputExist = false;

      var inputArray = [];
      var inputCount = {!! $i !!};
      for (i = 1; i < inputCount; i++) {
        inputArray[i] = document.getElementById("input_" + i).value;
      }

      for (i = 1; i < inputCount; i++) {
        var flag = false;
        if (inputArray[i] == "") {
          document.getElementById("input_" + i).style.border = "1px solid black";
          continue;
        }
        if (isNaN(inputArray[i]) || inputArray[i] < 0) {
          invalidInputExist = true;
          document.getElementById("input_" + i).style.border = "1px solid red";
        }
        else {
            console.log('Here');
          // Check for duplicate value
          var flag = false;
          for (j = 0; j < inputCount; j++) {
            if (i == j || inputArray[i] == "" || inputArray[j] == "" || inputArray[i] == "0" || inputArray[j] == "0")
              continue;
            if (inputArray[i] == inputArray[j]) {
              // Have duplicate
              flag = true;
              haveDuplicate = true;
              document.getElementById("input_" + i).style.border = "1px solid red";
            }
            if (!flag) {
              document.getElementById("input_" + i).style.border = "1px solid black";
            }
          }
        }
      }
      if (invalidInputExist || haveDuplicate) {
        document.getElementById("submitButton").disabled = true;
      }
      else {
        document.getElementById("submitButton").disabled = false;
      }

    }
    </script>

</body>
</html>
