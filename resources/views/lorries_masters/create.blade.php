@include('template.form_header')
@include('template.form_sidebar')

<!-- Left Sidebar End -->
<div class="vertical-overlay"></div>

<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <!-- Page Title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Lorry</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('lorries_masters.index') }}">Lorry</a></li>
                                <li class="breadcrumb-item active">Create</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form Card -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="{{ route('lorries_masters.store') }}">
                                @csrf

                                 <!-- Loom Type -->
                                    <div class="mb-3">
                                        <label for="loom_type" class="form-label">Loom Type</label>
                                        <select class="form-select" name="loom_type" id="loom_type" required>
                                            <option value="">Select Loom Type</option>
                                            <option value="Floor Looms">Floor Looms</option>
                                            <option value="Frame Looms">Frame Looms</option>
                                            <option value="Backstrap">Backstrap</option>
                                        </select>
                                    </div>


                                    <!-- Sales No -->
                                    <div class="mb-3">
                                        <label for="sales_no" class="form-label">No</label>
                                        <select class="form-select" name="sales_no" id="sales_no" required>
                                            <option value="">Select No</option>
                                            <option value="A">A</option>
                                            <option value="B">B</option>
                                            <option value="C">C</option>
                                            <option value="D">D</option>
                                        </select>
                                    </div>


                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">No Value</label>
                                    <div class="col-sm-10">
                                        <input type="number" name="no_value" class="form-control">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Date</label>
                                    <div class="col-sm-10">
                                        <input type="date" name="date" class="form-control" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Party Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="party_name" class="form-control" required>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label class="col-sm-2 col-form-label">Place Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="place_name" class="form-control" required>
                                    </div>
                                </div>


                                <div class="row mb-4">
                                    <label class="col-sm-2 col-form-label">Attn</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="attn" class="form-control" required>
                                    </div>
                                </div>

                                
                                <div class="row mb-4">
                                    <label class="col-sm-2 col-form-label">GRN No</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="GRN_no" class="form-control" required>
                                    </div>
                                </div>
                                
                                <div class="text-end">
                                    <a href="{{ route('lorries_masters.index') }}" class="btn btn-primary">Cancel</a>
                                    <button type="submit" class="btn btn-success">Create</button>
                                </div>
                            </form>
                        </div> <!-- end card-body -->
                    </div> <!-- end card -->
                </div> <!-- end col -->
            </div> <!-- end row -->

        </div> <!-- container-fluid -->
    </div> <!-- page-content -->
</div> <!-- main-content -->

@include('template.form_footer')
