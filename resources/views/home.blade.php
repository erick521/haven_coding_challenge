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
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Email</th>
                </tr>
                </thead>
                <tbody>
                @foreach($contacts as $contact)
                <tr>
                    <td>{{$contact["first_name"]}}</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                </tr>
                @endforeach
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
                    <form>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="first_name">First Name</label>
                                <input type="text" class="form-control" id="first_name" name="first_name" required>
                                <div class="invalid-feedback">
                                    Please provide a valid first name.
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="last_name">Last Name</label>
                                <input type="text" class="form-control" id="last_name" name="last_name" required>
                                <div class="invalid-feedback">
                                    Please provide a valid last name.
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                                <div class="invalid-feedback">
                                    Please provide a valid email.
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control" id="phone" name="phone">
                                <div class="invalid-feedback">
                                    Please provide a valid phone.
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="birthdate">Birthdate</label>
                            <input type="text" class="form-control" id="birthdate" name="birthdate">
                            <div class="invalid-feedback">
                                Please provide a valid birthday.
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="address1">Address</label>
                            <input type="text" class="form-control" id="address1" name="address1">
                            <div class="invalid-feedback">
                                Please provide a valid address.
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="address2">Address 2</label>
                            <input type="text" class="form-control" id="address2" name="address2">
                            <div class="invalid-feedback">
                                Please provide a valid address 2.
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="city">City</label>
                                <input type="text" class="form-control" id="city" name="city">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="state">State</label>
                                <select id="state" name="state" class="form-control">
                                    <option selected value="AL">Alabama</option>
                                    <option value="AK">Alaska</option>
                                    <option value="AZ">Arizona</option>
                                    <option value="AR">Arkansas</option>
                                    <option value="CA">California</option>
                                    <option value="CO">Colorado</option>
                                    <option value="CT">Connecticut</option>
                                    <option value="DE">Delaware</option>
                                    <option value="DC">District Of Columbia</option>
                                    <option value="FL">Florida</option>
                                    <option value="GA">Georgia</option>
                                    <option value="HI">Hawaii</option>
                                    <option value="ID">Idaho</option>
                                    <option value="IL">Illinois</option>
                                    <option value="IN">Indiana</option>
                                    <option value="IA">Iowa</option>
                                    <option value="KS">Kansas</option>
                                    <option value="KY">Kentucky</option>
                                    <option value="LA">Louisiana</option>
                                    <option value="ME">Maine</option>
                                    <option value="MD">Maryland</option>
                                    <option value="MA">Massachusetts</option>
                                    <option value="MI">Michigan</option>
                                    <option value="MN">Minnesota</option>
                                    <option value="MS">Mississippi</option>
                                    <option value="MO">Missouri</option>
                                    <option value="MT">Montana</option>
                                    <option value="NE">Nebraska</option>
                                    <option value="NV">Nevada</option>
                                    <option value="NH">New Hampshire</option>
                                    <option value="NJ">New Jersey</option>
                                    <option value="NM">New Mexico</option>
                                    <option value="NY">New York</option>
                                    <option value="NC">North Carolina</option>
                                    <option value="ND">North Dakota</option>
                                    <option value="OH">Ohio</option>
                                    <option value="OK">Oklahoma</option>
                                    <option value="OR">Oregon</option>
                                    <option value="PA">Pennsylvania</option>
                                    <option value="RI">Rhode Island</option>
                                    <option value="SC">South Carolina</option>
                                    <option value="SD">South Dakota</option>
                                    <option value="TN">Tennessee</option>
                                    <option value="TX">Texas</option>
                                    <option value="UT">Utah</option>
                                    <option value="VT">Vermont</option>
                                    <option value="VA">Virginia</option>
                                    <option value="WA">Washington</option>
                                    <option value="WV">West Virginia</option>
                                    <option value="WI">Wisconsin</option>
                                    <option value="WY">Wyoming</option>
                                </select>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="zip">Zip</label>
                                <input type="text" class="form-control" id="zip" name="zip">
                                <div class="invalid-feedback">
                                    Please provide a valid zip code.
                                </div>
                            </div>
                        </div>
                    </form>
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

            var csrf_token = $modal.find('[name="_token"]').val();
            var first_name = $modal.find('[name="first_name"]').val();
            var last_name = $modal.find('[name="first_name"]').val();
            var email = $modal.find('[name="email"]').val();
            var phone = $modal.find('[name="phone"]').val();
            var birthdate = $modal.find('[name="birthdate"]').val();
            var address = $modal.find('[name="address"]').val();
            var address2 = $modal.find('[name="address2"]').val();
            var city = $modal.find('[name="city"]').val();
            var state = $modal.find('[name="state"]').val();
            var zip = $modal.find('[name="zip"]').val();

            $modal.find('.invalid-feedback').hide();

            if(!first_name) {
                $modal.find('[name="first_name"]').siblings('.invalid-feedback').show();
            }

            if(!last_name) {
                $modal.find('[name="last_name"]').siblings('.invalid-feedback').show();
            }

            if(!email) {
                $modal.find('[name="email"]').siblings('.invalid-feedback').show();
            }

            if(first_name && last_name && email) {

                $.post("{{url('add')}}",
                    {
                        '_token': csrf_token,
                        first_name: first_name,
                        last_name: last_name,
                        email: email,
                        phone: phone,
                        birthdate: birthdate,
                        address: address,
                        address2: address2,
                        city: city,
                        state: state,
                        zip: zip
                    },
                    "json")
                    .done(function (result) {
                        console.log(result);
                        $modal.modal('hide');
                    })
                    .fail(function () {
                        // todo update err message
                    });
            }
        }
    </script>

@endsection