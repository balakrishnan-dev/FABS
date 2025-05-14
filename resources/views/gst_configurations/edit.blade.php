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
                                        <h4 class="mb-sm-0">GST Config Form</h4>

                                        <div class="page-title-right">
                                            <ol class="breadcrumb m-0">
                                                <li class="breadcrumb-item"><a href="javascript: void(0);">GST Forms</a></li>
                                                <li class="breadcrumb-item active">GST</li>
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
                <h4 class="card-title mb-0 flex-grow-1">Add Country & Currency</h4>
            </div><!-- end card header -->

            <div class="card-body">
                <div class="live-preview">
                <form method="POST" action="{{ route('gst_configurations.update', $gstConfiguration->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Status</label>
            <select name="gst_status" class="form-select" required>
                <option value="approved" {{ $gstConfiguration->gst_status == 'approved' ? 'selected' : '' }}>Approved</option>
                <option value="rejected" {{ $gstConfiguration->gst_status == 'rejected' ? 'selected' : '' }}>Rejected</option>
            </select>
        </div>

        <div class="mb-3">
            <label>GST Percentage</label>
            <input type="number" name="gst_percentage" class="form-control"
                   value="{{ $gstConfiguration->gst_percentage }}" min="0" max="100" step="0.01" required>
        </div>

        <div class="mb-3">
            <label>Effective From</label>
            <input type="date" name="effective_from" class="form-control"
                   value="{{ $gstConfiguration->effective_from }}" required>
        </div>

        <button class="btn btn-primary">Update</button>
        <a href="{{ route('gst_configurations.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
                </div>
            </div>
        </div>
    </div> <!-- end col -->
</div>

@include('template.form_footer')

