@extends('master')

@section('title','Create Internal Tournament')
@section('content')

<section>
        <div class="d-md-flex p-2 flex-column justify-content-start align-items-start">
            <form id="createForm" method="post" action="/eventType/internal" enctype="multipart/form-data">
                @csrf
                <div class="p-2">
                    <h3 class="fw-bold">Enter Internal Tournament Details</h3>
                </div>

                <div class="p-2"><label for="match_name">Match Name:</label></div>
                <div class="p-2 "><input type="text" size="113" name="match_name" id="match_name"></div>

                <div class="p-2"><label for="match_venue">Match Venue:</label></div>
                <div class="p-2"><input type="text" size="113" name="match_venue" id="match_venue"></div>

                <div class="container-fluid">
                    <div class="d-flex p-3 flex-row justify-content-start">
                        <div class="d-flex flex-column mx-4">
                            <label for="match_date">Match Start Date:</label>
                            <input type="date" name="match_start_date" id="match_start_date" class="my-2">
                        </div>

                        <div class="d-flex flex-column mx-4">
                            <label for="match_date">Match End Date:</label>
                            <input type="date" name="match_end_date" id="match_end_date" class="my-2">
                        </div>

                        <div class="d-flex flex-column mx-4">
                            <label for="match_time">Match Time:</label>
                            <input type="time" name="match_time" id="match_time" class="my-2">
                        </div>

                        <div class="d-flex flex-column mx-4">
                            <label for="match_fee">Match Fee:</label>
                            <input type="text" name="match_fee" id="match_fee" class="my-2">
                            <label for="banner_image" class="my-2">Upload Banner Image:</label>
                            <input type="file" name="banner_image" id="banner_image" class="my-2" value="upload" accept="image/*,.jpg, .png, .jpeg">
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="d-flex p-2 justify-content-end mx-4">
                        <input type="reset" value="Cancel" class="btn grey-bg-color mx-2 text-white">
                        <button type="button" class="btn secondary-bg-color mx-2 text-white" data-bs-toggle="modal" data-bs-target="#confirmDetailsModal">Submit</button>
                        <!-- Modal -->
                        <div class="modal fade" id="confirmDetailsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Confirm Details</h5>
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
                </div>
            </form>

        </div>
    </section>

    <script>
        function submitForm(){
            let form = document.querySelector('#createForm');
            form.submit();
        }
        
    </script>

@endsection