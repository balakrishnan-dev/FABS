@include('template.form_header')
@include('template.form_sidebar')

<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>

<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">weaving-masters</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">weaving-masters</a></li>
                                <li class="breadcrumb-item active">weaving-masters List</li>
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
                                        <div>
                                            <a href="{{ route('weaving-masters.create') }}" class="btn btn-success add-btn btn-sm">
                                                <i class="ri-add-line align-bottom me-1"></i> Add
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-sm">
                                        <div class="d-flex justify-content-sm-end">
                                        </div>
                                    </div>
                                </div>

                                <table class="table align-middle table-nowrap" id="weavingsTable">
                                    <thead class="table-light">
                                        <tr>
                                            <th style="width: 50px;">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="checkAll" />
                                                </div>
                                            </th>
                                            <th>Design Name</th>
                                            <th>CL No</th>
                                            <th>Party Name</th>
                                            <th>Shade</th>
                                            <th>Weaving Date</th>
                                            <th>Created At</th>
                                            <th>Updated_at</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Dynamic rows go here -->
                                    </tbody>
                                </table>
                            </div> <!-- End of customerList -->
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
                        <p class="text-muted mx-4 mb-0">Are you Sure You want to Remove this Record ?</p>
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

<!-- end modal -->

@include('template.form_footer')

<!-- DataTables Scripts -->
<script src="//code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.css" rel="stylesheet">
<link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">

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
    var table = $('#weavingsTable').DataTable({
    processing: true,
    serverSide: true,
    lengthChange: true,
    searching: true,
    paging: true,
    info: true,

    ajax: "{{ route('weaving-masters.data') }}",
   
    columns: [  
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false },
                { data: 'design_name', name: 'design_name', orderable: false },
                { data: 'cl_no', name: 'cl_no', orderable: false },
                { data: 'party_name', name: 'party_name', orderable: false },
                { data: 'shade', name: 'shade', orderable: false },
                { data: 'weaving_date', name: 'weaving_date', orderable: false },
                { data: 'created_at', name: 'created_at', orderable: false },
                { data: 'updated_at', name: 'updated_at', orderable: false },
                { data: 'action', name: 'action', orderable: false, searchable: false },
            ]

});

    // Handle edit form submission
    $('#editweavingForm').on('submit', function(e) {
        e.preventDefault();
        var form = $(this);
        var actionUrl = form.attr('action');
        var formData = form.serialize();

        $.ajax({
            url: actionUrl,
            method: 'PUT',
            data: formData,
            success: function(response) {
                $('#editModal').modal('hide');
                $('#weavingsTable').DataTable().ajax.reload();
                toastr.success('Record updated successfully', 'Success', {
                    positionClass: 'toast-top-right', // Show message in top-right corner
                    timeOut: 5000, // Message will be shown for 5 seconds
                });
            },
            error: function(xhr, status, error) {
                toastr.error('An error occurred while updating the weaving-masters.', 'Error', {
                    positionClass: 'toast-top-right',
                    timeOut: 5000,
                });
            }
        });
    });
  // Handle delete record confirmation
  $('#deleteRecordModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var recordId = button.data('id');
        var deleteUrl = '{{ route("weaving-masters.destroy", ":id") }}';
        deleteUrl = deleteUrl.replace(':id', recordId);
        $('#delete-record').data('url', deleteUrl);
    });

    // Delete the record
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