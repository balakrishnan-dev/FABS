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
                        <h4 class="mb-sm-0">Lorry Invoice Display</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('lorries_invoice_display.index') }}">Lorry</a></li>
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
                            <form method="POST" action="{{ route('lorries_invoice_display.store') }}">
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

                                 <!-- Order Type -->
                                    <div class="mb-3">
                                        <label for="order_type" class="form-label">Order Type</label>
                                        <select class="form-select" name="order_type" id="order_type" required>
                                            <option value="">Select Order Type</option>
                                            <option value="Market Orders">Market Orders</option>
                                            <option value="Limit Orders">Limit Orders</option>
                                            <option value="Stop Loss">Stop Loss</option>
                                        </select>
                                    </div>

                            


                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">CL No</label>
                                    <div class="col-sm-10">
                                        <input type="number" name="CL_No" class="form-control">
                                    </div>
                                </div>

                                
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Design Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="design_name" class="form-control">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Party Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="party_name" class="form-control">
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Date From</label>
                                    <div class="col-sm-10">
                                        <input type="date" name="date_from" class="form-control" required>
                                    </div>
                                </div>

                                  <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Date To</label>
                                    <div class="col-sm-10">
                                        <input type="date" name="date_to" class="form-control" required>
                                    </div>
                                </div>
                                
                                <div class="text-end">
                                    <a href="{{ route('lorries_invoice_display.index') }}" class="btn btn-primary">Cancel</a>
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
