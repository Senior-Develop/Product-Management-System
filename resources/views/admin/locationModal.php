<div class="modal fade" id="locationModal" tabindex="-1" role="dialog" aria-labelledby="editBookModalTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editBookModalTitle">Location</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body modal-height">
                <div class="kt-scroll" data-scroll="true">
                    <div class="form-group row">
                        <label class="col-4 col-form-label">Serial Number</label>
                        <div class="col-8">
                            <input type="text" class="form-control serial-number">
                            <input type="hidden" class="form-control" id="record_id">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-4 col-form-label">Contact Type</label>
                        <div class="col-8">
                            <input type="text" class="form-control contact-type">
                        </div>
                    </div> 
                    <div class="form-group row">
                        <label class="col-4 col-form-label">Company Name</label>
                        <div class="col-8">
                            <input type="text" class="form-control company-name">
                        </div>
                        <div class="company_name-error left-spacing red"></div>
                    </div> 
                    <div class="form-group row">
                        <label class="col-4 col-form-label">Name<span class="red"> * </span></label>
                        <div class="col-8">
                            <input type="text" class="form-control name">
                        </div>
                        <div class="name-error left-spacing red"></div>
                    </div> 
                    <div class="form-group row">
                        <label class="col-4 col-form-label">Address</label>
                        <div class="col-8">
                            <input type="text" class="form-control address">
                        </div>
                        <div class="address-error left-spacing red"></div>
                    </div> 
                    <div class="form-group row">
                        <label class="col-4 col-form-label">Post Code</label>
                        <div class="col-8">
                            <input type="text" class="form-control post-code">
                        </div>
                    </div> 
                    <div class="form-group row">
                        <label class="col-4 col-form-label">Location</label>
                        <div class="col-8">
                            <input type="text" class="form-control location">
                        </div>
                    </div> 
                    <div class="form-group row">
                        <label class="col-4 col-form-label">Country</label>
                        <div class="col-8">
                            <input type="text" class="form-control country">
                        </div>
                    </div> 
                    <div class="form-group row">
                        <label class="col-4 col-form-label">Email<span class="red"> * </span></label>
                        <div class="col-8">
                            <input type="text" class="form-control email">
                        </div>
                        <div class="email-error left-spacing red"></div>
                    </div> 
                    <div class="form-group row">
                        <label class="col-4 col-form-label">Email 2</label>
                        <div class="col-8">
                            <input type="text" class="form-control email-2">
                        </div>
                        <div class="email_2-error left-spacing red"></div>
                    </div> 
                    <div class="form-group row">
                        <label class="col-4 col-form-label">Phone</label>
                        <div class="col-8">
                            <input type="text" class="form-control phone">
                        </div>
                    </div> 
                    <div class="form-group row">
                        <label class="col-4 col-form-label">Phone 2</label>
                        <div class="col-8">
                            <input type="text" class="form-control phone-2">
                        </div>
                    </div> 
                    <div class="form-group row">
                        <label class="col-4 col-form-label">WGS84 Lat</label>
                        <div class="col-8">
                            <input type="text" class="form-control wgs84-lat">
                        </div>
                        <div class="wgs84_lat-error left-spacing red"></div>
                    </div> 
                    <div class="form-group row">
                        <label class="col-4 col-form-label">WGS84 Lon</label>
                        <div class="col-8">
                            <input type="text" class="form-control wgs84-lon">
                        </div>
                        <div class="wgs84_lon-error left-spacing red"></div>
                    </div> 
                    <div class="form-group row">
                        <label class="col-4 col-form-label">Inverter Type</label>
                        <div class="col-8">
                            <input type="text" class="form-control inverter-type">
                        </div>
                    </div> 
                    <div class="form-group row">
                        <label class="col-4 col-form-label">Inverter Power</label>
                        <div class="col-8">
                            <input type="text" class="form-control inverter-power">
                        </div>
                    </div> 
                    <div class="form-group row">
                        <label class="col-4 col-form-label">PV Power</label>
                        <div class="col-8">
                            <input type="text" class="form-control pv-power">
                        </div>
                    </div>          
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-brand" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary save-btn location-save-btn">Save</button>
            </div>
        </div>
    </div>
</div>