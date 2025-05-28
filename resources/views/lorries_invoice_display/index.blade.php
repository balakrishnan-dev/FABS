@include('template.form_header') 
@include('template.form_sidebar')

<div class="vertical-overlay"></div>

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Lorry Invoice Display</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="#">Lorry Invoice Display</a></li>
                                <li class="breadcrumb-item active">Lorry Invoice Display List</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div id="customerList">
                                <div class="row g-4 mb-3">
                                    <div class="col-sm-auto">
                                        <a href="{{ route('lorries_invoice_display.create') }}" class="btn btn-success btn-sm">
                                            <i class="ri-add-line align-bottom me-1"></i> Add
                                        </a>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table align-middle table-nowrap" id="lorriesInvoiceDisplayTable">
                                        <thead class="table-light">
                                            <tr>
                                                <th>#</th>
                                                <th>Loom Type</th>
                                                <th>Order Type</th>
                                                <th>CL No</th>
                                                <th>Design Name</th>
                                                <th>Party Name</th>
                                                <th>Date From</th>
                                                <th>Date To</th>
                                                <th>Created At</th>
                                                <th>Updated At</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </div>
                        </div> <!-- end card-body -->
                    </div> <!-- end card -->
                </div> <!-- end col -->
            </div> <!-- end row -->
        </div> <!-- container-fluid -->
    </div> <!-- page-content -->
</div> <!-- main-content -->

<!-- Delete Modal -->
<div class="modal fade zoomIn" id="deleteRecordModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="btn-close"></button>
            </div>
            <div class="modal-body text-center">
                <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop"
                    colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px">
                </lord-icon>
                <div class="mt-4 pt-2 fs-15">
                    <h4>Are you sure?</h4>
                    <p class="text-muted">Do you really want to delete this record?</p>
                </div>
                <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="delete-record">Yes, Delete!</button>
                </div>
            </div>
        </div>
    </div>
</div>

@include('template.form_footer')

<!-- DataTables and Toast Libraries -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.css" rel="stylesheet">
<link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">

<!-- CSRF Meta for AJAX -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Notifications -->
@if(session('success'))
<script>
    toastr.success("{{ session('success') }}");
</script>
@endif
@if(session('error'))
<script>
    toastr.error("{{ session('error') }}");
</script>
@endif

<script>
$(function () {
    let table = $('#lorriesInvoiceDisplayTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ route("lorries_invoice_display.data") }}',
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'loom_type', name: 'loom_type' },
            { data: 'order_type', name: 'order_type' },
            { data: 'CL_No', name: 'CL_No' },
            { data: 'design_name', name: 'design_name' },
            { data: 'party_name', name: 'party_name' },
            { data: 'date_from', name: 'date_from' },
            { data: 'date_to', name: 'date_to' },
            { data: 'created_at', name: 'created_at' },
            { data: 'updated_at', name: 'updated_at' },
            { data: 'action', name: 'action', orderable: false, searchable: false },
        ]
    });

    // Handle delete modal show
    $('#deleteRecordModal').on('show.bs.modal', function (event) {
        let button = $(event.relatedTarget);
        let recordId = button.data('id');
        let deleteUrl = '{{ route("lorries_invoice_display.destroy", ":id") }}'.replace(':id', recordId);
        $('#delete-record').data('url', deleteUrl);
    });

    // Handle delete
    $('#delete-record').click(function () {
        let url = $(this).data('url');
        $.ajax({
            url: url,
            type: 'DELETE',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
            },
            success: function () {
                $('#deleteRecordModal').modal('hide');
                table.ajax.reload(null, false);
                toastr.success('Record deleted successfully');
            },
            error: function () {
                toastr.error('Failed to delete record');
            }
        });
    });
});
</script>
