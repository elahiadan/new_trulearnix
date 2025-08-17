@extends('admin.layouts.app')

@section('title', 'Create Course')

@section('row')
<div class="content-header-left col-md-9 col-12 mb-2">
    <div class="row breadcrumbs-top">
        <div class="col-12">
            <h2 class="content-header-title float-left mb-0">Add Course</h2>

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
                                    <label for="title">Title</label>
                                    <input name="title" type="text" id="title" class="form-control" required />
                                </div>
                            </div>

                            <div class="col-md-6 col-12">
                                <div class="form-group mb-2">
                                    <label for="subtitle">Sub Title</label>
                                    <input name="subtitle" type="text" id="subtitle" class="form-control" required />
                                </div>
                            </div>

                            <div class="col-md-6 col-12">
                                <div class="form-group mb-2">
                                    <label for="description">Description</label>
                                    <textarea data-length="200" class="form-control char-textarea" id="description" rows="3" placeholder="Description" name="description"> </textarea>
                                </div>
                            </div>

                            <div class="col-md-6 col-12">
                                <div class="form-group mb-2">
                                    <label for="slug">Slug</label>
                                    <input type="text" name="slug" id="slug" class="form-control" required />
                                </div>
                            </div>

                            <div class="col-md-4 col-12">
                                <div class="form-group mb-2">
                                    <label for="category">Category</label>
                                    <select name="category"
                                        class="select2 form-control form-control-lg select2-hidden-accessible" id="category" required>
                                        <option value=""></option>
                                        @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            @php
                            $courseLevels = ['Beginner', 'Intermediate', 'Expert'];
                            $languages = ['English', 'Hindi', 'Hinglish'];
                            $modes = ['Online', 'Offline'];
                            @endphp

                            <div class="col-md-4 col-12">
                                <div class="form-group mb-2">
                                    <label for="level">Level</label>
                                    <select name="level" class="select2 form-control form-control-lg select2-hidden-accessible" id="level" required>
                                        <option value=""></option>
                                        @foreach ($courseLevels as $courseLevel)
                                        <option value="{{ $courseLevel }}">{{ $courseLevel }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4 col-12">
                                <div class="form-group mb-2">
                                    <label for="language">Language</label>
                                    <select name="language" class="select2 form-control form-control-lg select2-hidden-accessible" id="language" required>
                                        <option value=""></option>
                                        @foreach ($languages as $language)
                                        <option value="{{ $language }}">{{ $language }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4 col-12">
                                <div class="form-group mb-2">
                                    <label for="mode_of_class">Mode</label>
                                    <select name="mode_of_class" class="select2 form-control form-control-lg select2-hidden-accessible" id="mode_of_class">
                                        <option value=""></option>
                                        @foreach ($modes as $mode)
                                        <option value="{{ $mode }}">{{ $mode }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4 col-12"></div>
                            <div class="col-md-4 col-12"></div>

                            <div class="col-md-4 col-12">
                                <div class="form-group mb-2">
                                    <label for="price">Price</label>
                                    <input type="number" name="price" id="price" class="form-control" required />
                                </div>
                            </div>

                            <div class="col-md-4 col-12">
                                <div class="form-group mb-2">
                                    <label for="discount_type">Discount Type</label>
                                    <select name="discount_type" class="select2 form-control form-control-lg select2-hidden-accessible" id="discount_type" required>
                                        <option value=""></option>
                                        <option value="fixed">Fixed</option>
                                        <option value="percent">Percent</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4 col-12">
                                <div class="form-group mb-2">
                                    <label for="discount">Discount</label>
                                    <input type="number" name="discount" id="discount" class="form-control" required />
                                </div>
                            </div>

                            <div class="col-md-4 col-12">
                                <div class="form-group mb-2">
                                    <label for="discount_price">Discount Price</label>
                                    <input type="number" name="discount_price" id="discount_price" class="form-control" required />
                                </div>
                            </div>

                            <div class="col-md-4 col-12"></div>
                            <div class="col-md-4 col-12"></div>

                            <div class="col-md-4 col-12">
                                <div class="form-group mb-2">
                                    <label for="commission_type">Commission Type</label>
                                    <select name="commission_type" class="select2 form-control form-control-lg select2-hidden-accessible" id="course_commission_type" required>
                                        <option value=""></option>
                                        <option value="fixed">Fixed</option>
                                        <option value="percent">Percent</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4 col-12">
                                <div class="form-group mb-2">
                                    <label for="commission">Commission Value</label>
                                    <input type="number" name="commission" id="commission" class="form-control" required />
                                </div>
                            </div>

                            <div class="col-md-4 col-12">
                                <div class="form-group mb-2">
                                    <label for="total_commission">Expected Commission</label>
                                    <input type="number" name="total_commission" id="total_commission" class="form-control" required />
                                </div>
                            </div>

                            <div class="col-md-4 col-12">
                                <div class="form-group mb-2">
                                    <label for="course_status">Status</label>
                                    <select name="status" class="select2 form-control form-control-lg select2-hidden-accessible" id="course_status" required>
                                        <option value=""></option>
                                        <option value="2">Draft</option>
                                        <option value="1">Published</option>
                                    </select>
                                </div>
                            </div>

                            <div class="card-body invoice-padding py-0">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group mb-2">
                                            <label for="note" class="form-label font-weight-bold">Content</label>
                                            <div id="toolbar"></div>
                                            <div id="editor"></div>
                                            <textarea name="content" style="display:none" id="hiddenArea"></textarea>
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

                            <div class="col-12 mb-2">
                                <div class="border rounded p-2">
                                    <h4 class="mb-1">Featured Image</h4>
                                    <div class="media flex-column flex-md-row">
                                        <img src="{{ asset('admin-assets/app-assets/images/icons/jpg.png') }}" id="blog-feature-image" class="rounded mr-2 mb-1 mb-md-0"
                                            width="170" height="110" alt="Blog Featured Image" />
                                        <div class="media-body">
                                            <h5 class="mb-0">Main image:</h5>
                                            <small class="text-muted">Required image resolution 800x400, image size
                                                10mb.</small>
                                            <p class="my-50">
                                                <a href="javascript:void(0);" id="blog-image-text"></a>
                                            </p>
                                            <div class="d-inline-block">
                                                <div class="form-group mb-0">
                                                    <div class="custom-file">
                                                        <input type="file" name="thumbnail_img"
                                                            class="custom-file-input" id="blogCustomFile"
                                                            accept="image/*" />
                                                        <label class="custom-file-label" for="blogCustomFile">Choose
                                                            file</label>
                                                    </div>
                                                </div>
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