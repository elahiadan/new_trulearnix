@extends('admin.layouts.app')

@section('title', 'Create User')

@section('row')
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">Add Product</h2>

            </div>
        </div>
    </div>
@endsection

@section('content')

    <!-- Blog Edit -->
    <div class="blog-edit-wrapper">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <!-- Form -->
                        <form enctype="multipart/form-data" id="add-product" action="{{ route('products.store') }}"
                            method="POST" class="mt-2">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group mb-2">
                                        <label for="name">Name</label>
                                        <input name="name" type="text" id="name" class="form-control" required />
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
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
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
                                                <option value="{{ $vendor->id }}">{{ $vendor->organization }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group mb-2">
                                        <label for="price">Price</label>
                                        <input name="price" type="text" id="price" class="form-control" required />
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group mb-2">
                                        <label for="account-upload">choose</label>
                                        <input type="file" id="account-upload" name="profile-image" accept="image/*"
                                            class="form-control" />
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
                                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group mb-2">
                                        <label for="status">Status</label>
                                        <select name="status"
                                            class="select2 form-control form-control-lg select2-hidden-accessible"
                                            id="status" required>
                                            <option value=""></option>
                                            <option value="1">Active</option>
                                            <option value="2">InActive</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="card-body invoice-padding py-0">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group mb-2">
                                                <label for="note"
                                                    class="form-label font-weight-bold">Description</label>
                                                <div id="toolbar"></div>
                                                <div id="editor"></div>
                                                <textarea name="description" style="display:none" id="hiddenArea"></textarea>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 col-12">
                                    <div class="form-group mb-2">
                                        <label for="specification">Specification</label>
                                        <div class="field_wrapper">
                                            <div class="row">
                                                <div class="col-md-6 col-12 d-flex">
                                                    <div class="m-1">
                                                        <label for="key">Key</label>
                                                        <input type="text" name="specification[0][key]"
                                                            class="form-control" required>
                                                    </div>

                                                    <div class="m-1">
                                                        <label for="value">Value</label>
                                                        <input type="text" name="specification[0][value]"
                                                            class="form-control">
                                                    </div>


                                                    <a href="javascript:;" class="add_button add-more ">+</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>




                                <div class="col-12 mt-50">
                                    <button type="submit" class="btn btn-primary mr-1">Save Changes</button>
                                    <a href="{{ route('products', ['id' => 1]) }}" type="reset"
                                        class="btn btn-outline-secondary">Cancel</a>
                                </div>
                            </div>
                        </form>
                        <!--/ Form -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ Blog Edit -->
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
@endsection


@push('js')
    <script>
        $("#add-product").on("submit", function() {
            $("#hiddenArea").val(editor.root.innerHTML);
        });

        function field(x) {
            return ` <div class="row product-row">
                        <div class="col-md-6 col-12 d-flex">
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
            var x = 1;

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
