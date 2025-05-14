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
                        <h4 class="mb-sm-0">Companies</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Companies</a></li>
                                <li class="breadcrumb-item active">Companies List</li>
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
                                                    <a href="{{ route('companies.create') }}" class="btn btn-success add-btn btn-sm">
                                                        <i class="ri-add-line align-bottom me-1"></i> Add
                                                    </a>

                                                    </div>
                                                </div>
                                                <div class="col-sm">
                                                    <div class="d-flex justify-content-sm-end">
                                                    
                                                    </div>
                                                </div>
                                            </div>
                                <div class="table-responsive">
                                <table class="table align-middle table-nowrap" id="companiesTable">
                                    <thead class="table-light">
                                        <tr>
                                            <th style="width: 50px;">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="checkAll" />
                                                </div>
                                            </th>
                                            <th>Financial Year From</th>
                                            <th>Financial Year To</th>
                                            <th>Company Name</th>
                                            <th>Nature of Business</th>
                                            <th>Address</th>
                                            <th>Place</th>
                                            <th>Pin</th>
                                            <th>STD</th>
                                            <th>Phone No</th>
                                            <th>Fax</th>
                                            <th>TEL</th>
                                            <th>Income Tax No</th>
                                            <th>Sales Tax No</th>
                                            <th>CST No</th>
                                            <th>Password</th>
                                            <th>Short Name</th>
                                            <th>Email</th>
                                            <th>TIN No</th>
                                            <th>ECC No</th>
                                            <th>CERC No</th>
                                            <th>Range</th>
                                            <th>Division</th>
                                            <th>Commission Rate</th>
                                            <th>Location Code No</th>
                                            <th>PAN No</th>
                                            <th>Default Year</th>
                                            <th>Remarks</th>
                                            <th>Types</th>
                                            <th>Created At</th>
                                            <th>Updated At</th>
                                            <th>Actions</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Dynamic rows go here -->
                                    </tbody>
                                </table>
                            </div>  

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
$(document).ready(function () { 
    
    var table = $('#companiesTable').DataTable({
        processing: true,
        serverSide: true,
        lengthChange: true,
        searching: true,
        paging: true,
        info: true,
        ajax: "{{ route('companies.data') }}",
       columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'financial_year_from', name: 'financial_year_from' },
            { data: 'financial_year_to', name: 'financial_year_to' },
            { data: 'company_name', name: 'company_name' },
            { data: 'nature_of_business', name: 'nature_of_business' },
            { data: 'address', name: 'address' },
            { data: 'place', name: 'place' },
            { data: 'pin', name: 'pin' },
            { data: 'std', name: 'std' },
            { data: 'phone_no', name: 'phone_no' },
            { data: 'fax', name: 'fax' },
            { data: 'tel', name: 'tel' },
            { data: 'income_tax_no', name: 'income_tax_no' },
            { data: 'sales_tax_no', name: 'sales_tax_no' },
            { data: 'cst_no', name: 'cst_no' },
            { data: 'password', name: 'password' },
            { data: 'short_name', name: 'short_name' },
            { data: 'email', name: 'email' },
            { data: 'tin_no', name: 'tin_no' },
            { data: 'ecc_no', name: 'ecc_no' },
            { data: 'cerc_no', name: 'cerc_no' },
            { data: 'range', name: 'range' },
            { data: 'division', name: 'division' },
            { data: 'commission_rate', name: 'commission_rate' },
            { data: 'location_code_no', name: 'location_code_no' },
            { data: 'pan_no', name: 'pan_no' },
            { data: 'default_year', name: 'default_year' },
            { data: 'remarks', name: 'remarks' },
            { data: 'types', name: 'types' },
            { data: 'created_at', name: 'created_at' },
            { data: 'updated_at', name: 'updated_at' },
            { data: 'action', name: 'action', orderable: false, searchable: false },
        ]
    });
  $('#addCompanyForm').on('submit', function (e) {
        e.preventDefault();

        var form = $(this);
        var actionUrl = form.attr('action');
        var formData = form.serialize();

        $.ajax({
            url: actionUrl,
            method: 'POST',
            data: formData,
            success: function (response) {
                form.trigger('reset'); // Reset form
                table.ajax.reload(null, false); // Reload DataTable without resetting page
                toastr.success('Company added successfully');
            },
            error: function (xhr) {
                let errors = xhr.responseJSON.errors;
                $.each(errors, function (key, val) {
                    toastr.error(val[0]);
                });
            }
        });
    });
    // Handle edit form submission
    $('#editCompanyForm').on('submit', function(e) {
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
                $('#companiesTable').DataTable().ajax.reload();
                toastr.success('Record updated successfully', 'Success', {
                    positionClass: 'toast-top-right', // Show message in top-right corner
                    timeOut: 5000, // Message will be shown for 5 seconds
                });
            },
            error: function(xhr, status, error) {
                toastr.error('An error occurred while updating the Company.', 'Error', {
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
        var deleteUrl = '{{ route("companies.destroy", ":id") }}';
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