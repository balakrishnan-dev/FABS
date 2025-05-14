@include('template.form_header')
@include('template.form_sidebar')

<div class="vertical-overlay"></div>
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <!-- Page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Adjustment Entries</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Accounting</a></li>
                                <li class="breadcrumb-item active">Adjustment Entries</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Table card -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div id="customerList">
                                <div class="row g-4 mb-3">
                                    <div class="col-sm-auto">
                                        <a href="{{ route('adjustments.create') }}" class="btn btn-success btn-sm">
                                            <i class="ri-add-line align-bottom me-1"></i> Add
                                        </a>
                                    </div>
                                </div>

                                <table class="table align-middle table-nowrap" id="adjustmentTable">
                                    <thead class="table-light">
                                        <tr>
                                            <th>#</th>
                                            <th>Date</th>
                                            <th>Ledger</th>
                                            <th>Amount</th>
                                            <th>Type</th>
                                            <th>Note</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Populated by DataTable -->
                                    </tbody>
                                </table>
                            </div>

                            <!-- No Result -->
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
        </div>
    </div>
</div>

<!-- Delete Modal -->
<div class="modal fade zoomIn" id="deleteRecordModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop"
                           colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px">
                </lord-icon>
                <h4>Are you sure?</h4>
                <p class="text-muted">Do you really want to delete this record?</p>
                <div class="d-flex justify-content-center gap-2 mt-4">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="delete-record">Yes, Delete</button>
                </div>
            </div>
        </div>
    </div>
</div>

@include('template.form_footer')

<!-- DataTables & Toastr -->
<script src="//code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.js"></script>
<link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.css">

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
    var table = $('#adjustmentTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('adjustments.data') }}",
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'date', name: 'date' },
            { data: 'ledger', name: 'ledger' },
            { data: 'amount', name: 'amount' },
            { data: 'type', name: 'type' },
            { data: 'note', name: 'note' },
            { data: 'action', name: 'action', orderable: false, searchable: false }
        ]
    });

    $('#deleteRecordModal').on('show.bs.modal', function (event) {
        let button = $(event.relatedTarget);
        let recordId = button.data('id');
        let url = "{{ route('adjustments.destroy', ':id') }}".replace(':id', recordId);
        $('#delete-record').data('url', url);
    });

    $('#delete-record').on('click', function () {
        let url = $(this).data('url');
        $.ajax({
            url: url,
            type: 'DELETE',
            data: {
                _token: "{{ csrf_token() }}"
            },
            success: function () {
                $('#deleteRecordModal').modal('hide');
                table.ajax.reload(null, false);
                toastr.success('Record deleted successfully.');
            },
            error: function () {
                toastr.error('Failed to delete the record.');
            }
        });
    });
});
</script>
