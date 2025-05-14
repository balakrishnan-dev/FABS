@include('template.form_header')
@include('template.form_sidebar')
<!-- Vertical Overlay -->
<div class="vertical-overlay"></div>

<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">GST</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">GST</a></li>
                                <li class="breadcrumb-item active">GST List</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div id="customerList">
                                <div class="row g-4 mb-3">
                                    <div class="col-sm-auto">
                                        <a href="{{ route('gst_configurations.create') }}" class="btn btn-success add-btn btn-sm">
                                            <i class="ri-add-line align-bottom me-1"></i> Add
                                        </a>
                                    </div>
                                </div>
                                <table class="table align-middle table-nowrap" id="gstConfigurationsTable">
                                    <thead class="table-light">
                                        <tr>
                                            <th style="width: 50px;">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="checkAll" />
                                                </div>
                                            </th>
                                            <th>Status</th>
                                            <th>Percentage</th>
                                            <th>Effective From</th>
                                            <th>Active</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Dynamic rows go here -->
                                    </tbody>
                                </table>
                            </div>
                    <meta name="csrf-token" content="{{ csrf_token() }}">

                            <!-- No result placeholder -->
                            <div class="noresult d-none">
                                <div class="text-center">
                                    <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
                                        colors="primary:#121331,secondary:#08a88a" style="width:75px;height:75px">
                                    </lord-icon>
                                    <h5 class="mt-2">Sorry! No Result Found</h5>
                                    <p class="text-muted mb-0">We've searched more than 150+ Orders. No matching results found.</p>
                                </div>
                            </div>
                        </div> <!-- end card-body -->
                    </div> <!-- end card -->
                </div> <!-- end col -->
            </div> <!-- end row -->
        </div> <!-- container-fluid -->
    </div> <!-- page-content -->
</div> <!-- main-content -->

<!-- Modal -->
<div class="modal fade zoomIn" id="deleteRecordModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="btn-close"></button>
            </div>
            <div class="modal-body">
                <div class="mt-2 text-center">
                    <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop"
                        colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>
                    <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                        <h4>Are you Sure ?</h4>
                        <p class="text-muted mx-4 mb-0">Are you Sure You want to Remove this Record?</p>
                    </div>
                </div>
                <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                    <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn w-sm btn-danger" id="delete-record">Yes, Delete It!</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- DataTables Scripts -->
<script src="//code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.css" rel="stylesheet">
<link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">

@include('template.form_footer')

@if(session('success'))
    <script>
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "positionClass": "toast-top-right"
        };
        toastr.success("{{ session('success') }}");
    </script>
@endif

@if(session('error'))
    <script>
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "positionClass": "toast-top-right"
        };
        toastr.error("{{ session('error') }}");
    </script>
@endif  

<script>
    $(function () {
        var table = $('#gstConfigurationsTable').DataTable({
            processing: true,
            serverSide: true,
            lengthChange: true,
            searching: true,
            paging: true,
            info: true,
            ajax: "{{ route('gst_configurations.data') }}",
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false },
                { data: 'gst_status', name: 'gst_status' },
                { data: 'gst_percentage', name: 'gst_percentage' },
                { data: 'created_at', name: 'created_at' },
                { data: 'updated_at', name: 'updated_at' },
                { data: 'action', name: 'action', orderable: false, searchable: false },
            ]
        });

        // Handle status toggle
        $(document).on('change', '.status-toggle', function () {
    var isActive = $(this).is(':checked') ? 1 : 0;
    var id = $(this).data('id');

    $.ajax({
        url: '/gst-configurations/update-status/' + id,
        type: 'POST',
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            status: isActive
        },
        success: function (response) {
            console.log(response.message);
            // Optional: reload the table without full page refresh
            $('#gstTable').DataTable().ajax.reload(null, false);
        },
        error: function (xhr) {
            console.error(xhr.responseText);
        }
    });
});

        // Handle delete record confirmation
        $('#deleteRecordModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var recordId = button.data('id');
            var deleteUrl = '{{ route("gst_configurations.destroy", ":id") }}';
            deleteUrl = deleteUrl.replace(':id', recordId);
            $('#delete-record').data('url', deleteUrl);
        });

        // Delete the record
        $('#delete-record').click(function () {
            var url = $(this).data('url');
            $.ajax({
                url: url,
                method: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}',
                },
                success: function() {
                    $('#deleteRecordModal').modal('hide'); // Hide modal
                    $('.modal-backdrop').remove(); // Remove leftover black backdrop
                    $('body').removeClass('modal-open'); // Remove scroll lock on body

                    table.ajax.reload(null, false); // Reload DataTable without resetting pagination

                    toastr.success('Record deleted successfully', 'Success', {
                        positionClass: 'toast-top-right',
                        timeOut: 5000,
                    });
                },
            });
        });
    });
</script>
