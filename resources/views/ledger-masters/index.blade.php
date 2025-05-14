@include('template.form_header')
@include('template.form_sidebar')

<style>
/* Toggle Switch Styling (reused from Group) */
.switch {
  position: relative;
  display: inline-block;
  width: 40px;
  height: 22px;
}
.switch input {
  opacity: 0;
  width: 0;
  height: 0;
}
.slider {
  position: absolute;
  cursor: pointer;
  top: 0; left: 0; right: 0; bottom: 0;
  background-color: #ccc;
  transition: 0.4s;
  border-radius: 22px;
}
.slider:before {
  position: absolute;
  content: "";
  height: 16px; width: 16px;
  border-radius: 50%;
  left: 3px; bottom: 3px;
  background-color: white;
  transition: 0.4s;
}
input:checked + .slider {
  background-color: #4CAF50;
}
input:checked + .slider:before {
  transform: translateX(18px);
}
.slider.round { border-radius: 22px; }
.slider.round:before { border-radius: 50%; }
</style>

<div class="vertical-overlay"></div>
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <!-- Page Title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Ledger</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="#">Ledger Master</a></li>
                                <li class="breadcrumb-item active">Ledger List</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Table Section -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">

                        <div class="card-body">
                            <div id="ledgerList">
                                <div class="row g-4 mb-3">
                                    <div class="col-sm-auto">
                                        <a href="{{ route('ledger-masters.create') }}" class="btn btn-success btn-sm">
                                            <i class="ri-add-line me-1"></i> Add
                                        </a>
                                    </div>
                                    <div class="col-sm"></div>
                                </div>
                        <div class="table-responsive">
                                    <table class="table align-middle table-nowrap" id="ledgerMastersTable">
            
                                    <thead class="table-light">
                                        <tr>
                                            <th style="width: 50px;"><input type="checkbox" class="form-check-input" id="checkAll" /></th>
                                            <th>Ledger Name</th>       <!-- This requires 'ledger_name' -->
                                            <th>Group</th>             <!-- You might need to add group name manually -->
                                            <th>Balance Type</th>
                                            <th>Opening Balance</th>
                                            <th>Created At</th>
                                            <th>Updated At</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Dynamic rows will be loaded via AJAX -->
                                    </tbody>
                           </table>
                                </div>

                            <div class="noresult d-none">
                                <div class="text-center">
                                    <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
                                        colors="primary:#121331,secondary:#08a88a" style="width:75px;height:75px">
                                    </lord-icon>
                                    <h5 class="mt-2">No Result Found</h5>
                                    <p class="text-muted">No matching Ledger found.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade zoomIn" id="deleteRecordModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop"
                            colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px">
                        </lord-icon>
                        <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                            <h4>Are you Sure?</h4>
                            <p class="text-muted mb-0">Do you really want to delete this record?</p>
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

@include('template.form_footer')

<!-- DataTables & Toastr -->
<script src="//code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.css" rel="stylesheet">
<link href="//cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">

@if(session('success'))
    <script>toastr.success("{{ session('success') }}");</script>
@endif
@if(session('error'))
    <script>toastr.error("{{ session('error') }}");</script>
@endif

<script>
$(function () {
 var table = $('#ledgerMastersTable').DataTable({
    processing: true,
    serverSide: true,
    lengthChange: true,
    searching: true,
    paging: true,
    info: true,
    lengthMenu: [5, 10, 25, 50], // Define available options for page length
    ajax: "{{ route('ledger-masters.data') }}",
    columns: [
        { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
        { data: 'ledger_name', name: 'ledger_name' },
        { data: 'group_name', name: 'group_name' },
        { data: 'balance_type', name: 'balance_type' },
        { data: 'opening_balance', name: 'opening_balance' },
        { data: 'created_at', name: 'created_at' },
        { data: 'updated_at', name: 'updated_at' },
        { data: 'action', name: 'action', orderable: false, searchable: false },
    ]
});

    // Delete record
    $('#deleteRecordModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var recordId = button.data('id');
        var deleteUrl = '{{ route("ledger-masters.destroy", ":id") }}'.replace(':id', recordId);
        $('#delete-record').data('url', deleteUrl);
    });

    $('#delete-record').click(function () {
        var url = $(this).data('url');
        $.ajax({
            url: url,
            method: 'DELETE',
            data: { _token: '{{ csrf_token() }}' },
            success: function() {
                $('#deleteRecordModal').modal('hide');
                table.ajax.reload(null, false);
                toastr.success('Ledger deleted successfully');
            },
            error: function() {
                toastr.error('Failed to delete');
            }
        });
    });
});
</script>
