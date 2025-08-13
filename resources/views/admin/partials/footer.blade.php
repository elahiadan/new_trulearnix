    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('admin-assets/js/vendors.min.js') }}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('admin-assets/js/forms/validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('admin-assets/js/jkanban/jkanban.min.js') }}"></script>
    <script src="{{ asset('admin-assets/js/forms/select/select2.full.min.js') }}"></script>
    <script src="{{ asset('admin-assets/js/pickers/flatpickr/flatpickr.min.js') }}"></script>
    <script src="{{ asset('admin-assets/js/editors/quill/highlight.min.js') }}"></script>
    <script src="{{ asset('admin-assets/js/editors/quill/katex.min.js') }}"></script>
    <script src="{{ asset('admin-assets/js/editors/quill/quill.min.js') }}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('admin-assets/js/core/app-menu.js') }}"></script>
    <script src="{{ asset('admin-assets/js/core/app.js') }}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{ asset('admin-assets/js/scripts/pages/page-blog-edit.js') }}"></script>
    <!-- END: Page JS-->

    <!-- Table js -->
    <script src="{{ asset('admin-assets/js/tables/datatable/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin-assets/js/tables/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('admin-assets/js/tables/datatable/datatables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin-assets/js/tables/datatable/datatables.buttons.min.js') }}"></script>
    <script src="{{ asset('admin-assets/js/tables/datatable/datatables.checkboxes.min.js') }}"></script>
    <script src="{{ asset('admin-assets/js/tables/datatable/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('admin-assets/js/tables/datatable/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('admin-assets/js/tables/datatable/dataTables.rowGroup.min.js') }}"></script>
    <script src="{{ asset('admin-assets/js/tables/datatable/buttons.bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin-assets/js/tables/datatable/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin-assets/js/tables/datatable/buttons.print.min.js') }}"></script>
    <script src="{{ asset('admin-assets/js/tables/datatable/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('admin-assets/js/tables/datatable/jszip.min.js') }}"></script>
    <script src="{{ asset('admin-assets/js/tables/datatable/pdfmake.min.js') }}"></script>
    <script src="{{ asset('admin-assets/js/tables/datatable/responsive.bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin-assets/js/tables/datatable/responsive.bootstrap4.js') }}"></script>
    <script src="{{ asset('admin-assets/js/tables/datatable/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin-assets/js/tables/datatable/vfs_fonts.js') }}"></script>
    <script src="{{ asset('admin-assets/js/tables/ag-grid/ag-grid-community.min.noStyle.js') }}"></script>
    <script src="{{ asset('admin-assets/js/extensions/sweetalert2.all.min.js') }}"></script>

    <script src="{{ asset('admin-assets/js/main.js') }}"></script>
    <script src="{{ asset('admin-assets/js/forms/select/select2.min.js') }}"></script>

    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })

        // SHOW PASSWORD
        $(document).on('click', '#showOldPass', function() {
            var input = $("#old-password");
            input.attr('type') === 'password' ? input.attr('type', 'text') : input.attr('type', 'password')
        });
        $(document).on('click', '#showPass', function() {
            var input = $("#change-password");
            input.attr('type') === 'password' ? input.attr('type', 'text') : input.attr('type', 'password')
        });
        $(document).on('click', '#showConfirmPass', function() {
            var input = $("#confirm-password");
            input.attr('type') === 'password' ? input.attr('type', 'text') : input.attr('type', 'password')
        });

        // MESSAGES
        $("document").ready(function() {
            setTimeout(function() {
                $(".alert_message").remove();
            }, 3000);
        });
    </script>
