<div class="modal fade text-left" id="edit-password" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Edit Password</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form enctype="multipart/form-data" id="blog_edit_form" action="{{ route('vendors.update.password') }}"
                    method="POST" class="mt-2">
                    @csrf
                    <input type="hidden" name="id" id="vendor_id" value="{{ $vendor->id }}">
                    <div class="row">

                        <div class="col-md-6 col-12">
                            <div class="form-group mb-2">
                                <label for="change-password">New Password</label>
                                <div class="input-group-append">
                                    <input name="password" type="password" id="change-password" class="form-control"
                                        required />
                                    <span class="input-group-text cursor-pointer" id="showPass"><i
                                            data-feather="eye"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group mb-2">
                                <label for="confirm-password">Confirm Password</label>
                                <div class="input-group-append">
                                    <input name="password_confirmation" type="password" id="confirm-password" class="form-control"
                                        required />
                                    <span class="input-group-text cursor-pointer" id="showConfirmPass"><i
                                            data-feather="eye"></i></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 mt-50">
                            <button type="submit" class="btn btn-primary mr-1">Save Changes</button>
                            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
