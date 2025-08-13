@extends('admin.layouts.app')

@section('title', 'Create Homepage Product List')

@section('row')
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">Create User</h2>

            </div>
        </div>
    </div>
@endsection

@section('content')

    @push('css')
        <style>
            .select2-container .select2-selection--multiple .select2-selection__rendered {
                display: inherit !important;
            }
        </style>
    @endpush

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
                        <form enctype="multipart/form-data" id="add-product" action="{{ route('homepages.store') }}"
                            method="POST" class="mt-2">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group mb-2">
                                        <label for="title">Title</label>
                                        <input name="title" type="text" id="title" class="form-control" required />
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group mb-2">
                                        <label for="link">Link</label>
                                        <textarea name="link" id="link" class="form-control" required></textarea>
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group mb-2">
                                        <label for="product">Product</label>
                                        <select name="product[]"
                                            class="select2 form-control form-control-lg select2-hidden-accessible"
                                            id="product" required multiple>
                                            <option value=""></option>
                                            @foreach ($products as $product)
                                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group mb-2">
                                        <label for="view_type">View Type</label>
                                        <select name="view_type"
                                            class="select2 form-control form-control-lg select2-hidden-accessible"
                                            id="view_type" required>
                                            <option value=""></option>
                                            <option value="1">List Style 1</option>
                                            <option value="2">List Style 2</option>
                                            <option value="3">List Style 3</option>
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

                                <div class="col-12 mt-50">
                                    <button type="submit" class="btn btn-primary mr-1">Save Changes</button>
                                    <a href="{{ route('homepages') }}" type="reset"
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

            var maxField = 10; //Input fields increment limitation
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
