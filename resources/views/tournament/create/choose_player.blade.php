@extends('master')
@section('title', 'Choose Players');
@section('content')

<section>
        <div class="container-fluid">
            <div class="d-flex p-2 flex-row">
                <div>
                    <h3>
                        Choose Players for Friendly Match
                    </h3>
                </div>
            </div>
            <div class="d-flex p-2 flex-column">
                <form method="post" id='selectPlayer' action="/eventType/choose">
                    @csrf
                    <p>Selected Players: </p>
                    {{$members}}
                    @foreach($members as $member)
                    <div class="row border border-dark rounded mb-2" >
                        <div class="col-md-4 d-flex ">
                            <h4>
                                <label for="p1">{{$member->Username}}</label>
                                <label for="p1Status" class="statusLabel-accept"></label>
                            </h4>
                            </div>
                            <div class="col-md-4 offset-md-4 d-flex justify-content-end align-items-center">
                                <input type="checkbox" class="checkbox" name="players[]" value="{{$member->UserId}}" multiple data-mdb-filter="true">
                            </div>
                    </div>
                    @endforeach
                    <!-- $sql = 'SELECT * FROM member';
                    $stmt = $pdo->query($sql);
                    $memberArray = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    foreach ($memberArray as $member) {
                        echo '<div class="row border border-dark rounded mb-2" >
                        <div class="col-md-4 d-flex ">
                            <h4>
                                <label for="p1">' . $member['Username'] . '</label>
                                <label for="p1Status" class="statusLabel-accept"></label>
                            </h4>
                            </div>
                            <div class="col-md-4 offset-md-4 d-flex justify-content-end align-items-center">
                                <input type="checkbox" class="checkbox" name="players[]" value="' . $member['UserId'] . '" multiple data-mdb-filter="true">
                            </div>
                    </div>';
                    } -->
                    
                    <div class="d-flex p-2 flex-row justify-content-end">
                        <input type="reset" value="Cancel" class="btn grey-bg-color text-white mx-2">
                        <button class="btn main-bg-color text-white" type="button" data-bs-toggle="modal" data-bs-target="#confirmPlayerModal">Submit</button>
                        <!-- Modal -->
                        <div class="modal fade" id="confirmPlayerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Confirm Selection</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Confirm match details ?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn grey-bg-color text-white" data-bs-dismiss="modal">No</button>
                                        <button type="button" class="btn secondary-bg-color text-white" data-bs-dismiss="modal" onclick="submitForm()">Yes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <script>
        function submitForm(){
            let form = document.querySelector('#selectPlayer');
            form.submit();
        }
    </script>

@endsection