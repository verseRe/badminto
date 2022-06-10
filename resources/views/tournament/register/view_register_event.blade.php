@extends('master')

@section('title', 'Register Event')

@section('content')

<section>
        <div class="container">
            
                <!-- // $sql = 'SELECT * FROM tournament WHERE MatchId ='.$matchid;
                // $stmt = $pdo->query($sql);
                // $tour = $stmt->fetchAll(PDO::FETCH_ASSOC); -->
            
            <div class="d-flex flex-column p-2 align-items-center justify-content-evenly">
                <!-- <h2 class="fw-bold">3rd Party Tournament A</h2> -->

                <h2 class="fw-bold">
                    {{$oneTournament->MatchName}}
                    <!-- echo $tour[0]['MatchName']; -->
                </h2>
                <img src="{{$oneTournament->ImageLink}}" alt="Banner Image" class="img-thumbnail my-2"
                    width="410" height="480">
                <div class="d-flex flex-row p-1">
                    <h5 class="fw-bold mx-2">Type of Event: </h5>
                    <!-- <h5 class="fw-light mx-2">3rd Party Tournament</h5> -->
                    <h5 class="fw-light mx-2">
                        {{$oneTournament->MatchType}}
                        <!-- // echo $tour[0]['MatchType']; -->
                    </h5>
                </div>
                <div class="d-flex flex-row p-1">
                    <h5 class="fw-bold mx-2">Event Venue: </h5>
                    <h5 class="fw-light mx-2">
                        {{$oneTournament->MatchVenue}}
                    </h5>
                    <!-- <h5 class="fw-light mx-2">Pusat Sukan UPM</h5> -->
                </div>
                <div class="d-flex flex-row p-1">
                    <h5 class="fw-bold mx-2">Start Date: </h5>
                    <!-- <h5 class="fw-light mx-2">28/10/2020</h5> -->
                    <h5 class="fw-light mx-2">
                        {{$oneTournament->MatchStartDate}}
                        <!-- echo $tour[0]['MatchStartDate']; -->
                        
                    </h5>
                </div>
                <div class="d-flex flex-row p-1">
                    <h5 class="fw-bold mx-2">End Date: </h5>
                    <!-- <h5 class="fw-light mx-2">28/10/2020</h5> -->
                    <h5 class="fw-light mx-2">
                        {{$oneTournament->MatchEndDate}}
                        
                        <!-- // echo $tour[0]['MatchEndDate']; -->
                    </h5>
                </div>
                <div class="d-flex flex-row p-1">
                    <h5 class="fw-bold mx-2">Time: </h5>
                    <h5 class="fw-light mx-2">
                        {{$oneTournament->MatchStartTime}}
                    </h5>
                    <!-- <h5 class="fw-light mx-2">3:14 PM</h5> -->
                </div>
                <div class="d-flex flex-row p-1">
                    <h5 class="fw-bold mx-2">Fee: </h5>
                    <!-- <h5 class="fw-light mx-2">RM 20.00</h5> -->
                    <h5 class="fw-light mx-2">
                        {{$oneTournament->MatchFee}}
                        <!-- echo $tour[0]['MatchFee']; -->
                        
                    </h5>
                </div>
                <div class="d-flex flex-row p-1">
                    <button class="btn grey-bg-color mx-2 my-2 text-white">Cancel</button>
                    <button class="btn secondary-bg-color mx-2 my-2 text-white" type="button" data-bs-toggle="modal"
                        data-bs-target="#confirmRegisterModal">Register</button>
                        <!-- Modal -->
                    <div class="modal fade" id="confirmRegisterModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Confirm Registration</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="d-flex align-items-center flex-column my-2">
                                        <h6 class="fw-bold my-1">Are you sure you want to register ?</h6>
                                        <h6 class="fw-light my-1">Your credit will be deducted.</h6>
                                    </div>
                                </div>
                                <div class="modal-footer center">
                                        <button type="button" class="btn grey-bg-color text-white mx-2" data-bs-dismiss="modal">No</button>
                                        <button type="button" class="btn main-bg-color text-white mx-2" onclick="confirmDetails()" data-bs-dismiss="modal" >Yes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection