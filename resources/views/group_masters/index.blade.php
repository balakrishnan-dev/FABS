@include('template.form_header')
@include('template.form_sidebar')
<style>/* Style for the toggle switch */
/* Style for the toggle switch */
.switch {
  position: relative;
  display: inline-block;
  width: 40px;  /* Smaller width */
  height: 22px; /* Smaller height */
}

.switch input {
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  transition: 0.4s;
  border-radius: 22px; /* Rounded corners */
}

.slider:before {
  position: absolute;
  content: "";
  height: 16px; /* Smaller circle */
  width: 16px;  /* Smaller circle */
  border-radius: 50%;
  left: 3px;  /* Adjusted for smaller circle */
  bottom: 3px; /* Adjusted for smaller circle */
  background-color: white;
  transition: 0.4s;
}

input:checked + .slider {
  background-color: #4CAF50; /* Green for Active */
}

input:checked + .slider:before {
  transform: translateX(18px); /* Move the circle to the right */
}

/* For round sliders */
.slider.round {
  border-radius: 22px;
}

.slider.round:before {
  border-radius: 50%;
}

</style>

<div class="vertical-overlay"></div>
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <!-- Page Title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Group</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="#">Group Master</a></li>
                                <li class="breadcrumb-item active">Group List</li>
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
                                        <a href="{{ route('group-masters.create') }}" class="btn btn-success btn-sm">
                                            <i class="ri-add-line me-1"></i> Add
                                        </a>
                                    </div>
                                    <div class="col-sm"></div>
                                </div>

                                <table class="table align-middle table-nowrap" id="groupMastersTable">
                                    <thead class="table-light">
                                        <tr>
                                            <th style="width: 50px;"><input type="checkbox" class="form-check-input" id="checkAll" /></th>
                                            <th>Group Name</th>
                                            <th>Group Type</th>
                                            <th>Description</th>
                                            <th>Status</th>
                                            <th>Created At</th>
                                            <th>Updated At</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Dynamic rows will load via AJAX -->
                                    </tbody>
                                </table>
                            </div>

                            <div class="noresult d-none">
                                <div class="text-center">
                                    <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop" colors="primary:#121331,secondary:#08a88a" style="width:75px;height:75px">
                                    </lord-icon>
                                    <h5 class="mt-2">No Result Found</h5>
                                    <p class="text-muted">No matching Group found.</p>
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
    var table = $('#groupMastersTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('group-masters.data') }}",
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false },
            { data: 'group_name', name: 'group_name' },
            { data: 'group_type', name: 'group_type' },
            { data: 'description', name: 'description' },
            { data: 'status', name: 'status', orderable: false },
            { data: 'created_at', name: 'created_at' },
            { data: 'updated_at', name: 'updated_at' },
            { data: 'action', name: 'action', orderable: false, searchable: false },
        ]
    });
    // Handle status toggle change
        $('body').on('change', '.status-toggle', function() {
            var status = $(this).prop('checked') == true ? 1 : 0;
            var groupId = $(this).data('id');
            
            // Send AJAX request to update the status
            $.ajax({
                url: '/group-masters/status/' + groupId, // Use the correct route
                type: 'PUT',
                data: {
                    status: status,
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    console.log(response);
                },
                error: function(error) {
                    console.log(error);
                }
            });
        });
    $('#deleteRecordModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var recordId = button.data('id');
        var deleteUrl = '{{ route("group-masters.destroy", ":id") }}'.replace(':id', recordId);
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
                $('.modal-backdrop').remove();
                $('body').removeClass('modal-open');
                table.ajax.reload(null, false);
                toastr.success('Ledger deleted successfully');
            }
        });
    });
});
</script>
