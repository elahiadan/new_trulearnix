@extends('admin.layouts.app')

@section('title','Edit Page')

@section('row')
<div class="content-header-left col-md-9 col-12 mb-2">
    <div class="row breadcrumbs-top">
        <div class="col-12">
            <h2 class="content-header-title float-left mb-0">Page Edit</h2>

        </div>
    </div>
</div>
@endsection

@section('content')

<!-- pricing Edit -->
<div class="pricing-edit-wrapper">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <!-- Form -->
                    <form enctype="multipart/form-data" id="pricing_edit_form" action="{{ route('cms.update') }}" method="POST" class="mt-2">
                        @csrf
                        <input type="hidden" name="id" value="{{$pages->id}}">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-2">
                                    <label>Content</label>
                                    <div id="blog-editor-wrapper">
                                        <div id="blog-editor-container">
                                            <div class="editor">
                                                {!! $pages->page !!}
                                            </div>
                                            <textarea name="cmsContent" style="display:none" id="hiddenArea"></textarea>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mt-50">
                                <button type="submit" class="btn btn-primary mr-1">Save Changes</button>
                                <a href="{{route('cms')}}" type="reset" class="btn btn-outline-secondary">Cancel</a>
                            </div>
                        </div>
                    </form>
                    <!--/ Form -->
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ pricing Edit -->

@endsection

@push('js')
<script>
    $("#pricing_edit_form").on("submit", function() {
        $("#hiddenArea").val(blogEditor.root.innerHTML);
    });
</script>
@endpush