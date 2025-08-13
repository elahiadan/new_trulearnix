@extends('admin.layouts.app')

@section('title', 'Vendor Management')

@section('row')
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">
                    @if ($id == 1)
                        Verified
                    @elseif ($id == 2)
                        Unverified
                    @endif Vendor Management
                </h2>

            </div>
        </div>
    </div>
    <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
        <div class="form-group breadcrumb-right">
            <div class="dropdown">
                <a href="{{ route('vendors.create') }}"
                    class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle waves-effect waves-float waves-light"
                    type="button">create</a>
            </div>
        </div>
    </div>
@endsection


@section('content')

    <section id="multilingual-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-datatable">
                            <div class="table-responsive">
                                <table class="table" id="vendor-list">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Contact</th>
                                            <th>Created</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection



@push('js')
    <script>
        $(function() {
            $('#vendor-list').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{!! $route !!}",
                columns: [{
                        data: 'view'
                    },
                    {
                        data: 'name'
                    },
                    {
                        data: 'email'
                    },
                    {
                        data: 'contact'
                    },
                    {
                        data: 'created_at'
                    },
                    {
                        data: 'status'
                    },
                    {
                        data: 'action'
                    },
                ],
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });
        });


        function deleteItem(id) {
            $contact = id;
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                customClass: {
                    confirmButton: 'btn btn-primary',
                    cancelButton: 'btn btn-outline-danger ml-1'
                },
                buttonsStyling: false,
                preConfirm: function() {
                    window.location.replace("{{ route('vendors.delete', []) }}?id=" + $contact);
                },
            });
        }

        function changeStatus(id, el) {

            $id = id;
            $status = $(el).val();
            Swal.fire({
                title: 'Are you sure?',
                text: "Do You Want To Change Status!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, I Want!',
                customClass: {
                    confirmButton: 'btn btn-primary',
                    cancelButton: 'btn btn-outline-danger ml-1'
                },
                buttonsStyling: false,
                preConfirm: function($login, $blod_id) {
                    window.location.replace("{{ route('vendors.change.status', []) }}?id=" + $id +
                        "&status=" +
                        $status);
                },
            });
        }
    </script>
@endpush
