@extends('tournament.master')

@section('title', 'Create Event')

@section('content')

<section>
        <div class="d-flex p-2 flex-column justify-content-center align-items-center">
            <h3>Create Event</h3>
            <div class="d-flex p-2 flex-row ">
                <form method="get" action="/eventType">
                    <label for="event" class="mx-2 px-4">Type of Event:</label>
                    <select name="event" id="event" class="form-select" aria-label="Default select example">
                        <option selected disabled>Choose Match Type</option>
                        <option value="friendly">Friendly Match</option>
                        <option value="internal">Internal Tournament</option>
                        <option value="3rd">3rd Party Tournament</option>
                    </select>
            </div>
            <div class="">
                <input type="reset" value="Clear" class="btn grey-bg-color text-white mx-2 my-1">
                <input type="submit" class="btn main-bg-color text-white mx-2 my-1">
            </div>
            </form>
        </div>
    </section>


    @endsection