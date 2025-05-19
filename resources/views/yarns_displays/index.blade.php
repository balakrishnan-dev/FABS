@include('template.form_header')
@include('template.form_sidebar')

<div class="vertical-overlay"></div>
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- Page Title and Breadcrumb here -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table align-middle table-nowrap" id="yarnsDisplayTable">
                                    <thead class="table-light">
                                        <tr>
                                            <th>ID</th>
                                            <th>Count</th>
                                            <th>Count Name</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>  <!-- empty for ajax -->
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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
