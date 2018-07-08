
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
                <form autocomplete="off">
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
                            <input type="text" readonly class="form-control-plaintext" id="phoneDetail" name="phone">
                        </div>
                    </div>
                    <div class="form-row">
                        <label for="birthdate" class="col-sm-4 col-form-label">Birthdate</label>
                        <div class="col-sm-8">
                            <input type="text" readonly class="form-control-plaintext" id="birthdateDetail" name="birthdate">
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
