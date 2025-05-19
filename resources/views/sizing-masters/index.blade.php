@include('template.form_header')
@include('template.form_sidebar')

<div class="vertical-overlay"></div>

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Sizing Master</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Sizing</a></li>
                                <li class="breadcrumb-item active">Sizing Master List</li>
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
                            <div id="sizingList">
                                <div class="row g-4 mb-3">
                                    <div class="col-sm-auto">
                                        <a href="{{ route('sizing-masters.create') }}" class="btn btn-success add-btn btn-sm">
                                            <i class="ri-add-line align-bottom me-1"></i> Add
                                        </a>
                                    </div>
                                    <div class="col-sm d-flex justify-content-sm-end">
                                        <!-- Filters can be added here -->
                                    </div>
                                </div>

                                <table class="table align-middle table-nowrap" id="SizingTable">
                                    <thead class="table-light">
                                        <tr>
                                            <th>#</th>
                                            <th>Loom Type</th>
                                            <th>Order Type</th>
                                            <th>CL No</th>
                                            <th>Particulars</th>
                                            <th>Sizing Name</th>
                                            <th>Date From</th>
                                            <th>Date To</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Dynamic rows via DataTables -->
                                    </tbody>
                                </table>
                            </div>

                            <div class="noresult d-none">
                                <div class="text-center">
                                    <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
                                        colors="primary:#121331,secondary:#08a88a" style="width:75px;height:75px">
                                    </lord-icon>
                                    <h5 class="mt-2">Sorry! No Result Found</h5>
                                    <p class="text-muted mb-0">No matching results found.</p>
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
                    colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>
                <div class="mt-4 pt-2 fs-15">
                    <h4>Are you Sure?</h4>
                    <p class="text-muted mb-0">You want to remove this sizing record?</p>
                </div>
                <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                    <button type="button" class="btn btn-light w-sm" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger w-sm" id="delete-record">Yes, Delete It!</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- DataTables + Toastr -->
<script src="//code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.css" rel="stylesheet">
<link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">

@include('template.form_footer')

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
    var table = $('#SizingTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('sizing-masters.data') }}",
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex' },
            { data: 'loom_type', name: 'loom_type' },
            { data: 'order_type', name: 'order_type' },
            { data: 'cl_no', name: 'cl_no' },
            { data: 'particulars', name: 'particulars' },
            { data: 'sizing_name', name: 'sizing_name' },
            { data: 'date_from', name: 'date_from' },
            { data: 'date_to', name: 'date_to' },
            { data: 'action', name: 'action', orderable: false, searchable: false }
        ]
    });

    // Delete modal
    $('#deleteRecordModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var recordId = button.data('id');
        var deleteUrl = '{{ route("sizing-masters.destroy", ":id") }}'.replace(':id', recordId);
        $('#delete-record').data('url', deleteUrl);
    });

    $('#delete-record').click(function () {
        var url = $(this).data('url');
        $.ajax({
            url: url,
            method: 'DELETE',
            data: {
                _token: '{{ csrf_token() }}',
            },
            success: function() {
                $('#deleteRecordModal').modal('hide');
                table.ajax.reload(null, false);
                toastr.success('Record deleted successfully');
            },
            error: function() {
                toastr.error('Failed to delete record');
            }
        });
    });
});
</script>
