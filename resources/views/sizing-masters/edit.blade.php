@include('template.form_header')
@include('template.form_sidebar')

<div class="vertical-overlay"></div>

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <!-- Page Title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Edit Sizing Entry</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Sizing</a></li>
                                <li class="breadcrumb-item active">Edit</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form Start -->
            <div class="row">
                <div class="col-xxl-6">
                    <div class="card">
                        <div class="card-header"><h4 class="card-title mb-0">Edit Sizing Entry</h4></div>
                        <div class="card-body">
                            <form action="{{ route('sizing-masters.update', $sizingMaster->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label>Loom Type</label>
                                        <input type="text" name="loom_type" class="form-control" value="{{ old('loom_type', $sizingMaster->loom_type) }}" required>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label>Order Type</label>
                                        <input type="text" name="order_type" class="form-control" value="{{ old('order_type', $sizingMaster->order_type) }}" required>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label>CL No</label>
                                        <input type="text" name="cl_no" class="form-control" value="{{ old('cl_no', $sizingMaster->cl_no) }}" required>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label>Particulars</label>
                                        <input type="text" name="particulars" class="form-control" value="{{ old('particulars', $sizingMaster->particulars) }}" required>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label>Sizing Name</label>
                                        <input type="text" name="sizing_name" class="form-control" value="{{ old('sizing_name', $sizingMaster->sizing_name) }}" required>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label>Date From</label>
                                        <input type="date" name="date_from" class="form-control" value="{{ old('date_from', $sizingMaster->date_from) }}" required>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label>Date To</label>
                                        <input type="date" name="date_to" class="form-control" value="{{ old('date_to', $sizingMaster->date_to) }}" required>
                                    </div>
                                </div>

                                <div class="mt-3">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    <a href="{{ route('sizing-masters.index') }}" class="btn btn-secondary">Cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div> 
            </div>
            <!-- Form End -->

        </div>
    </div>
</div>

@include('template.form_footer')
