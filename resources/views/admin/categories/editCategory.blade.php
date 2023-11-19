<!---------Modal edit----------->
<form action="{{route('updateCategory')}}" enctype="multipart/form-data" method="POST" onsubmit="return true">
    @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="editCate">Edit Category</h5>
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                ></button>
            </div>
            <div class="modal-body">
                <div class="row mx-3">
                    <input hidden class="form-control" type="text" id="id" name="id" value="{{$view->sort_id}}" />
                    <div class="d-flex align-items-start align-items-sm-center gap-4">
                        <img src="{{asset('storage/'.$view->image)}}" alt="user-avatar" class="d-block rounded border" height="100" width="100" id="uploadedCate" />
                        <div class="button-wrapper">
                            <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                <span class="d-none d-sm-block">Change photo</span>
                                <i class="bx bx-upload d-block d-sm-none"></i>
                                <input type="file" name="image" id="image" class="account-file-input" accept="image/png, image/jpeg" />
                            </label>
                            <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                                <i class="bx bx-reset d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Reset</span>
                            </button>
                            <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                        </div>
                    </div>

                    <div class="my-3 col-md-12">
                        <label for="cateName2" class="form-label">Category Name</label>
                        <input class="form-control" type="text" id="cateName2" name="cateName2" value="{{$view->name}}" />
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Close
                </button>
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
</form>


