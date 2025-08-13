@extends('admin.layouts.app')

@section('title', 'Create User')

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
                        <form enctype="multipart/form-data" id="blog_edit_form" action="{{ route('vendors.store') }}"
                            method="POST" class="mt-2">
                            @csrf
                            <div class="row">

                                <div class="col-md-6 col-12">
                                    <div class="form-group mb-2">
                                        <label for="name">Name</label>
                                        <input name="name" type="text" id="name" class="form-control"
                                            required />
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group mb-2">
                                        <label for="organization">Organization</label>
                                        <input name="organization" type="text" id="organization" class="form-control"
                                            required />
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group mb-2">
                                        <label for="email">Email</label>
                                        <input name="email" type="email" id="email" class="form-control" required />
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group mb-2">
                                        <label for="street">Street</label>
                                        <input name="street" type="text" id="street" class="form-control" required />
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group mb-2">
                                        <label for="city">City</label>
                                        <input name="city" type="text" id="city" class="form-control" required />
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group mb-2">
                                        <label for="state">State</label>
                                        <input name="state" type="text" id="state" class="form-control" required />
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group mb-2">
                                        <label for="country">Country</label>
                                        <input name="country" type="text" id="country" class="form-control" required />
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group mb-2">
                                        <label for="establishment_year">Establishment Year</label>
                                        <input name="establishment_year" type="text" id="establishment_year"
                                            class="form-control" required />
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group mb-2">
                                        <label for="business_type">Business Type</label>
                                        <input name="business_type" type="text" id="business_type" class="form-control"
                                            required />
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group mb-2">
                                        <label for="about">About</label>
                                        <textarea name="about" type="text" id="about" class="form-control"></textarea>

                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group mb-2">
                                        <label for="contact">Contact No.</label>
                                        <input name="contact" type="tel" maxlength="10" id="contact"
                                            class="form-control" required
                                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" />
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group mb-2">
                                        <label for="status">Status</label>
                                        <select name="status" class="form-control" id="status">
                                            <option selected value="1">Active</option>
                                            <option value="2">InActive</option>
                                        </select>
                                    </div>
                                </div>


                                <div class="col-md-6 col-12">
                                    <div class="form-group mb-2">
                                        <label for="change-password">New Password</label>
                                        <div class="input-group-append">
                                            <input name="password" type="password" id="change-password"
                                                class="form-control" required />
                                            <span class="input-group-text cursor-pointer" id="showPass"><i
                                                    data-feather="eye"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group mb-2">
                                        <label for="confirm-password">Confirm Password</label>
                                        <div class="input-group-append">
                                            <input name="cpassword" type="password" id="confirm-password"
                                                class="form-control" required />
                                            <span class="input-group-text cursor-pointer" id="showConfirmPass"><i
                                                    data-feather="eye"></i></span>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-12 mt-50">
                                    <button type="submit" class="btn btn-primary mr-1">Save Changes</button>
                                    <a href="{{ route('vendors', ['id' => 1]) }}" type="reset"
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

@endsection
