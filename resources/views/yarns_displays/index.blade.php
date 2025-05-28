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
                        <h4 class="mb-sm-0">Yarn</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Yarn</a></li>
                                <li class="breadcrumb-item active">Yarn List</li>
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
                              
                                    </div>
                                    <div class="col-sm">
                                        <div class="d-flex justify-content-sm-end">
                                        </div>
                                    </div>
                                </div>

                                <table class="table align-middle table-nowrap" id="yarnsDisplayTable">
                                    <thead class="table-light">
                                        <tr>
                                            <th>ID</th>
                                            <th>Count</th>
                                            <th>Count Name</th>
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

@include('template.form_footer')

<!-- DataTables CSS & JS -->
<link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
<script src="//code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

<script>
$(document).ready(function() {
    var table = $('#yarnsDisplayTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('yarns_displays.data') }}",
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
            { data: 'count', name: 'count' },
            { data: 'count_name', name: 'count_name' }
        ]
    });
});

</script>
