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
                                        <h4 class="mb-sm-0">Colour&Colour Form</h4>

                                        <div class="page-title-right">
                                            <ol class="breadcrumb m-0">
                                                <li class="breadcrumb-item"><a href="javascript: void(0);">Colour Forms</a></li>
                                                <li class="breadcrumb-item active">Colour</li>
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
                <h4 class="card-title mb-0 flex-grow-1">Add Colour & Currency</h4>
            </div><!-- end card header -->

            <div class="card-body">
                <div class="live-preview">
                <form action="{{ route('designs.update', $design->id) }}" method="POST">
    @csrf
    @method('PUT') <!-- Since it's an update request -->

    <!-- Loom Type -->
    <div class="mb-3">
        <label for="loom_type" class="form-label">Loom Type</label>
        <select name="loom_type" id="loom_type" class="form-select" required>
            <option value="">Select Loom Type</option>
            <option value="Sulzer shuttleless weaving machines" {{ $design->loom_type == 'Sulzer shuttleless weaving machines' ? 'selected' : '' }}>Sulzer shuttleless weaving machines</option>
            <option value="Rapier looms" {{ $design->loom_type == 'Rapier looms' ? 'selected' : '' }}>Rapier looms</option>
            <option value="Air-jet looms" {{ $design->loom_type == 'Air-jet looms' ? 'selected' : '' }}>Air-jet looms</option>
            <option value="Water-jet looms" {{ $design->loom_type == 'Water-jet looms' ? 'selected' : '' }}>Water-jet looms</option>
        </select>
    </div>

    <!-- Order Type -->
    <div class="mb-3">
        <label for="order_type" class="form-label">Order Type</label>
        <select name="order_type" id="order_type" class="form-select" required>
            <option value="">Select Order Type</option>
            <option value="Standard Production" {{ $design->order_type == 'Standard Production' ? 'selected' : '' }}>Standard Production</option>
            <option value="Sample / Trial Order" {{ $design->order_type == 'Sample / Trial Order' ? 'selected' : '' }}>Sample / Trial Order</option>
            <option value="Repeat / Reorder" {{ $design->order_type == 'Repeat / Reorder' ? 'selected' : '' }}>Repeat / Reorder</option>
            <option value="Urgent / Rush Order" {{ $design->order_type == 'Urgent / Rush Order' ? 'selected' : '' }}>Urgent / Rush Order</option>
            <option value="Custom / Special Order" {{ $design->order_type == 'Custom / Special Order' ? 'selected' : '' }}>Custom / Special Order</option>
            <option value="Export Order" {{ $design->order_type == 'Export Order' ? 'selected' : '' }}>Export Order</option>
            <option value="Domestic Order" {{ $design->order_type == 'Domestic Order' ? 'selected' : '' }}>Domestic Order</option>
            <option value="Repair / Rework Order" {{ $design->order_type == 'Repair / Rework Order' ? 'selected' : '' }}>Repair / Rework Order</option>
        </select>
    </div>

    <!-- CL No -->
    <div class="mb-3">
        <label for="cl_no" class="form-label">CL No.</label>
        <input type="text" name="cl_no" id="cl_no" class="form-control" value="{{ old('cl_no', $design->cl_no) }}" required>
    </div>

    <!-- Design Name -->
    <div class="mb-3">
        <label for="design_name" class="form-label">Design Name</label>
        <input type="text" name="design_name" id="design_name" class="form-control" value="{{ old('design_name', $design->design_name) }}" required>
    </div>

    <!-- PO No -->
    <div class="mb-3">
        <label for="po_no" class="form-label">PO No.</label>
        <input type="text" name="po_no" id="po_no" class="form-control" value="{{ old('po_no', $design->po_no) }}">
    </div>

    <!-- Weaving Type -->
    <div class="mb-3">
        <label for="weaving_type" class="form-label">Weaving Type</label>
        <select name="weaving_type" id="weaving_type" class="form-select" required>
            <option value="">Select Weaving Type</option>
            <option value="Plain Weave" {{ $design->weaving_type == 'Plain Weave' ? 'selected' : '' }}>Plain Weave</option>
            <option value="Twill Weave" {{ $design->weaving_type == 'Twill Weave' ? 'selected' : '' }}>Twill Weave</option>
            <option value="Satin Weave" {{ $design->weaving_type == 'Satin Weave' ? 'selected' : '' }}>Satin Weave</option>
            <option value="Dobby Weave" {{ $design->weaving_type == 'Dobby Weave' ? 'selected' : '' }}>Dobby Weave</option>
            <option value="Jacquard Weave" {{ $design->weaving_type == 'Jacquard Weave' ? 'selected' : '' }}>Jacquard Weave</option>
            <option value="Leno Weave" {{ $design->weaving_type == 'Leno Weave' ? 'selected' : '' }}>Leno Weave</option>
            <option value="Pile Weave" {{ $design->weaving_type == 'Pile Weave' ? 'selected' : '' }}>Pile Weave</option>
            <option value="Crepe Weave" {{ $design->weaving_type == 'Crepe Weave' ? 'selected' : '' }}>Crepe Weave</option>
        </select>
    </div>

    <!-- Pick -->
    <div class="mb-3">
        <label for="pick" class="form-label">Pick</label>
        <input type="number" step="0.01" name="pick" id="pick" class="form-control" value="{{ old('pick', $design->pick) }}">
    </div>

    <!-- Read -->
    <div class="mb-3">
        <label for="read" class="form-label">Read</label>
        <input type="number" step="0.01" name="read" id="read" class="form-control" value="{{ old('read', $design->read) }}">
    </div>

    <!-- Rate Per Mts -->
    <div class="mb-3">
        <label for="rate_per_mts" class="form-label">Rate Per Meter</label>
        <input type="number" step="0.01" name="rate_per_mts" id="rate_per_mts" class="form-control" value="{{ old('rate_per_mts', $design->rate_per_mts) }}">
    </div>

    <!-- Width -->
    <div class="mb-3">
        <label for="width" class="form-label">Width</label>
        <input type="text" name="width" id="width" class="form-control" value="{{ old('width', $design->width) }}">
    </div>

    <!-- Weaver Mts -->
    <div class="mb-3">
        <label for="weaver_mts" class="form-label">Weaver Meters</label>
        <input type="number" step="0.01" name="weaver_mts" id="weaver_mts" class="form-control" value="{{ old('weaver_mts', $design->weaver_mts) }}">
    </div>

    <!-- Order Mts -->
    <div class="mb-3">
        <label for="order_mts" class="form-label">Order Meters</label>
        <input type="number" step="0.01" name="order_mts" id="order_mts" class="form-control" value="{{ old('order_mts', $design->order_mts) }}">
    </div>

    <!-- Weft Mts -->
    <div class="mb-3">
        <label for="weft_mts" class="form-label">Welt Meters</label>
        <input type="number" step="0.01" name="weft_mts" id="weft_mts" class="form-control" value="{{ old('weft_mts', $design->weft_mts) }}">
    </div>

    <!-- Order Date -->
    <div class="mb-3">
        <label for="order_date" class="form-label">Order Date</label>
        <input type="date" name="order_date" id="order_date" class="form-control" value="{{ old('order_date', $design->order_date) }}">
    </div>

    <!-- Count -->
    <div class="mb-3">
        <label for="count" class="form-label">Count</label>
        <input type="text" name="count" id="count" class="form-control" value="{{ old('count', $design->count) }}">
    </div>

    <!-- Buyer Name -->
    <div class="mb-3">
        <label for="buyer_name" class="form-label">Buyer Name</label>
        <input type="text" name="buyer_name" id="buyer_name" class="form-control" value="{{ old('buyer_name', $design->buyer_name) }}">
    </div>

    <!-- Attention -->
    <div class="mb-3">
        <label for="attention" class="form-label">Attention</label>
        <input type="text" name="attention" id="attention" class="form-control" value="{{ old('attention', $design->attention) }}">
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
    <a href="{{ route('designs.index') }}" class="btn btn-secondary">Back</a>
</form>


                </div>
            </div>
        </div>
    </div> <!-- end col -->
</div>

@include('template.form_footer')
