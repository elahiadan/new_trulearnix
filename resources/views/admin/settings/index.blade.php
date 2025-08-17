@extends('admin.layouts.app')

@section('title', 'Basic Info')

@section('row')
<div class="content-header-left col-md-9 col-12 mb-2">
    <div class="row breadcrumbs-top">
        <div class="col-12">
            <h2 class="content-header-title float-left mb-0">Basic Settings</h2>

        </div>
    </div>
</div>
@endsection

@section('content')
<div class="blog-edit-wrapper">
    <div class="row">


        <div class="col-12">
            <div class="card">
                <h3 class="card-header">Basic Info</h3>
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
                    <form enctype="multipart/form-data" id="basic_info" action="{{ route('settings.update') }}"
                        method="POST" class="mt-2">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="form-group mb-2">
                                    <label for="site_name">Site Name</label>
                                    <input type="hidden" name="type[]" value="site_name">
                                    <input name="site_name" type="text" id="site_name" class="form-control"
                                        value="{{ get_setting('site_name') }}" />
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group mb-2">
                                    <label for="site_title">Site Title</label>
                                    <input type="hidden" name="type[]" value="site_title">
                                    <input name="site_title" type="text" id="site_title" class="form-control"
                                        value="{{ get_setting('site_title') }}" />
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group mb-2">
                                    <label for="site_email">Email</label>
                                    <input type="hidden" name="type[]" value="site_email">
                                    <input name="site_email" type="text" id="site_email" class="form-control"
                                        value="{{ get_setting('site_email') }}" />
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group mb-2">
                                    <label for="site_address">Address</label>
                                    <input type="hidden" name="type[]" value="site_address">
                                    <input name="site_address" type="text" id="site_address" class="form-control"
                                        value="{{ get_setting('site_address') }}" />
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group mb-2">
                                    <label for="site_contact_no">Contact No.</label>
                                    <input type="hidden" name="type[]" value="site_contact_no">
                                    <input name="site_contact_no" type="text" id="site_contact_no"
                                        class="form-control" value="{{ get_setting('site_contact_no') }}" />
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group mb-2">
                                    <label for="site_whatsapp_no">WhatsApp No.</label>
                                    <input type="hidden" name="type[]" value="site_whatsapp_no">
                                    <input name="site_whatsapp_no" type="text" id="site_whatsapp_no"
                                        class="form-control" value="{{ get_setting('site_whatsapp_no') }}" />
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group mb-2">
                                    <label for="site_logo">Site Logo</label>
                                    <input type="hidden" name="type[]" value="site_logo">
                                    <input name="site_logo" type="file" class="form-control"
                                        onchange="readURL(this,'site_logo')" />
                                    <img src="{{ url('images/logos', get_setting('site_logo')) }}" id="site_logo"
                                        width="100px" />
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group mb-2">
                                    <label for="site_favicon">Site Facicon</label>
                                    <input type="hidden" name="type[]" value="site_favicon">
                                    <input name="site_favicon" type="file" class="form-control"
                                        value="{{ get_setting('site_favicon') }}" onchange="readURL(this,'site_favicon')" />
                                    <img src="{{ url('images/logos', get_setting('site_favicon')) }}"
                                        id="site_favicon" width="100px" />
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group mb-2">
                                    <label for="site_banner">Home Banner</label>
                                    <input type="hidden" name="type[]" value="site_banner">
                                    <input name="site_banner" type="file" class="form-control"
                                        onchange="readURL(this,'site_banner')" />
                                    <img src="{{ url('images/logos', get_setting('site_banner')) }}" id="site_banner"
                                        width="200px" />
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group mb-2">
                                    <label for="site_footer_text">Footer Title</label>
                                    <input type="hidden" name="type[]" value="site_footer_text">
                                    <input name="site_footer_text" type="text" id="site_footer_text"
                                        class="form-control" value="{{ get_setting('site_footer_text') }}" />
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mt-50">
                            <button type="submit" class="btn btn-primary mr-1">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <div class="col-12">
            <div class="card">
                <h3 class="card-header">Social Links</h3>
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
                    <form enctype="multipart/form-data" id="social_links" action="{{ route('settings.update') }}"
                        method="POST" class="mt-2">
                        @csrf
                        <div class="row d-flex justify-content-center">
                            <div class="col-md-1 col-12">
                                <label for="site_facebook_link">Facebook</label>
                            </div>
                            <div class="col-md-9 col-12">
                                <div class="form-group mb-2">
                                    <input type="hidden" name="type[]" value="site_facebook_link">
                                    <input name="site_facebook_link" type="text" id="site_facebook_link"
                                        class="form-control" value="{{ get_setting('site_facebook_link') }}"
                                        placeholder="https://facebook.com" pattern="https://.*" />
                                </div>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center">
                            <div class="col-md-1 col-12">
                                <label for="site_instagram_link">Instagram</label>
                            </div>
                            <div class="col-md-9 col-12">
                                <div class="form-group mb-2">
                                    <input type="hidden" name="type[]" value="site_instagram_link">
                                    <input name="site_instagram_link" type="text" id="site_instagram_link"
                                        class="form-control" value="{{ get_setting('site_instagram_link') }}"
                                        placeholder="https://instagram.com" pattern="https://.*" />
                                </div>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center">
                            <div class="col-md-1 col-12">
                                <label for="site_twitter_link">Twitter</label>
                            </div>
                            <div class="col-md-9 col-12">
                                <div class="form-group mb-2">
                                    <input type="hidden" name="type[]" value="site_twitter_link">
                                    <input name="site_twitter_link" type="text" id="site_twitter_link"
                                        class="form-control" value="{{ get_setting('site_twitter_link') }}"
                                        placeholder="https://twitter.com" pattern="https://.*" />
                                </div>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center">
                            <div class="col-md-1 col-12">
                                <label for="site_linkedin_link">LinkedIn</label>
                            </div>
                            <div class="col-md-9 col-12">
                                <div class="form-group mb-2">
                                    <input type="hidden" name="type[]" value="site_linkedin_link">
                                    <input name="site_linkedin_link" type="text" id="site_linkedin_link"
                                        class="form-control" value="{{ get_setting('site_linkedin_link') }}"
                                        placeholder="https://linkedin.com" pattern="https://.*" />
                                </div>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center">
                            <div class="col-md-1 col-12">
                                <label for="site_youtube_link">Youtube</label>
                            </div>
                            <div class="col-md-9 col-12">
                                <div class="form-group mb-2">
                                    <input type="hidden" name="type[]" value="site_youtube_link">
                                    <input name="site_youtube_link" type="text" id="site_youtube_link"
                                        class="form-control" value="{{ get_setting('site_youtube_link') }}"
                                        placeholder="https://youtube.com" pattern="https://.*" />
                                </div>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center">
                            <div class="col-md-1 col-12">
                                <label for="site_pinterest_link">Pinterest</label>
                            </div>
                            <div class="col-md-9 col-12">
                                <div class="form-group mb-2">
                                    <input type="hidden" name="type[]" value="site_pinterest_link">
                                    <input name="site_pinterest_link" type="text" id="site_pinterest_link"
                                        class="form-control" value="{{ get_setting('site_pinterest_link') }}"
                                        placeholder="https://pinterest.com" pattern="https://.*" />
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mt-50">
                            <button type="submit" class="btn btn-primary mr-1">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <div class="col-12">
            <div class="card">
                <h3 class="card-header">Global SEO</h3>
                <div class="card-body">
                    <form action="{{ route('settings.update') }}" id="seo_info" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row d-flex justify-content-center">
                            <div class="col-md-1 col-12">
                                <label for="meta_title">Meta Title</label>
                            </div>
                            <div class="col-md-9 col-12">
                                <div class="form-group mb-2">
                                    <input type="hidden" name="type[]" value="meta_title">
                                    <input type="text" class="form-control" placeholder="{{ 'Title' }}"
                                        name="meta_title" value="{{ get_setting('meta_title') }}">
                                </div>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center">
                            <div class="col-md-1 col-12">
                                <label for="meta_description">Meta description</label>
                            </div>
                            <div class="col-md-9 col-12">
                                <div class="form-group mb-2">
                                    <input type="hidden" name="type[]" value="meta_description">
                                    <textarea class="resize-off form-control" placeholder="{{ 'Description' }}" name="meta_description">{{ get_setting('meta_description') }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center">
                            <div class="col-md-1 col-12">
                                <label for="meta_keywords">Meta Keywords</label>
                            </div>
                            <div class="col-md-9 col-12">
                                <div class="form-group mb-2">
                                    <input type="hidden" name="type[]" value="meta_keywords">
                                    <textarea class="resize-off form-control" placeholder="{{ 'Keyword, Keyword' }}" name="meta_keywords">{{ get_setting('meta_keywords') }}</textarea>
                                    <small class="text-muted">{{ 'Separate with coma' }}</small>
                                </div>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center">
                            <div class="col-md-1 col-12">
                                <label for="site_instagram_link">Meta Image</label>
                            </div>
                            <div class="col-md-9 col-12">
                                <div class="form-group mb-2">
                                    <input type="hidden" name="type[]" value="meta_image">
                                    <input name="meta_image" type="file" class="form-control"
                                        onchange="readURL(this,'meta_image')" />
                                    <img src="{{ url('images/logos', get_setting('meta_image')) }}" id="meta_image"
                                        width="100px" />
                                </div>
                            </div>
                        </div>

                        <div class="col-12 mt-50">
                            <button type="submit" class="btn btn-primary mr-1">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <div class="col-12">
            <div class="card">
                <h3 class="card-header">Referral Reward Points</h3>
                <div class="card-body">
                    <form action="{{ route('settings.update') }}" id="seo_info" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row d-flex justify-content-center">
                            <div class="col-md-1 col-12">
                                <label for="referral_points">Referral Points</label>
                            </div>
                            <div class="col-md-9 col-12">
                                <div class="form-group mb-2">
                                    <input type="hidden" name="type[]" value="referral_points">
                                    <input type="number" class="form-control" placeholder="{{ 'Referral Points' }}"
                                        name="referral_points" value="{{ get_setting('referral_points') }}">
                                </div>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center">
                            <div class="col-md-1 col-12">
                                <label for="referree_points">Referree Points</label>
                            </div>
                            <div class="col-md-9 col-12">
                                <div class="form-group mb-2">
                                    <input type="hidden" name="type[]" value="referree_points">
                                    <input type="number" class="form-control" placeholder="{{ 'Referree Points' }}"
                                        name="referree_points" value="{{ get_setting('referree_points') }}">
                                </div>
                            </div>
                        </div>

                        <div class="row d-flex justify-content-center">
                            <div class="col-md-1 col-12">
                                <label for="product_referral_expiry_days">Product Refferal Expiry Days</label>
                            </div>
                            <div class="col-md-9 col-12">
                                <div class="form-group mb-2">
                                    <input type="hidden" name="type[]" value="product_referral_expiry_days">
                                    <input type="number" class="form-control" placeholder="{{ 'Referree Points' }}"
                                        name="product_referral_expiry_days" value="{{ get_setting('product_referral_expiry_days') }}">
                                </div>
                            </div>
                        </div>

                        <div class="col-12 mt-50">
                            <button type="submit" class="btn btn-primary mr-1">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('js')
<script>
    // Image Preview
    function readURL(input, id) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#' + id).attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endpush