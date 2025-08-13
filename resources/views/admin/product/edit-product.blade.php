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
                <form enctype="multipart/form-data" id="add-product" action="{{ route('products.update') }}"
                    method="POST" class="mt-2">
                    @csrf
                    <input type="hidden" name="id" id="product_id" value="{{ $product->id }}">
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-group mb-2">
                                <label for="name">Name</label>
                                <input name="name" type="text" id="name" class="form-control"
                                    value="{{ $product->name }}" required />
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group mb-2">
                                <label for="category">Category</label>
                                <select name="category"
                                    class="select2 form-control form-control-lg select2-hidden-accessible"
                                    id="category" required>
                                    <option value=""></option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ $category->id == $product->category_id ? 'selected' : '' }}>
                                            {{ $category->name }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group mb-2">
                                <label for="vendor">Vendor</label>
                                <select name="vendor"
                                    class="select2 form-control form-control-lg select2-hidden-accessible"
                                    id="vendor" required>
                                    <option value=""></option>
                                    @foreach ($vendors as $vendor)
                                        <option value="{{ $vendor->id }}"
                                            {{ $vendor->id == $product->vendor_id ? 'selected' : '' }}>
                                            {{ $vendor->organization }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>


                        <div class="col-md-6 col-12">
                            <div class="form-group mb-2">
                                <label for="price">Price</label>
                                <input name="price" type="text" id="price" class="form-control"
                                    value="{{ $product->price_range }}" required />
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group mb-2">
                                <label for="brand">Brand</label>
                                <select name="brand"
                                    class="select2 form-control form-control-lg select2-hidden-accessible"
                                    id="brand" required>
                                    <option value=""></option>
                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand->id }}"
                                            {{ $brand->id == $product->brand_id ? 'selected' : '' }}>
                                            {{ $brand->name }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group mb-2">
                                <label for="status">Status</label>
                                <select name="status"
                                    class="select2 form-control form-control-lg select2-hidden-accessible"
                                    id="status">
                                    <option value=""></option>
                                    <option {{ $product->status_id == 1 ? 'selected' : '' }} value="1"> Active
                                    </option>
                                    <option {{ $product->status_id == 2 ? 'selected' : '' }} value="2"> InActive
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-12 col-12">
                            <div class="form-group mb-2">
                                <label for="specification">Specification</label>
                                <div class="field_wrapper">
                                    @php
                                        $i =1;
                                    @endphp
                                    @foreach (json_decode($product->specification, true) as $item => $value)
                                        <div class="row product-row">
                                            <div class="col-md-12 col-12 d-flex">
                                                <div class="m-1">
                                                    <label for="key">Key</label>
                                                    <input type="text" name="specification[{{$i}}][key]"
                                                        value="{{ $item }}" required class="form-control">
                                                </div>

                                                <div class="m-1">
                                                    <label for="value">Value</label>
                                                    <input type="text" name="specification[{{$i}}][value]"
                                                        value="{{ $value }}" class="form-control">
                                                </div>
                                                @if($i == 1)
                                                    <a href="javascript:;" class="add_button add-more ">+</a>
                                                @else
                                                    <a href="javascript:;" class="remove-more remove_button" >-</a>
                                                @endif
                                                <span class="d-none">{{$i++}}</span>
                                            </div>
                                        </div>
                                    @endforeach
                                  
                                </div>
                            </div>
                        </div>

                        {{-- <div class="card-body invoice-padding py-0">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group mb-2">
                                        <label for="note" class="form-label font-weight-bold">Description</label>
                                        <div id="toolbar"></div>
                                        <div id="editor">{!! $product->description !!}</div>
                                        
                                        <textarea name="description" style="display:none" id="hiddenArea"></textarea>

                                    </div>
                                </div>
                            </div>
                        </div> --}}

                        <div class="col-12">
                            <div class="form-group mb-2">
                                <label>Description</label>
                                <div id="blog-editor-wrapper">
                                    <div id="blog-editor-container">
                                        <div class="editor">
                                            {!! $product->description !!}
                                        </div>
                                        <textarea name="description" style="display:none" id="hiddenArea"></textarea>

                                    </div>
                                </div>
                            </div>
                        </div>

                        


                        <div class="col-12 mt-50">
                            <button type="submit" class="btn btn-primary mr-1">Save Changes</button>
                            <button type="button" class="btn btn-outline-secondary"
                                data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

@push('css')
    <style>
        .add-more {
            background: blue;
            color: white;
            padding: 3px 8px;
            border-radius: 20px;
            font-weight: 900;
            border: 2px solid;
            height: 30px;
            width: 30px;
            margin-top: 40px;
        }

        .remove-more {
            background: red;
            color: white;
            padding: 3px 8px;
            border-radius: 20px;
            font-weight: 900;
            border: 2px solid;
            height: 30px;
            width: 30px;
            margin-top: 40px;
        }
    </style>
@endpush

@push('js')
    <script>
        $("#add-product").on("submit", function() {
            $("#hiddenArea").val(blogEditor.root.innerHTML);
        });

        function field(x) {
            return ` <div class="row product-row">
                        <div class="col-md-12 col-12 d-flex">
                            <div class="m-1">
                                <label for="key">Key</label>
                                <input type="text" name="specification[${x}][key]" class="form-control">
                            </div>
                            <div class="m-1">
                                <label for="value">Value</label>
                                <input type="text" name="specification[${x}][value]" class="form-control">
                            </div>
                            <a href="javascript:;" class="remove-more remove_button" >-</a>
                        </div>
                    </div>`;

        }


        $(document).ready(function() {

            var maxField = 20; //Input fields increment limitation
            var addButton = $('.add_button'); //Add button selector
            var wrapper = $('.field_wrapper'); //Input field wrapper
            var x = {{count(json_decode($product->specification, true))+1}};

            //Once add button is clicked
            $(addButton).click(function() {
                //Check maximum number of input fields
                if (x < maxField) {
                    //Increment field counter
                    $(wrapper).append(field(x)); //Add field html
                    x++;
                }
            });

            //Once remove button is clicked
            $(wrapper).on('click', '.remove_button', function(e) {
                e.preventDefault();
                $(this).closest('.product-row').remove();
            });
        });
    </script>
@endpush
