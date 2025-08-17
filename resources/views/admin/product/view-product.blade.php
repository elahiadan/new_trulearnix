@extends('admin.layouts.app')

@section('title', 'Course Details')


@section('content')


<!-- BEGIN: Content-->
<div class="content-wrapper">
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-left mb-0">Course Details</h2>
                </div>
            </div>
        </div>

    </div>
    <div class="content-body">
        <!-- account setting page -->
        <section id="page-account-settings">
            <div class="row">
                <!-- left menu section -->
                <div class="col-md-3 mb-2 mb-md-0">
                    <ul class="nav nav-pills flex-column nav-left">
                        <!-- general -->
                        <li class="nav-item">
                            <a class="nav-link active" id="account-pill-general" data-toggle="pill"
                                href="#account-vertical-general" aria-expanded="true">
                                <i data-feather="user" class="font-medium-3 mr-1"></i>
                                <span class="font-weight-bold">General</span>
                            </a>
                        </li>


                    </ul>
                </div>
                <!--/ left menu section -->

                <!-- right content section -->
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-body">
                            <div class="tab-content">
                                <!-- general tab -->
                                <div role="tabpanel" class="tab-pane active" id="account-vertical-general"
                                    aria-labelledby="account-pill-general" aria-expanded="true">
                                    <!-- header media -->
                                    <a href="javascript:void(0);" class="mr-25">
                                        <img src="{{ asset('images/product') }}/{{ $product->thumbnail_img ? $product->thumbnail_img : 'logo1.png' }}" id="account-upload-img" class="rounded mr-50" alt="profile image" height="200" width="300" />
                                    </a>
                                    <!-- upload and reset button -->
                                    <form action="{{ route('products.upload.image') }}" id="newAvatar"
                                        enctype="multipart/form-data" method="POST">
                                        @csrf
                                        <div class="media-body mt-75 ml-1">
                                            <input type="hidden" name="course_id" value="{{ $product->id }}">
                                            <label for="account-upload"
                                                class="btn btn-sm btn-primary mb-75 mr-75">choose</label>
                                            <input type="file" onchange="changeAvatar()" id="account-upload"
                                                name="thumbnail_img" hidden accept="image/*" />
                                        </div>
                                    </form>
                                    <!--/ header media -->

                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Course Details</h4>
                                            <div class="heading-elements">
                                                <ul class="list-inline mb-0">
                                                    <li>
                                                        <button onclick="productEdit()"
                                                            class="btn-icon btn btn-primary btn-round btn-sm"
                                                            type="button">
                                                            <i class="mr-50" data-feather="edit"></i>
                                                        </button>
                                                    </li>

                                                    <li>
                                                        <a data-action="collapse" class="">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="14"
                                                                height="14" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-chevron-down">
                                                                <polyline points="6 9 12 15 18 9">
                                                                </polyline>
                                                            </svg>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="card-content collapse show">
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <div class="card shadow-none bg-transparent border-primary">

                                                        <div class="d-flex">
                                                            <div class="card-body col-lg-6">
                                                                <h4 class="card-title">Title</h4>
                                                                <p class="card-text">{{ $product->title }}
                                                                </p>
                                                            </div>

                                                            <div class="card-body col-lg-6">
                                                                <h4 class="card-title">Sub-Title</h4>
                                                                <p class="card-text">{{ $product->subtitle }}
                                                                </p>
                                                            </div>
                                                        </div>

                                                        <div class="d-flex">
                                                            <div class="card-body col-lg-6">
                                                                <h4 class="card-title">Slug</h4>
                                                                <p class="card-text">{{ $product->slug }}
                                                                </p>
                                                            </div>

                                                            <div class="card-body col-lg-6">
                                                                <h4 class="card-title">Category</h4>
                                                                <p class="card-text">{{ $product->categories->name }}
                                                                </p>
                                                            </div>
                                                        </div>

                                                        <div class="d-flex">
                                                            <div class="card-body col-lg-6">
                                                                <h4 class="card-title">Level</h4>
                                                                <p class="card-text">
                                                                    {{ $product->level }}
                                                                </p>
                                                            </div>

                                                            <div class="card-body col-lg-6">
                                                                <h4 class="card-title">Language</h4>
                                                                <p class="card-text">{{ $product->language }}
                                                                </p>
                                                            </div>
                                                        </div>

                                                        <div class="d-flex">
                                                            <div class="card-body col-lg-6">
                                                                <h4 class="card-title">Mode</h4>
                                                                <p class="card-text">{{ $product->mode_of_class }}
                                                                </p>
                                                            </div>
                                                            <div class="card-body col-lg-6">
                                                                <h4 class="card-title">Status</h4>
                                                                <p class="card-text">
                                                                    @if ($product->status == 1)
                                                                    Active
                                                                    @else
                                                                    Draft
                                                                    @endif
                                                                </p>
                                                            </div>
                                                        </div>

                                                        <div class="d-flex">
                                                            <div class="card-body col-lg-6">
                                                                <h4 class="card-title">Price</h4>
                                                                <p class="card-text">{{ $product->price }}
                                                                </p>
                                                            </div>
                                                            <div class="card-body col-lg-6">
                                                                <h4 class="card-title">Discount Type</h4>
                                                                <p class="card-text">
                                                                    {{$product->discount_type}}
                                                                </p>
                                                            </div>
                                                        </div>

                                                        <div class="d-flex">
                                                            <div class="card-body col-lg-6">
                                                                <h4 class="card-title">Discount</h4>
                                                                <p class="card-text">{{ $product->discount }}
                                                                </p>
                                                            </div>
                                                            <div class="card-body col-lg-6">
                                                                <h4 class="card-title">Discount Price</h4>
                                                                <p class="card-text">
                                                                    {{$product->actual_price}}
                                                                </p>
                                                            </div>
                                                        </div>

                                                        <div class="d-flex">
                                                            <div class="card-body col-lg-6">
                                                                <h4 class="card-title">Commission Type</h4>
                                                                <p class="card-text">{{ $product->commission_type }}
                                                                </p>
                                                            </div>
                                                            <div class="card-body col-lg-6">
                                                                <h4 class="card-title">Commission Value</h4>
                                                                <p class="card-text">
                                                                    {{$product->commission}}
                                                                </p>
                                                            </div>
                                                        </div>

                                                         <div class="d-flex">
                                                            <div class="card-body col-lg-6">
                                                                <h4 class="card-title">Expected Commission</h4>
                                                                <p class="card-text">{{ $product->total_commission }}
                                                                </p>
                                                            </div>
                                                            <!-- <div class="card-body col-lg-6">
                                                                <h4 class="card-title">Expected Commission</h4>
                                                                <p class="card-text">
                                                                    {{$product->total_commission}}
                                                                </p>
                                                            </div> -->
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title">Description & Specification</h4>
                                                <div class="heading-elements">
                                                    <ul class="list-inline mb-0">
                                                        <li>
                                                            <a data-action="collapse"><svg
                                                                    xmlns="http://www.w3.org/2000/svg" width="14"
                                                                    height="14" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-chevron-down">
                                                                    <polyline points="6 9 12 15 18 9">
                                                                    </polyline>
                                                                </svg></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="card-content collapse show">
                                                <div class="card-body">
                                                    <div class="table-responsive">
                                                        <div class="card shadow-none bg-transparent border-primary">
                                                            <div class="card-body col-lg-12">
                                                                <h4 class="card-title">Specification</h4>
                                                                @foreach (json_decode($product->specification, true) as $item => $value)
                                                                <div class="d-flex">
                                                                    <div class="col-lg-6">
                                                                        <p class="card-title">
                                                                            {{ $item }}
                                                                        </p>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <p class="card-title">
                                                                            {{ $value }}
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                @endforeach
                                                            </div>

                                                            <div class="card-body col-lg-12">
                                                                <h4 class="card-title">Description</h4>
                                                                <p class="card-text">{!! $product->description !!}
                                                                </p>
                                                            </div>

                                                            <div class="card-body col-lg-12">
                                                                <h4 class="card-title">Content</h4>
                                                                <p class="card-text">{!! $product->content !!}
                                                                </p>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

<!-- END: Content-->
@include('admin.product.edit-product')
@endsection

@push('js')
<script>
    // PROFILE EDIT
    function productEdit() {
        $el = $("#edit-product");
        $el.modal("show");
    }

    function changeAvatar() {
        $("#newAvatar").submit();
    }
</script>
@endpush