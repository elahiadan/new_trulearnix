@extends('admin.layouts.app')

@section('title', 'Brand Management')

@section('row')
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">Brand Management</h2>

            </div>
        </div>
    </div>
    <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
        <div class="form-group breadcrumb-right">
            <div class="dropdown">
                <a href="{{ route('brands.create') }}"
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
                                <table class="table" id="brand-list">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Image</th>
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
    @include('admin.brand.edit-brand')
@endsection



@push('js')
    <script>
        $(function() {
            $('#brand-list').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{!! route('brands.show') !!}",
                columns: [{
                        data: 'id'
                    },
                    {
                        data: 'name'
                    },
                    {
                        data: 'image',
                        render: function(data) {
                            return '<img src="' + '/images/brands/'+ data +
                                '" alt="" class="w-100 border rounded-2" width="50" height="50">'
                        }
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
                    window.location.replace("{{ route('brands.change.status', []) }}?id=" + $id +
                        "&status=" +
                        $status);
                },
            });
        }

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
                    window.location.replace("{{ route('brands.delete', []) }}?id=" + $contact);
                },
            });
        }


        function editBrand(id, name, status) {

            $el = $("#edit-brand");
            $el.find('input[name="id"]').val(id);
            $el.find('input[name="name"]').val(name);
            $('#status').val(status).trigger('change');
            $el.modal("show");
        }
    </script>
@endpush
