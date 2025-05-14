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
                                        <h4 class="mb-sm-0">Design&Design Form</h4>

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
                <form action="{{ route('designs.update', $design->id) }}" method="POST">
                        @csrf
                        @method('PUT') <!-- Since it's an update request -->
                        <!-- Buyer Name -->
                    <div class="mb-3">
                            <label for="buyer_name" class="form-label">Buyer Name</label>
                            <select name="loom_type" id="buyer_name" class="form-select">
                                <option value="">Select Loom Type</option>
                                @foreach ($buyers as $buyer)
                                    <option value="{{ $buyer->buyer_name }}" {{ $design->buyer_name == $buyer->buyer_name ? 'selected' : '' }}>
                                        {{ $buyer->buyer_name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('loom_type')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <!-- PO No -->
                        <div class="mb-3">
                            <label for="po_no" class="form-label">PO No.</label>
                            <input type="text" name="po_no" id="po_no" class="form-control" value="{{ old('po_no', $design->po_no) }}">
                        </div>


                        <!-- Loom Type -->
                    <div class="mb-3">
                            <label for="loom_type" class="form-label">Loom Type</label>
                            <select name="loom_type" id="loom_type" class="form-select">
                                <option value="">Select Loom Type</option>
                                @foreach ($datas as $loom)
                                    <option value="{{ $loom->loom_type }}" {{ $design->loom_type == $loom->loom_type ? 'selected' : '' }}>
                                        {{ $loom->loom_type }}
                                    </option>
                                @endforeach
                            </select>
                            @error('loom_type')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Order Type -->
                    <div class="mb-3">
                            <label for="order_type" class="form-label">Order Type</label>
                            <select name="order_type" id="order_type" class="form-select">
                                <option value="">Select Order Type</option>
                                @foreach ($datas as $order)
                                    <option value="{{ $order->order_type }}" {{ $design->order_type == $order->order_type ? 'selected' : '' }}>
                                        {{ $order->order_type }}
                                    </option>
                                @endforeach
                            </select>
                            @error('loom_type')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Weaving Type -->
                    <div class="mb-3">
                            <label for="weaving_type" class="form-label">Weaving Type</label>
                            <select name="weaving_type" id="weaving_type" class="form-select">
                                <option value="">Select Weaving Type</option>
                                @foreach ($datas as $weaving)
                                    <option value="{{ $weaving->weaving_type }}" {{ $design->weaving_type == $weaving->weaving_type ? 'selected' : '' }}>
                                        {{ $weaving->weaving_type }}
                                    </option>
                                @endforeach
                            </select>
                            @error('loom_type')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
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

                        <!-- Welt Mts -->
                        <div class="mb-3">
                            <label for="welt_mts" class="form-label">Welt Meters</label>
                            <input type="number" step="0.01" name="welt_mts" id="welt_mts" class="form-control" value="{{ old('welt_mts', $design->welt_mts) }}">
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


                            <!-- Attention -->
                            <div class="mb-3">
                                <label for="attention" class="form-label">Attention</label>
                                <input type="text" name="attention" id="attention" class="form-control" value="{{ old('attention', $design->attention) }}">
                            </div>

                            <button type="submit" class="btn btn-success">Update</button>
                            <a href="{{ route('designs.index') }}" class="btn btn-secondary">Back</a>
                        </form>
                </div>
            </div>
        </div>
    </div> <!-- end col -->
</div>

@include('template.form_footer')
