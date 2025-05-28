<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Design Chart Print</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <style>
        body {
            font-size: 14px;
        }
        table th, table td {
            vertical-align: middle !important;
        }
        @media print {
            .no-print {
                display: none;
            }
        }
    </style>
</head>
<body class="p-4">
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Design Chart Print</h1>
            <button class="btn btn-primary no-print" onclick="window.print()">Print</button>
        </div>

        <h4>Main Design Chart Details</h4>
        <table class="table table-bordered table-sm">
            <tbody>
                <tr>
                    <th>Loom Type</th>
                    <td>{{ $designChart->loom_type }}</td>
                    <th>Order Type</th>
                    <td>{{ $designChart->order_type }}</td>
                </tr>
                <tr>
                    <th>CL No</th>
                    <td>{{ $designChart->cl_no }}</td>
                    <th>Design Name</th>
                    <td>{{ $designChart->design_name }}</td>
                </tr>
          
            </tbody>
        </table>

        <h4>Warp Details</h4>
        @if($designChart->warps->count())
        <table class="table table-bordered table-sm">
            <thead class="table-light">
                <tr>
                    <th>S.No</th>
                    <th>Count</th>
                    <th>Colour</th>
                    <th>Warp</th>
                    <th>Type</th>
                    <th>Set</th>
                    <th>Ext</th>
                    <th>DB</th>
                </tr>
            </thead>
            <tbody>
                @foreach($designChart->warps as $index => $warp)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $warp->count }}</td>
                        <td>{{ $warp->colour }}</td>
                        <td>{{ $warp->warp }}</td>
                        <td>{{ $warp->type }}</td>
                        <td>{{ $warp->set }}</td>
                        <td>{{ $warp->ext }}</td>
                        <td>{{ $warp->db }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @else
            <p class="text-muted">No Warp Data Available.</p>
        @endif

        <h4>Weft Details</h4>
        @if($designChart->wefts->count())
        <table class="table table-bordered table-sm">
            <thead class="table-light">
                <tr>
                    <th>S.No</th>
                    <th>Count</th>
                    <th>Colour</th>
                    <th>Weft</th>
                    <th>Type</th>
                    <th>Set</th>
                    <th>Ext</th>
                    <th>DB</th>
                </tr>
            </thead>
            <tbody>
                @foreach($designChart->wefts as $index => $weft)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $weft->count }}</td>
                        <td>{{ $weft->colour }}</td>
                        <td>{{ $weft->weft }}</td>
                        <td>{{ $weft->type }}</td>
                        <td>{{ $weft->set }}</td>
                        <td>{{ $weft->ext }}</td>
                        <td>{{ $weft->db }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @else
            <p class="text-muted">No Weft Data Available.</p>
        @endif
    </div>
</body>
</html>
