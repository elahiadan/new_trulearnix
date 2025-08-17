<div class="modal fade text-left" id="edit-product" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Edit Course</h4>
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
                                <label for="title">Title</label>
                                <input name="title" type="text" id="title" class="form-control" value="{{ $product->title }}" required />
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group mb-2">
                                <label for="subtitle">Sub-Title</label>
                                <input name="subtitle" type="text" id="subtitle" class="form-control" value="{{ $product->subtitle }}" required />
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group mb-2">
                                <label for="description">Description</label>
                                <textarea data-length="200" class="form-control char-textarea" id="description" rows="3" placeholder="Description" name="description">{{ $product->description }}</textarea>
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group mb-2">
                                <label for="slug">Slug</label>
                                <input type="text" name="slug" id="slug" class="form-control" value="{{ $product->slug }}" required />
                            </div>
                        </div>

                        <div class="col-md-4 col-12">
                            <div class="form-group mb-2">
                                <label for="category">Category</label>
                                <select name="category" class="select2 form-control form-control-lg select2-hidden-accessible" id="category" required>
                                    <option value=""></option>
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
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
                                    <option value="{{ $courseLevel }}" {{ $courseLevel == $product->level ? 'selected' : '' }}>{{ $courseLevel }}</option>
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
                                    <option value="{{ $language }}" {{ $language == $product->language ? 'selected' : '' }}>{{ $language }}</option>
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
                                    <option value="{{ $mode }}" {{ $mode == $product->mode_of_class ? 'selected' : '' }}>{{ $mode }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4 col-12"></div>
                        <div class="col-md-4 col-12"></div>

                        <div class="col-md-4 col-12">
                            <div class="form-group mb-2">
                                <label for="price">Price</label>
                                <input type="number" name="price" id="price" class="form-control" value="{{ $product->price }}" required />
                            </div>
                        </div>

                        <div class="col-md-4 col-12">
                            <div class="form-group mb-2">
                                <label for="discount_type">Discount Type</label>
                                <select name="discount_type" class="select2 form-control form-control-lg select2-hidden-accessible" id="discount_type" required>
                                    <option value=""></option>
                                    <option {{ $product->discount_type == 'fixed' ? 'selected' : '' }} value="fixed"> Fixed</option>
                                    <option {{ $product->discount_type == 'percent' ? 'selected' : '' }} value="percent"> Percent</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4 col-12">
                            <div class="form-group mb-2">
                                <label for="discount">Discount</label>
                                <input type="number" name="discount" id="discount" class="form-control" value="{{ $product->discount }}" required />
                            </div>
                        </div>

                        <div class="col-md-4 col-12">
                            <div class="form-group mb-2">
                                <label for="discount_price">Actual Price</label>
                                <input type="number" id="discount_price" class="form-control" value="{{ $product->actual_price }}" disabled />
                            </div>
                        </div>

                        <div class="col-md-4 col-12"></div>
                        <div class="col-md-4 col-12"></div>

                        <div class="col-md-4 col-12">
                            <div class="form-group mb-2">
                                <label for="commission_type">Commission Type</label>
                                <select name="commission_type" class="select2 form-control form-control-lg select2-hidden-accessible" id="course_commission_type" required>
                                    <option value=""></option>
                                    <option {{ $product->commission_type == 'fixed' ? 'selected' : '' }} value="fixed"> Fixed</option>
                                    <option {{ $product->commission_type == 'percent' ? 'selected' : '' }} value="percent"> Percent</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4 col-12">
                            <div class="form-group mb-2">
                                <label for="commission">Commission Value</label>
                                <input type="number" name="commission" id="commission" class="form-control" value="{{ $product->commission }}" required />
                            </div>
                        </div>

                        <div class="col-md-4 col-12">
                            <div class="form-group mb-2">
                                <label for="total_commission">Expected Commission</label>
                                <input type="number" id="total_commission" class="form-control" value="{{ $product->total_commission }}" disabled />
                            </div>
                        </div>

                        <div class="col-md-4 col-12">
                            <div class="form-group mb-2">
                                <label for="status">Status</label>
                                <select name="status" class="select2 form-control form-control-lg select2-hidden-accessible" id="status">
                                    <option value=""></option>
                                    <option {{ $product->status == 1 ? 'selected' : '' }} value="1"> Active</option>
                                    <option {{ $product->status == 2 ? 'selected' : '' }} value="2"> InActive</option>
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
                                            <a href="javascript:;" class="remove-more remove_button">-</a>
                                            @endif
                                            <span class="d-none">{{$i++}}</span>
                                        </div>
                                    </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group mb-2">
                                <label for="content" class="form-label font-weight-bold">Content</label>
                                <div id="blog-editor-wrapper">
                                    <div id="blog-editor-container">
                                        <div class="editor">
                                            {!! $product->content !!}
                                        </div>
                                        <textarea name="content" style="display:none" id="hiddenArea"></textarea>

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

        var maxField = 20;
        var addButton = $('.add_button');
        var wrapper = $('.field_wrapper');
        var x = {{count(json_decode($product->specification, true)) + 1}};

        $(addButton).click(function() {
            if (x < maxField) {
                $(wrapper).append(field(x));
                x++;
            }
        });

        $(wrapper).on('click', '.remove_button', function(e) {
            e.preventDefault();
            $(this).closest('.product-row').remove();
        });
    });
</script>
@endpush