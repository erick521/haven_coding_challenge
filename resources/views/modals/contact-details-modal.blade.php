
<!-- Modal -->
<div class="modal fade" id="contactDetailsModal" tabindex="-1" role="dialog" aria-labelledby="contactDetailsModal" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="contactModalHeader">Contact Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-row">
                        <label for="first_name" class="col-sm-4 col-form-label">First Name</label>
                        <div class="col-sm-8">
                            <input type="text" readonly class="form-control-plaintext" id="first_name" name="first_name" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <label for="last_name" class="col-sm-4 col-form-label">Last Name</label>
                        <div class="col-sm-8">
                            <input type="text" readonly class="form-control-plaintext" id="last_name" name="last_name" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <label for="email" class="col-sm-4 col-form-label">Email</label>
                        <div class="col-sm-8">
                            <input type="email" readonly class="form-control-plaintext" id="email" name="email" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <label for="phone" class="col-sm-4 col-form-label">Phone</label>
                        <div class="col-sm-8">
                            <input type="text" readonly class="form-control-plaintext" id="phone" name="phone">
                        </div>
                    </div>
                    <div class="form-row">
                        <label for="birthdate" class="col-sm-4 col-form-label">Birthdate</label>
                        <div class="col-sm-8">
                            <input type="text" readonly class="form-control-plaintext" id="birthdate" name="birthdate">
                        </div>
                    </div>
                    <div class="form-row">
                        <label for="address1" class="col-sm-4 col-form-label">Address 1</label>
                        <div class="col-sm-8">
                            <input type="text" readonly class="form-control-plaintext" id="address1" name="address1">
                        </div>
                    </div>
                    <div class="form-row">
                        <label for="address2" class="col-sm-4 col-form-label">Address 2</label>
                        <div class="col-sm-8">
                            <input type="text" readonly class="form-control-plaintext" id="address2" name="address2">
                        </div>
                    </div>
                    <div class="form-row">
                        <label for="city" class="col-sm-4 col-form-label">City</label>
                        <div class="col-sm-8">
                            <input type="text" readonly class="form-control-plaintext" id="city" name="city">
                        </div>
                    </div>
                    <div class="form-row">
                        <label for="state" class="col-sm-4 col-form-label">State</label>
                        <div class="col-sm-8">
                            <input type="text" readonly  class="form-control-plaintext" id="state" name="state">
                        </div>
                    </div>
                    <div class="form-row">
                        <label for="zip" class="col-sm-4 col-form-label">Zip</label>
                        <div class="col-sm-8">
                            <input type="text" readonly class="form-control-plaintext" id="zip" name="zip">
                        </div>
                    </div>
                </form>
                <hr>
                <h5>Map Location</h5>
                <div id="map"></div>
            </div>
            <div class="modal-footer">
                <button type="button" name="closeButton" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    var geocoder;
    var map;

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
                    var marker = new google.maps.Marker({
                        map: map,
                        position: results[0].geometry.location,
                        icon: "{{url('images/Icon-Small-40.png')}}"
                    });
                } else {
                    alert('Geocode was not successful for the following reason: ' + status);
                }
            }
            );
    }

</script>