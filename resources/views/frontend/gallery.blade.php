@extends('frontend.layouts.master')

@section('title', 'Gallery')

@section('content')

    @push('css')
        <link href="{{ asset('frontend/assets/css/main.css') }}" rel="stylesheet">
    @endpush
    <main id="main" data-aos="fade" data-aos-delay="1500">
        <div class="page-header d-flex align-items-center">
            <div class="container position-relative">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-6 text-center">
                        <h2>Product List</h2>
                    </div>
                </div>
            </div>
        </div>

        <section id="gallery" class="gallery">
            <div class="container-fluid">
                <div class="row gy-4 justify-content-center">
                    @php
                        $products = ['gallery-1.jpg', 'gallery-2.jpg', 'gallery-3.jpg', 'gallery-4.jpg', 'gallery-5.jpg', 'gallery-6.jpg', 'gallery-7.jpg', 'gallery-8.jpg', 'gallery-9.jpg', 'gallery-10.jpg', 'gallery-11.jpg', 'gallery-12.jpg', 'gallery-13.jpg', 'gallery-14.jpg', 'gallery-15.jpg', 'gallery-16.jpg'];
                    @endphp
                    @foreach ($products as $item)
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="gallery-item h-100">
                                <img src="{{ asset('frontend/assets/img/gallery') }}/{{ $item }}" class="img-fluid"
                                    alt="">
                                <div class="gallery-links d-flex align-items-center justify-content-center">
                                    <a href="{{ asset('frontend/assets/img/gallery') }}/{{ $item }}"
                                        title="{{ $item }}" class="glightbox preview-link"><i
                                            class="bi bi-arrows-angle-expand"></i></a>
                                    <a href="{{ route('product.details.view') }}" class="details-link"><i
                                            class="bi bi-link-45deg"></i></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </main>

    @push('js')
        <script src="{{ asset('frontend/assets/js/main.js') }}"></script>
    @endpush
@endsection
