@extends('admin.layouts.app')

@section('title', 'Pages')

@section('row')
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">Pages</h2>

            </div>
        </div>
    </div>

@endsection


@section('content')
    <!-- Multilingual -->
    <section id="multilingual-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-datatable">
                        <table class="dt-multilingual table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Keywords</th>
                                    <th>Slug</th>
                                    <th>Status</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i=1; @endphp
                                @foreach ($pages as $page)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $page->title }}</td>
                                        <td class="d-flex">
                                            @php
                                                $keywords = unserialize($page->keyword);
                                            @endphp
                                            @foreach ($keywords as $key)
                                                <span
                                                    style="background: cornflowerblue;color: white;padding: 5px;border-radius: 5px;margin: 5px;">{{ $key }}</span>
                                            @endforeach
                                        </td>
                                        <td>{{ $page->slug }}</td>
                                        <td>
                                            @if ($page->status_id == 1)
                                                Published
                                            @else
                                                Draft
                                            @endif
                                        </td>
                                        <td id="content">{{ $page->description }}</td>
                                        <td>
                                            <button type="submit" class="btn btn-info" id="editAll" data-toggle="modal"
                                                data-target="#edit_one" onclick="editAll('{{ $page->id }}')">
                                                Edit</button>
                                            <a href="{{ route('cms.edit', ['id' => $page->id]) }}" class="btn btn-dark">Edit
                                                Content</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @include('admin.cms.edit-cms')


    </section>

@endsection

@push('js')
    <script>
        function contentEdit(id) {
            $content = $("#content").text();

            $.ajax({
                type: "GET",
                url: "{{ route('cms.show') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    'id': id
                },
                success: function(data) {
                    if (data && data.error && data.errorno) {
                        console.log("Error");
                        return;
                    } else {
                        $("#edit_content_id").attr('value', id);
                        $("#content_id").attr('value', data.data[0].description);
                        console.log(data.data[0].description);
                    }
                }
            });
        }

        function editAll(id) {
            $content = $("#content").text();

            $.ajax({
                type: "GET",
                url: "{{ route('cms.show') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    'id': id
                },
                success: function(data) {
                    console.log(data);
                    if (data && data.error && data.errorno) {
                        console.log("Error");
                        return;
                    } else {
                        $("#edit_id").attr('value', id);
                        $("#cms-edit-title").attr('value', data.data.title);
                        $("#cms-edit-keyword").html('');
                        $("#cms-edit-decription").val(data.data.description);
                        $("#cms-edit-slug").attr('value', data.data.slug);
                        $("#pricing-edit-status").val(data.data.status);

                        $s = [];
                        $.each(data.keyword, function(key, val) {
                            $s.push(val);
                            $("#cms-edit-keyword").append('<option seleted>' + val + '</option>');
                        });
                        $("#cms-edit-keyword").val($s).trigger('change');

                    }
                }
            });
        }


        $("#content_edit_form").on("submit", function() {
            $("#hiddenArea").val(blogEditor.root.innerHTML);
        });


        $(document).ready(function() {
            $('.js-example-tokenizer').select2({
                tags: true,
                tokenSeparators: [',', ' ']
            });
        });
    </script>
@endpush
