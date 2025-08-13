@extends('admin.layouts.app')

@section('title', 'Product Details')


@section('content')


    <!-- BEGIN: Content-->
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Product Details</h2>
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
                                            <img src="{{ asset('images/product') }}/{{ $product->image ? $product->image : 'logo1.png' }}"
                                                id="account-upload-img" class="rounded mr-50" alt="profile image"
                                                height="80" width="80" />
                                        </a>
                                        <!-- upload and reset button -->
                                        <form action="{{ route('products.upload.image') }}" id="newAvatar"
                                            enctype="multipart/form-data" method="POST">
                                            @csrf
                                            <div class="media-body mt-75 ml-1">
                                                <input type="hidden" name="userid" value="{{ $product->id }}">
                                                <label for="account-upload"
                                                    class="btn btn-sm btn-primary mb-75 mr-75">choose</label>
                                                <input type="file" onchange="changeAvatar()" id="account-upload"
                                                    name="profile-image" hidden accept="image/*" />
                                            </div>
                                        </form>
                                        <!--/ header media -->

                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title">product Details</h4>
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
                                            <div class="card-content collapse show" style="">
                                                <div class="card-body">
                                                    <div class="table-responsive">
                                                        <div class="card shadow-none bg-transparent border-primary">

                                                            <div class="d-flex">
                                                                <div class="card-body col-lg-6">
                                                                    <h4 class="card-title">Product Name</h4>
                                                                    <p class="card-text">{{ $product->name }}
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
                                                                    <h4 class="card-title">Vendor</h4>
                                                                    <p class="card-text">
                                                                        {{ $product->users->organization }}
                                                                    </p>
                                                                </div>

                                                                <div class="card-body col-lg-6">
                                                                    <h4 class="card-title">Brand</h4>
                                                                    <p class="card-text">{{ $product->brands->name }}
                                                                    </p>
                                                                </div>
                                                            </div>

                                                            <div class="d-flex">
                                                                <div class="card-body col-lg-6">
                                                                    <h4 class="card-title">Price</h4>
                                                                    <p class="card-text">{{ $product->price_range }}
                                                                    </p>
                                                                </div>
                                                                <div class="card-body col-lg-6">
                                                                    <h4 class="card-title">Status</h4>
                                                                    <p class="card-text">
                                                                        {{ $product->statuses->name }}
                                                                    </p>
                                                                </div>

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
                                                                <a data-action="collapse" class=""><svg
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
                                                <div class="card-content collapse show" style="">
                                                    <div class="card-body">
                                                        <div class="table-responsive">
                                                            <div class="card shadow-none bg-transparent border-primary">
                                                                <div class="card-body col-lg-12">
                                                                    <h4 class="card-title">Specification</h4>
                                                                    @foreach (json_decode($product->specification, true) as $item => $value)
                                                                        <div class="d-flex">
                                                                            <div class="col-lg-6">
                                                                                <p class="card-title">
                                                                                    {{ $item }} :</p>
                                                                            </div>
                                                                            <div class="col-lg-6">
                                                                                <p class="card-title">
                                                                                    {{ $value }}</p>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                </div>

                                                                <div class="card-body col-lg-12">
                                                                    <h4 class="card-title">Description</h4>
                                                                    <p class="card-text">{!! $product->description !!}
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
    @include('products::product.edit-product')
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
