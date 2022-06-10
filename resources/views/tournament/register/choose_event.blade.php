@extends('tournament.master')

@section('title', 'Choose Event')

@section('content')

<section>
    <div class="d-flex p-2 flex-column justify-content-center align-items-center">
        <h3>Choose Event</h3>
        <form action="/selectEvent" method="post" id="chooseEventForm">
            <div class="d-flex p-2 flex-row ">
                {{ csrf_field() }}
                <h6 class="p-3">Type of Event:</h6>
                <select class="rounded m-2" name="match" id="match">
                    <option value="" selected>No Tournament Available</option>
                    @foreach($tournaments as $tournament)
                    <option value="{{$tournament->id}}">{{$tournament->match_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="d-flex flex-column">
                <input class="btn grey-bg-color text-white mx-2 my-1" type="reset" value="Clear">
                <input class="btn main-bg-color text-white mx-2 my-1" type="submit" value="Submit" onclick="submitForm()">
            </div>
        </form>
    </div>
</section>
<script>
    function submitForm(){
        let form = document.querySelector('#chooseEventForm');
        form.submit();
        // window.location.href = '/selectEvent/{{$tournament->id}}';
    }
</script>

<!-- @foreach($tournaments as $tournament)
<p>{{ $tournament->MatchId}}</p>
<p>{{ $tournament->MatchName}}</p>
@endforeach -->

@endsection
