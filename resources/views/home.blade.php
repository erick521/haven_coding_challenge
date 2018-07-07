@extends('layouts.master')

@section('content')

    <div class="container-fluid">

        <div class="d-flex flex-row p-2">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addNewContactModal">
                Add New Contact
            </button>
        </div>
        <div class="d-flex flex-row p-2">


            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td>@twitter</td>
                </tr>
                </tbody>
            </table>
        </div>

    </div>

    <!-- Modal -->
    <div class="modal fade" id="addNewContactModal" tabindex="-1" role="dialog" aria-labelledby="addNewContactModal" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                    @csrf
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="addNewContact(this);">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function addNewContact(button) {
            var $button = $(button);
            var $modal = $button.parents(".modal");

            console.log("clicked");

            var csrf_token = $modal.find('[name="_token"]').val();
            console.log("clicked" + csrf_token);
            $.post("{{url('add')}}",
                {
                    '_token': csrf_token
                },
            "json")
                .done(function(result) {
                    console.log(result);
                    $modal.modal('hide');
                })
                .fail(function() {
                    // todo update err message
                });
        }
    </script>

@endsection