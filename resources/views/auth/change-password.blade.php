@extends('admin.layouts.app')

@section('title', 'Change Password')

@section('row')
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">Change Password</h2>
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
                        <form enctype="multipart/form-data" id="faq_edit_form" action="{{ route('create.new.password') }}"
                            method="POST" class="mt-2">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group mb-2">
                                        <label for="old-password">Old Password</label>
                                        <div class="input-group-append">
                                            <input name="old_password" type="password" id="old-password"
                                                class="form-control" required />
                                            <span class="input-group-text cursor-pointer" id="showOldPass"><i
                                                    data-feather="eye"></i></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group mb-2">
                                        <label for="change-password">New Password</label>
                                        <div class="input-group-append">
                                            <input name="password" type="password" id="change-password" class="form-control"
                                                required />
                                            <span class="input-group-text cursor-pointer" id="showPass"><i
                                                    data-feather="eye"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group mb-2">
                                        <label for="confirm-password">Confirm Password</label>
                                        <div class="input-group-append">
                                            <input name="password_confirmation" type="password" id="confirm-password"
                                                class="form-control" required />
                                            <span class="input-group-text cursor-pointer" id="showConfirmPass"><i
                                                    data-feather="eye"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 mt-50">
                                    <button type="submit" class="btn btn-primary mr-1">Save Changes</button>
                                    <a href="{{route('dashboard')}}" type="reset" class="btn btn-outline-secondary">Cancel</a>
                                </div>
                            </div>
                        </form>
                        <!--/ Form -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ faq Edit -->

@endsection
