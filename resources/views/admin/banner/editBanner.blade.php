
<!---------Modal edit----------->
<form action="{{route('updateBanner')}}" enctype="multipart/form-data" method="POST" onsubmit="return true">
    @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="editBanner">Edit Banner</h5>
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                ></button>
            </div>
            <div class="modal-body">
                <div class="row mx-3">
				<input class="form-control" type="text" id="id" name="id" value="{{$view->id}}" />
                    <div class="d-flex align-items-start align-items-sm-center gap-4">
                        <img src="{{asset('storage/'.$view->image)}}" alt="user-avatar" class="d-block rounded border" height="100" id="uploadedCate" />
                        <div class="button-wrapper mt-2 ">
							<span class="d-none d-sm-block">Change banner</span>
                            <label for="upload" class="btn btn-primary me-2 my-2" tabindex="0">
                                <i class="bx bx-upload d-block d-sm-none"></i>
                                <input type="file" name="image" id="image" class="account-file-input" accept="image/png, image/jpeg" />
                            </label>
                            <button type="button" class="btn btn-sm btn-outline-secondary account-image-reset">
                                <i class="bx bx-reset d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Reset</span>
                            </button>
                            <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                        </div>
                    </div>

                    <div class="my-3 col-md-12">
                        <label for="cateName2" class="form-label">Banner Name</label>
                        <input class="form-control" type="text" id="cateName2" name="cateName2" value="{{$view->name}}" />
{{--                        <select class="form-select" id="cateName2" aria-label="Category Name">--}}
{{--                            <option selected>Homepage</option>--}}
{{--                            <option value="Promotion">Promotion</option>--}}
{{--                            <option value="Category Page">Category Page</option>--}}
{{--                        </select>--}}
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
