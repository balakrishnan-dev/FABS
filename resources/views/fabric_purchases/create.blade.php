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

       <!-- start page title -->
       <div class="row">
                                <div class="col-12">
                                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                        <h4 class="mb-sm-0">Design Form</h4>

                                        <div class="page-title-right">
                                            <ol class="breadcrumb m-0">
                                                <li class="breadcrumb-item"><a href="javascript: void(0);">Design Forms</a></li>
                                                <li class="breadcrumb-item active">Design</li>
                                            </ol>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- end page title -->
<div class="row">
    <div class="col-xxl-6">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Add Design</h4>
            </div><!-- end card header -->

            <div class="card-body">
                <div class="live-preview">
                <form action="{{ route('designs.store') }}" method="POST">
        @csrf

        <!-- Loom Type -->
        <div class="mb-3">
            <label for="loom_type" class="form-label">Loom Type</label>
            <select name="loom_type" id="loom_type" class="form-select" required>
                <option value="">Select Loom Type</option>
                <option>Sulzer shuttleless weaving machines</option>
                <option>Rapier looms</option>
                <option>Air-jet looms</option>
                <option>Water-jet looms</option>
            </select>
        </div>

        <!-- Order Type -->
        <div class="mb-3">
            <label for="order_type" class="form-label">Order Type</label>
            <select name="order_type" id="order_type" class="form-select" required>
                <option value="">Select Order Type</option>
                <option>Standard Production</option>
                <option>Sample / Trial Order</option>
                <option>Repeat / Reorder</option>
                <option>Urgent / Rush Order</option>
                <option>Custom / Special Order</option>
                <option>Export Order</option>
                <option>Domestic Order</option>
                <option>Repair / Rework Order</option>
            </select>
        </div>

        <!-- CL No -->
        <div class="mb-3">
            <label for="cl_no" class="form-label">CL No.</label>
            <input type="text" name="cl_no" id="cl_no" class="form-control" required>
        </div>

        <!-- Design Name -->
        <div class="mb-3">
            <label for="design_name" class="form-label">Design Name</label>
            <input type="text" name="design_name" id="design_name" class="form-control" required>
        </div>

        <!-- PO No -->
        <div class="mb-3">
            <label for="po_no" class="form-label">PO No.</label>
            <input type="text" name="po_no" id="po_no" class="form-control">
        </div>

        <!-- Weaving Type -->
        <div class="mb-3">
            <label for="weaving_type" class="form-label">Weaving Type</label>
            <select name="weaving_type" id="weaving_type" class="form-select" required>
                <option value="">Select Weaving Type</option>
                <option>Plain Weave</option>
                <option>Twill Weave</option>
                <option>Satin Weave</option>
                <option>Dobby Weave</option>
                <option>Jacquard Weave</option>
                <option>Leno Weave</option>
                <option>Pile Weave</option>
                <option>Crepe Weave</option>
            </select>
        </div>

        <!-- Pick -->
        <div class="mb-3">
            <label for="pick" class="form-label">Pick</label>
            <input type="number" step="0.01" name="pick" id="pick" class="form-control">
        </div>

        <!-- Read -->
        <div class="mb-3">
            <label for="read" class="form-label">Read</label>
            <input type="number" step="0.01" name="read" id="read" class="form-control">
        </div>

        <!-- Rate Per Mts -->
        <div class="mb-3">
            <label for="rate_per_mts" class="form-label">Rate Per Meter</label>
            <input type="number" step="0.01" name="rate_per_mts" id="rate_per_mts" class="form-control">
        </div>

        <!-- Width -->
        <div class="mb-3">
            <label for="width" class="form-label">Width</label>
            <input type="text" name="width" id="width" class="form-control">
        </div>

        <!-- Weaver Mts -->
        <div class="mb-3">
            <label for="weaver_mts" class="form-label">Weaver Meters</label>
            <input type="number" step="0.01" name="weaver_mts" id="weaver_mts" class="form-control">
        </div>

        <!-- Order Mts -->
        <div class="mb-3">
            <label for="order_mts" class="form-label">Order Meters</label>
            <input type="number" step="0.01" name="order_mts" id="order_mts" class="form-control">
        </div>

        <!-- Welt Mts -->
        <div class="mb-3">
            <label for="welt_mts" class="form-label">Welt Meters</label>
            <input type="number" step="0.01" name="welt_mts" id="welt_mts" class="form-control">
        </div>

        <!-- Order Date -->
        <div class="mb-3">
            <label for="order_date" class="form-label">Order Date</label>
            <input type="date" name="order_date" id="order_date" class="form-control">
        </div>

        <!-- Count -->
        <div class="mb-3">
            <label for="count" class="form-label">Count</label>
            <input type="text" name="count" id="count" class="form-control">
        </div>

        <!-- Buyer Name -->
        <div class="mb-3">
            <label for="buyer_name" class="form-label">Buyer Name</label>
            <input type="text" name="buyer_name" id="buyer_name" class="form-control">
        </div>

        <!-- Attention -->
        <div class="mb-3">
            <label for="attention" class="form-label">Attention</label>
            <input type="text" name="attention" id="attention" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{ route('designs.index') }}" class="btn btn-secondary">Back</a>
    </form>
                </div>
            </div>
        </div>
    </div> <!-- end col -->
</div>

@include('template.form_footer')

