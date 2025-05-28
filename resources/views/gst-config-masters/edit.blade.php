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
                <form action="{{ route('gst-config-masters.update', $gstConfig->id) }}" method="POST">
                        @csrf
                        @method('PUT')
<!-- 
                        <div class="mb-3">
                            <label for="gst_status" class="form-label">GST Status</label>
                            <select name="gst_status" class="form-select" required>
                                <option value="" disabled>Select GST Status</option>
                                <option value="Approved" {{ old('gst_status', $gstConfig->gst_status) == 'Approved' ? 'selected' : '' }}>Approved</option>
                                <option value="Rejected" {{ old('gst_status', $gstConfig->gst_status) == 'Rejected' ? 'selected' : '' }}>Rejected</option>
                            </select>
                            @error('gst_status')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div> -->

                        <div class="mb-3">
                            <label for="gst_percentage" class="form-label">GST Percentage</label>
                            <input type="number" name="gst_percentage" class="form-control" step="0.01" value="{{ old('gst_percentage', $gstConfig->gst_percentage) }}" required>
                            @error('gst_percentage')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-success">Update</button>
                        <a href="{{ route('gst-config-masters.index') }}" class="btn btn-secondary">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div> <!-- end col -->
</div>

@include('template.form_footer')

