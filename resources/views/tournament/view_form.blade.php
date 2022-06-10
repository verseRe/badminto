<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Event - BSPBC</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/tour.css">

</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg ">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Navbar</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
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
                        <button class="btn main-bg-color mx-1 round-button text-white" id="profile"
                            type="submit">Profile</button>
                        <button class="btn secondary-bg-color mx-1 round-button text-white"
                            type="submit">Logout</button>
                    </form>
                </div>
            </div>
        </nav>
    </header>

    <section>
        <div class="container">
            <div class="d-flex flex-column p-2 align-items-center justify-content-evenly">
                <h2 class="fw-bold" style="margin: 50px">{!! $tournament->match_name !!}</h2>
                <div class="d-flex flex-row p-1">
                    <h5 class="fw-bold mx-2">Type of Event: </h5>
                    <h5 class="fw-light mx-2">{!! $tournament->match_type !!}</h5>
                </div>
                <div class="d-flex flex-row p-1">
                    <h5 class="fw-bold mx-2">Event Venue: </h5>
                    <h5 class="fw-light mx-2">{!! $tournament->match_venue !!}</h5>
                </div>
                <div class="d-flex flex-row p-1">
                    <h5 class="fw-bold mx-2">Match Start Date: </h5>
                    <h5 class="fw-light mx-2">{!! $tournament->match_start_date !!}</h5>
                </div>
                <div class="d-flex flex-row p-1">
                    <h5 class="fw-bold mx-2">Match End Date: </h5>
                    <h5 class="fw-light mx-2">{!! $tournament->match_end_date !!}</h5>
                </div>
                <div class="d-flex flex-row p-1">
                    <h5 class="fw-bold mx-2">Start time: </h5>
                    <h5 class="fw-light mx-2">{!! $tournament->match_start_time !!}</h5>
                </div>
            </div>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
        integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js"
        integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy"
        crossorigin="anonymous"></script>

</body>

</html>
