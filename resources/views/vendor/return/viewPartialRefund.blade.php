            <div class="modal-header">
                <h5 class="modal-title" id="orderReturnTitle">Offer Partial Refund</h5>
                <input hidden type="text" id="trans_id" name="trans_id" value="">

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                ></button>
            </div>
            <div class="modal-body">
                <div class="row mx-3">
                    <label for="refund" class="form-label">Offer Partial Refund (RM)</label>
                    <input
                        type="text"
                        id="refund"
                        class="form-control"
                        placeholder="Enter (RM)"
                    />
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Close
                </button>
                <button type="submit" class="btn btn-primary">Confirm</button>
            </div>
