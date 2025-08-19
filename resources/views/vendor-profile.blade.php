@extends('layouts.master')

@section('title', 'Home Page')

@section('content')

    @push('css')
        <style>
            body {
                color: #6F8BA4;
                margin-top: 20px;
            }

            .section {
                padding: 100px 0;
                position: relative;
            }

            .gray-bg {
                background-color: #f5f5f5;
            }

            img {
                max-width: 100%;
            }

            img {
                vertical-align: middle;
                border-style: none;
            }

            /* About Me
                                                                                                        ---------------------*/
            .about-text h3 {
                font-size: 45px;
                font-weight: 700;
                margin: 0 0 6px;
            }

            @media (max-width: 767px) {
                .about-text h3 {
                    font-size: 35px;
                }
            }

            .about-text h6 {
                font-weight: 600;
                margin-bottom: 15px;
            }

            @media (max-width: 767px) {
                .about-text h6 {
                    font-size: 18px;
                }
            }

            .about-text p {
                font-size: 18px;
                max-width: 450px;
            }

            .about-text p mark {
                font-weight: 600;
                color: #20247b;
            }

            .about-list {
                padding-top: 10px;
            }

            .about-list .media {
                padding: 5px 0;
            }

            .about-list label {
                color: #20247b;
                font-weight: 600;
                width: 88px;
                margin: 0;
                position: relative;
            }

            .about-list label:after {
                content: "";
                position: absolute;
                top: 0;
                bottom: 0;
                right: 11px;
                width: 1px;
                height: 12px;
                background: #20247b;
                -moz-transform: rotate(15deg);
                -o-transform: rotate(15deg);
                -ms-transform: rotate(15deg);
                -webkit-transform: rotate(15deg);
                transform: rotate(15deg);
                margin: auto;
                opacity: 0.5;
            }

            .about-list p {
                margin: 0;
                font-size: 15px;
            }

            @media (max-width: 991px) {
                .about-avatar {
                    margin-top: 30px;
                }
            }

            .about-section .counter {
                padding: 22px 20px;
                background: #ffffff;
                border-radius: 10px;
                box-shadow: 0 0 30px rgba(31, 45, 61, 0.125);
            }

            .about-section .counter .count-data {
                margin-top: 10px;
                margin-bottom: 10px;
            }

            .about-section .counter .count {
                font-weight: 700;
                color: #20247b;
                margin: 0 0 5px;
            }

            .about-section .counter p {
                font-weight: 600;
                margin: 0;
            }

            mark {
                background-image: linear-gradient(rgba(252, 83, 86, 0.6), rgba(252, 83, 86, 0.6));
                background-size: 100% 3px;
                background-repeat: no-repeat;
                background-position: 0 bottom;
                background-color: transparent;
                padding: 0;
                color: currentColor;
            }

            .theme-color {
                color: #fc5356;
            }

            .dark-color {
                color: #20247b;
            }
        </style>
    @endpush


    <section class="section about-section gray-bg" id="about">
        <div class="container">
            <div class="row counter gx-0">
                <div class="col-lg-6">
                    <div class="about-avatar text-center">
                        <img class="w-90"
                            src="{{ asset('images/vendor/profile/') }}/{{ $data->image ? $data->image : 'logo1.png' }}"
                            title="" alt="">
                    </div>
                </div>
                <div class="col-lg-6 counter">
                    <div class="about-text go-to">
                        <h3 class="dark-color">{{ $data->name }}</h3>
                        <h6 class="theme-color lead">{{ $data->organization }}</h6>
                        <small>{{ strlen($data->about) > 250 ? substr($data->about, 0, 250) . '...' : $data->about }}
                        </small><span data-bs-toggle="modal" data-bs-target="#vendorAbout" role="button"
                            class="badge bg-dark cursor">show more</span>
                        <div class="row about-list">
                            <div class="col-md-6">
                                <div class="media d-flex">
                                    <label>Email</label>
                                    <p>{{ $data->email }}</p>
                                </div>
                                <div class="media d-flex">
                                    <label>Contact</label>
                                    <p>{{ $data->contact }}</p>
                                </div>
                                <div class="media d-flex">
                                    <label>Estd Year</label>
                                    <p>{{ $data->establishment_year }}</p>
                                </div>
                                <div class="media d-flex">
                                    <label>Business Type</label>
                                    <p>{{ $data->business_type }}</p>
                                </div>
                                <div class="media d-flex">
                                    <label>State</label>
                                    <p>{{ $data->state }}</p>
                                </div>
                                <div class="media d-flex">
                                    <label>Country</label>
                                    <p>{{ $data->country }}</p>
                                </div>
                                <div class="media d-flex">
                                    <label>Address</label>
                                    <p>{{ $data->strret }} {{ $data->city }}</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>


            <div class="counter">
                <div class="row">

                    @foreach ($products as $product)
                        <div class="col-lg-3">
                            <div class="product-details w-100 rounded-1 overflow-hidden bg-white p-4 position-relative">
                                <a href="{{ route('products.details', ['id' => encrypt($product->id)]) }}">
                                    <div class="product-image w-100">
                                        <img src="{{ asset('images/product') }}/{{ $product->image ? $product->image : 'logo1.png' }}"
                                            alt="" class="w-100" style="height: 300px;">
                                    </div>
                                </a>
                                <div class="product-description text-center">
                                    <ul>

                                        <li class="d-flex align-items-center flex-column text-center mb-3">
                                            <a href="{{ route('products.details', ['id' => encrypt($product->id)]) }}"
                                                class="text-danger fw-normal fs-5 product-title" data-toggle="tooltip"
                                                data-placement="bottom"
                                                title="{{ $product->name }}">{{ $product->name }}</a>
                                            <strong class="fs-5 fw-bold">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-currency-rupee mb-1 icon-w-22"
                                                    width="44" height="20" viewBox="0 0 24 24" stroke-width="1.9"
                                                    stroke="#000000" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M18 5h-11h3a4 4 0 0 1 0 8h-3l6 6" />
                                                    <line x1="7" y1="9" x2="18" y2="9" />
                                                </svg>
                                                {{ $product->price_range }}
                                            </strong>
                                        </li>
                                        <li>
                                            <div class="address">
                                                <span class="store-name"><a
                                                        href="{{ route('vendors.profile', ['id' => encrypt($product->users->id)]) }}"
                                                        class="text-decoration-underline">
                                                        {{ $product->users->organization }}</a></span>
                                                <br>

                                            </div>
                                        </li>
                                        <li>
                                            <div class="get-quotes">
                                                <a href="javascript:;" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal1{{ $product->id }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="icon icon-tabler icon-tabler-phone-call icon-w-22"
                                                        width="44" height="44" viewBox="0 0 24 24" stroke-width="0"
                                                        stroke="#dc3545" fill="#dc3545" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path
                                                            d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2" />
                                                        <path d="M15 7a2 2 0 0 1 2 2" />
                                                        <path d="M15 3a6 6 0 0 1 6 6" />
                                                    </svg>
                                                    <span class="text-danger fw-bold">View Mobile
                                                        Number</span>
                                                </a>
                                                <button class="btn btn-success btn-theme-yellow rounded-1 fw-bold"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal1{{ $product->id }}">Contact
                                                    Supplier
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="icon icon-tabler icon-tabler-chevron-right icon-w-22"
                                                        width="44" height="20" viewBox="0 0 24 24" stroke-width="2"
                                                        stroke="#000" fill="none" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <polyline points="9 6 15 12 9 18" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        @include('websites::pages.modal-form-contact', [
                            'sno' => 1,
                            'id' => $product->id,
                            'image' => $product->image,
                            'description' => $product->description,
                        ])
                    @endforeach

                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="vendorAbout" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="vendorAboutLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-dark" id="vendorAboutLabel">About</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body mx-4 my-1 text-dark fst-normal" style="text-align: justify;font-size: 17px;">
                        {!! $data->about !!}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
