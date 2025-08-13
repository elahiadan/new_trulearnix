<div class="modal fade text-left" id="edit-product" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Edit product</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form enctype="multipart/form-data" id="add-product" action="{{ route('homepages.update') }}"
                    method="POST" class="mt-2">
                    @csrf
                    <input type="hidden" name="id" id="product_id" value="{{ $product->id }}">
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-group mb-2">
                                <label for="title">Title</label>
                                <input name="title" type="text" id="title" class="form-control"
                                    value="{{ $product->title }}" required />
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group mb-2">
                                <label for="link">Link</label>
                                <textarea name="link" id="link" class="form-control" required>{{ $product->link }}</textarea>
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group mb-2">
                                <label for="product">Product</label>
                                <select name="product[]"
                                    class="select2 form-control form-control-lg select2-hidden-accessible"
                                     required multiple>
                                    <option value=""></option>
                                    @foreach ($allproducts as $product)
                                        <option value="{{ $product->id }}"
                                            {{ in_array($product->id, $ids) ? 'selected' : '' }}>
                                            {{ $product->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>



                        <div class="col-md-6 col-12">
                            <div class="form-group mb-2">
                                <label for="status">Status</label>
                                <select name="status"
                                    class="select2 form-control form-control-lg select2-hidden-accessible">
                                    <option value=""></option>
                                    <option {{ $status == 1 ? 'selected' : '' }} value="1"> Active
                                    </option>
                                    <option {{ $status == 2 ? 'selected' : '' }} value="2"> InAvtive
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
