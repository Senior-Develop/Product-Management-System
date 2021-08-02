<div class="modal fade" id="customerModal" tabindex="-1" role="dialog" aria-labelledby="editBookModalTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editBookModalTitle">Customer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body modal-height">
                <div class="kt-scroll" data-scroll="true">
                    <div class="form-group row">
                        <label class="col-4 col-form-label">No</label>
                        <div class="col-8">
                            <input type="text" class="form-control no">
                            <input type="hidden" class="form-control" id="record_id">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-4 col-form-label">Category</label>
                        <div class="col-8">
                            <input type="text" class="form-control category">
                        </div>
                    </div> 
                    <div class="form-group row">
                        <label class="col-4 col-form-label">Branch</label>
                        <div class="col-8">
                            <input type="text" class="form-control branch">
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
                    </div> 
                    <div class="form-group row">
                        <label class="col-4 col-form-label">Name<span class="red"> * </span></label>
                        <div class="col-8">
                            <input type="text" class="form-control name" required>
                        </div>
                        <div class="name-error left-spacing red"></div>
                    </div> 
                    <div class="form-group row">
                        <label class="col-4 col-form-label">Name 2</label>
                        <div class="col-8">
                            <input type="text" class="form-control name-2">
                        </div>
                        <div class="name_2-error left-spacing red"></div>
                    </div>
                    <div class="form-group row">
                        <label class="col-4 col-form-label">Salutation</label>
                        <div class="col-8">
                            <input type="text" class="form-control salutation">
                        </div>
                    </div> 
                    <div class="form-group row">
                        <label class="col-4 col-form-label">Title</label>
                        <div class="col-8">
                            <input type="text" class="form-control title">
                        </div>
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
                            <input type="text" class="form-control email" required>
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
                        <label class="col-4 col-form-label">Mobile</label>
                        <div class="col-8">
                            <input type="text" class="form-control mobile">
                        </div>
                    </div> 
                    <div class="form-group row">
                        <label class="col-4 col-form-label">Fax</label>
                        <div class="col-8">
                            <input type="text" class="form-control fax">
                        </div>
                    </div> 
                    <div class="form-group row">
                        <label class="col-4 col-form-label">Website</label>
                        <div class="col-8">
                            <input type="text" class="form-control website">
                        </div>
                    </div> 
                    <div class="form-group row">
                        <label class="col-4 col-form-label">Skype</label>
                        <div class="col-8">
                            <input type="text" class="form-control skype">
                        </div>
                    </div> 
                    <div class="form-group row">
                        <label class="col-4 col-form-label">Form Of Address</label>
                        <div class="col-8">
                            <input type="text" class="form-control form-of-address">
                        </div>
                    </div>          
                    <div class="form-group row">
                        <label class="col-4 col-form-label">Birthday</label>
                        <div class="col-8">
                            <input type="text" class="form-control birthday">
                        </div>
                    </div>     
                    <div class="form-group row">
                        <label class="col-4 col-form-label">Correspondence Channel</label>
                        <div class="col-8">
                            <input type="text" class="form-control correspondence-channel">
                        </div>
                    </div>          
                    <div class="form-group row">
                        <label class="col-4 col-form-label">Remarks</label>
                        <div class="col-8">
                            <input type="text" class="form-control remarks">
                        </div>
                    </div>          
                    <div class="form-group row">
                        <label class="col-4 col-form-label">Relationship Info</label>
                        <div class="col-8">
                            <input type="text" class="form-control relationship-info">
                        </div>
                    </div>          
                    <div class="form-group row">
                        <label class="col-4 col-form-label">Contact Person</label>
                        <div class="col-8">
                            <input type="text" class="form-control contact-person">
                        </div>
                    </div>          
                    <div class="form-group row">
                        <label class="col-4 col-form-label">Language</label>
                        <div class="col-8">
                            <input type="text" class="form-control language">
                        </div>
                    </div>          
                    <div class="form-group row">
                        <label class="col-4 col-form-label">Vat Number</label>
                        <div class="col-8">
                            <input type="text" class="form-control vat-number">
                        </div>
                    </div>               
                    <div class="form-group row">
                        <label class="col-4 col-form-label">Number of employees</label>
                        <div class="col-8">
                            <input type="text" class="form-control number-of-employees">
                        </div>
                    </div>          
                    <div class="form-group row">
                        <label class="col-4 col-form-label">Commercial Register No</label>
                        <div class="col-8">
                            <input type="text" class="form-control commercial-register-no">
                        </div>
                    </div>          
                    <div class="form-group row">
                        <label class="col-4 col-form-label">Vat Identification number</label>
                        <div class="col-8">
                            <input type="text" class="form-control vat-identification-number">
                        </div>
                    </div>          
                    <div class="form-group row">
                        <label class="col-4 col-form-label">lead</label>
                        <div class="col-8">
                            <input type="text" class="form-control lead">
                        </div>
                    </div>          
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-brand" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary save-btn customer-save-btn">Save</button>
            </div>
        </div>
    </div>
</div>