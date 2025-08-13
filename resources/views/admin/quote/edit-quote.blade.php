<div class="modal fade text-left" id="edit-vendor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Edit Quote</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form enctype="multipart/form-data" id="blog_edit_form" action="{{ route('vendors.update') }}"
                    method="POST" class="mt-2">
                    @csrf
                    <input type="hidden" name="id" id="vendor_id" value="{{ $vendor->id }}">
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-group mb-2">
                                <label for="organization">Name</label>
                                <input name="organization" type="text" id="organization" class="form-control"
                                    value="{{ $vendor->organization }}" required />
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group mb-2">
                                <label for="email">Email</label>
                                <input name="email" type="email" id="email" class="form-control"
                                    value="{{ $vendor->email }}" required />
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group mb-2">
                                <label for="address">Address</label>
                                <input name="address" type="text" id="address" class="form-control"
                                    value="{{ $vendor->address }}" required />
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group mb-2">
                                <label for="contact">Contact No.</label>
                                <input name="contact" type="text" id="contact" value="{{ $vendor->contact }}"
                                    maxlength="10" class="form-control"
                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
                                    required />
                            </div>
                        </div>



                        <div class="col-md-6 col-12">
                            <div class="form-group mb-2">
                                <label for="gst">GST</label>
                                <input name="gst" type="text" id="gst" class="form-control"
                                    value="{{ $vendor->gst }}" required />
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group mb-2">
                                <label for="business_type">Business Type</label>
                                <input name="business_type" type="text" id="business_type" class="form-control"
                                    value="{{ $vendor->business_type }}" required />
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group mb-2">
                                <label for="establishment_year">Establishment Year</label>
                                <input name="establishment_year" type="text" id="establishment_year" class="form-control"
                                    value="{{ $vendor->establishment_year }}" required />
                            </div>
                        </div>


                        <div class="col-md-6 col-12">
                            <div class="form-group mb-2">
                                <label for="status">Status</label>
                                <select name="status" class="form-control" id="status">
                                    <option {{ $vendor->status == 1 ? 'selected' : '' }} value="1">Active</option>
                                    <option {{ $vendor->status == 2 ? 'selected' : '' }} value="2">InActive
                                    </option>
                                </select>
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
