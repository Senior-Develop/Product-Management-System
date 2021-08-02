<div class="modal fade" id="removeModal" tabindex="-1" role="dialog" aria-labelledby="removeModalTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="removeModalTitle">Remove Item</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="kt-scroll" data-scroll="true">
                    <div class="form-group" id="remove_form_group">
                        <label>Are you sure you want to delete it?</label>
                        <input type="hidden" id="remove_id">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-brand" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="remove()">Remove</button>
            </div>
        </div>
    </div>
</div>