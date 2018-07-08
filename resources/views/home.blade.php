@extends('layouts.master')

@section('content')

    <a href="{{url('/')}}" style="">
    <div class="jumbotron">

        <div class="container-fluid">
            <h1>Erick's Address Book</h1>
        </div>

    </div>
    </a>

    <div class="container-fluid">

        @csrf
        <div class="d-flex flex-row p-2">
            <div class="p-2">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#contactFormModal">
                    Add New Contact
                </button>
            </div>
            <div class="p-2 flex-fill">
                @include('search', ['search'=>$search])
            </div>
        </div>
        {{ $contacts->appends([
            'sort' => $sort["column"],
            'order' => $sort["order"],
            'search' => $search
            ])->links() }}
        <div class="d-flex flex-row p-2">

        @include('tables.contact-list', ['contacts' => $contacts, 'search' => $search])

        </div>
        {{ $contacts->appends([
            'sort' => $sort["column"],
            'order' => $sort["order"],
            'search' => $search
            ])->links() }}
    </div>

    @include('modals.contact-form-modal')
    @include('modals.contact-details-modal')

    <script>

        var geocoder;
        var map;
        var marker;

        $(function () {
            $('#contactFormModal').on('hidden.bs.modal', function() {
                $("#contactFormModalHeader").html("Add Contact");
                $(this).find("form").trigger("reset");

                $(this).find("[name='addButton']").show();
                $(this).find("[name='saveButton']").hide();
            });

            $('#contactDetailsModal').on('hidden.bs.modal', function() {
                marker.setMap(null);
            });

            $("#phone").intlTelInput(
                {
                    utilsScript: "js/utils.js",
                    allowDropdown: false,
                    autoPlaceholder: "off"
                });
        });

        function initMap() {

            geocoder = new google.maps.Geocoder();

            // The location of Uluru
            var uluru = {lat: -25.344, lng: 131.036};
            // The map, centered at Uluru
            map = new google.maps.Map(
                document.getElementById('map'), {zoom: 10, center: uluru});
        }

        function updateMap() {
            var $modal = $("#contactDetailsModal");

            var address1 = $modal.find("[name='address1']").val();
            var address2 = $modal.find("[name='first_name']").val();
            var city = $modal.find("[name='city']").val();
            var state = $modal.find("[name='state']").val();
            var zip = $modal.find("[name='zip']").val();

            var fullAddress = address1 + " " + address2 + " " + city + " " + state + " " + zip;

            geocoder.geocode(
                { 'address': fullAddress },
                function (results, status) {
                    if(status == 'OK') {
                        map.setCenter(results[0].geometry.location);
                        marker = new google.maps.Marker({
                            map: map,
                            position: results[0].geometry.location,
                            icon: "{{url('/img/Icon-Small-40.png')}}"
                        });
                    } else {
                        alert('Geocode was not successful for the following reason: ' + status);
                    }
                }
            );
        }

        function addNewContact(button) {
            var $button = $(button);
            var $modal = $button.parents(".modal");

            // clear previous errors
            $modal.find('.invalid-feedback').hide();

            var csrf_token = $('[name="_token"]').val();
            var first_name = $modal.find('[name="first_name"]').val();
            var last_name = $modal.find('[name="last_name"]').val();
            var email = $modal.find('[name="email"]').val();
            var phone = $modal.find('[name="phone"]').val();
            var birthdate = $modal.find('[name="birthdate"]').val();
            var address1 = $modal.find('[name="address1"]').val();
            var address2 = $modal.find('[name="address2"]').val();
            var city = $modal.find('[name="city"]').val();
            var state = $modal.find('[name="state"]').val();
            var zip = $modal.find('[name="zip"]').val();


            if(!first_name) {
                $modal.find('[name="first_name"]').siblings('.invalid-feedback').show();
            }

            if(!last_name) {
                $modal.find('[name="last_name"]').siblings('.invalid-feedback').show();
            }

            if(!email) {
               $modal.find('[name="email"]').siblings('.invalid-feedback').show();
            }

            var phoneIsValid = true;

            if(phone) {
                phoneIsValid = $modal.find('[name="phone"]').intlTelInput("isValidNumber");
                if(phoneIsValid) {
                   phone = $modal.find('[name="phone"]').intlTelInput("getNumber");
                } else {
                    $("#phone-invalid").show();
                }
            }

            if(first_name && last_name && email && phoneIsValid) {

                $.post("{{url('add')}}",
                    {
                        '_token': csrf_token,
                        first_name: first_name,
                        last_name: last_name,
                        email: email,
                        phone: phone,
                        birthdate: birthdate,
                        address1: address1,
                        address2: address2,
                        city: city,
                        state: state,
                        zip: zip
                    },
                    "json")
                    .done(function (result) {
                        console.log(result);
                        if(result.success) {
                            $modal.modal('hide');
                            setTimeout(function() {
                                location.reload();
                            }, 600);
                        } else {
                            for(key in result.errors) {
                                $modal.find("[name=" + key + "]").siblings(".invalid-feedback").html(result.errors[key]).show();

                            }
                        }

                    })
                    .fail(function () {
                        // todo update err message
                    });
            }
        }

        function deleteContact(button) {

            var $button = $(button);

            var csrf_token = $("[name='_token']").val();
            var id = $button.data('id');

            console.log(id);

            $.post("{{url('delete')}}",
                {
                    '_token': csrf_token,
                    id: id
                },
                "json")
                .done(function (result) {
                    // console.log(result);
                    if(result.success) {
                        setTimeout(function() {
                            location.reload();
                        }, 600);
                    } else {

                    }

                })
                .fail(function () {
                    // todo update err message
                });
        }

        function showContactDetails(button) {

            var $button = $(button);
            var $modal = $("#contactDetailsModal");

            var contact = $button.data('contact');

            $modal.find("[name='first_name']").val(contact["first_name"]);
            $modal.find("[name='last_name']").val(contact["last_name"]);
            $modal.find("[name='email']").val(contact["email"]);

            if(contact["phone"]) {
                $("#phone").intlTelInput("setNumber", contact["phone"]);
                var formattedPhone = $("#phone").intlTelInput("getNumber", intlTelInputUtils.numberFormat.NATIONAL);
                $modal.find("[name='phone']").val(formattedPhone);
            }

            $modal.find("[name='birthdate']").val(contact["birthdate"]);
            $modal.find("[name='address1']").val(contact["address1"]);
            $modal.find("[name='address2']").val(contact["address2"]);
            $modal.find("[name='city']").val(contact["city"]);
            $modal.find("[name='state']").val(contact["state"]);
            $modal.find("[name='zip']").val(contact["zip"]);

            updateMap();

            $modal.modal("show");
        }


        function showContactForm(button, disableControls) {

            var $button = $(button);
            var $modal = $("#contactFormModal");

            var contact = $button.data('contact');

            $("#contactFormModalHeader").html("Edit Contact");
            $modal.find("[name='saveButton']").data('id', contact["id"]).show();
            $modal.find("[name='addButton']").hide();

            $modal.find("[name='first_name']").val(contact["first_name"]);
            $modal.find("[name='last_name']").val(contact["last_name"]);
            $modal.find("[name='email']").val(contact["email"]);

            if(contact["phone"]) {
                $modal.find("[name='phone']").intlTelInput("setNumber", contact["phone"]);
            }

            $modal.find("[name='birthdate']").val(contact["birthdate"]);
            $modal.find("[name='address1']").val(contact["address1"]);
            $modal.find("[name='address2']").val(contact["address2"]);
            $modal.find("[name='city']").val(contact["city"]);
            $modal.find("[name='state']").val(contact["state"]);
            $modal.find("[name='zip']").val(contact["zip"]);

            $modal.modal("show");
        }

        function editContact(button) {
            var $button = $(button);
            var $modal = $button.parents(".modal");

            var id = $button.data('id');
            $modal.find('.invalid-feedback').hide();

            var csrf_token = $('[name="_token"]').val();
            var first_name = $modal.find('[name="first_name"]').val();
            var last_name = $modal.find('[name="last_name"]').val();
            var email = $modal.find('[name="email"]').val();
            var phone = $modal.find('[name="phone"]').val();
            var birthdate = $modal.find('[name="birthdate"]').val();
            var address1 = $modal.find('[name="address1"]').val();
            var address2 = $modal.find('[name="address2"]').val();
            var city = $modal.find('[name="city"]').val();
            var state = $modal.find('[name="state"]').val();
            var zip = $modal.find('[name="zip"]').val();



            if(!first_name) {
                $modal.find('[name="first_name"]').siblings('.invalid-feedback').show();
            }

            if(!last_name) {
                $modal.find('[name="last_name"]').siblings('.invalid-feedback').show();
            }

            if(!email) {
                $modal.find('[name="email"]').siblings('.invalid-feedback').show();
            }

            var phoneIsValid = true;

            if(phone) {
                phoneIsValid = $modal.find('[name="phone"]').intlTelInput("isValidNumber");
                if(phoneIsValid) {
                    phone = $modal.find('[name="phone"]').intlTelInput("getNumber");
                } else {
                    $("#phone-invalid").show();
                }
            }

            if(first_name && last_name && email && phoneIsValid) {

                $.post("{{url('edit')}}",
                    {
                        '_token': csrf_token,
                        id: id,
                        first_name: first_name,
                        last_name: last_name,
                        email: email,
                        phone: phone,
                        birthdate: birthdate,
                        address1: address1,
                        address2: address2,
                        city: city,
                        state: state,
                        zip: zip
                    },
                    "json")
                    .done(function (result) {
                        console.log(result);
                        if(result.success) {
                            $modal.modal('hide');
                            setTimeout(function() {
                                location.reload();
                            }, 400);
                        } else {
                            for(key in result.errors) {
                                $modal.find("[name=" + key + "]").siblings(".invalid-feedback").html(result.errors[key]).show();

                            }
                        }

                    })
                    .fail(function () {
                        // todo update err message
                    });
            }
        }

    </script>

@endsection