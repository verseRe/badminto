@extends('master')
@section('title', 'Create Friendly Match')
@section('content')

<section>
        <div class="d-md-flex p-2 flex-column justify-content-start align-items-start">
            <div class="p-2">
                <h3 class="fw-bold">Enter Match Details</h3>
            </div>

            <form id='createForm' action="/eventType/friendly" method="post">

                @csrf
                <div class="p-2"><label for="match_name">Match Name:</label></div>
                <div class="p-2 "><input type="text" size="113" name="match_name" id="match_name"></div>

                <div class="p-2"><label for="match_venue">Match Venue:</label></div>
                <div class="p-2"><input type="text" size="113" name="match_venue" id="match_venue"></div>

                <div class="container-fluid ">
                    <div class="d-flex p-3 flex-row justify-content-between">
                        <div class="d-flex flex-column ">
                            <label for="match_date">Match Start Date:</label>
                            <input type="date" name="match_start_date" id="match_start_date" class="my-2">
                        </div>
                        <div class="d-flex flex-column ">
                            <label for="match_date">Match End Date:</label>
                            <input type="date" name="match_end_date" id="match_end_date" class="my-2">
                        </div>
                        <div class="d-flex flex-column ">
                            <label for="match_time">Match Time:</label>
                            <input type="time" name="match_time" id="match_time" class="my-2">
                        </div>
                        <div class="d-flex flex-column ">
                            <label for="match_fee">Match Fee:</label>
                            <input type="text" name="match_fee" id="match_fee" class="my-2">

                        </div>
                    </div>
                </div>
                <div class="d-flex flex-column mx-4">
                    <label for="match_fee">Chat Link:</label>
                    <input type="text" name="chat_link" size="113" id="chat_link" class="my-2">

                </div>
                <div class="container">
                    <div class="d-flex p-2 justify-content-end mx-4">
                        <input type="reset" value="cancel" class="btn btn-secondary text-white mx-2">
                        <input type="submit" id="selectPlayer" value="Select Players" class="btn main-bg-color text-white mx-2">
                    </div>
                </div>
            </form>
        </div>
    </section>


@endsection