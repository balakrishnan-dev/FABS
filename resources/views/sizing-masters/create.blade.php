@include('template.form_header')
@include('template.form_sidebar')

<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>

<!-- Start right Content here -->
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <!-- Page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Size Form</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Size Management</a></li>
                                <li class="breadcrumb-item active">Add Size</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form Row -->
            <div class="row">
                <div class="col-xxl-6">
                    <div class="card">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Add Size</h4>
                        </div>
                        <div class="card-body">
                            <div class="live-preview">

                                <!-- Show validation errors -->
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul class="mb-0">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            <form action="{{ route('sizing-masters.store') }}" method="POST">
                                @csrf

                                            <div class="form-group mb-3">
                                        <label>Loom Type</label>
                                        <input type="text" name="loom_type" class="form-control" required>
                                    </div>

                                   <div class="form-group mb-3">
                                        <label>Order Type</label>
                                        <input type="text" name="order_type" class="form-control" required>
                                    </div>

                                   <div class="form-group mb-3">
                                        <label>CL No</label>
                                        <input type="text" name="cl_no" class="form-control" required>
                                    </div>

                                                  <div class="form-group mb-3">
                                        <label>Particulars</label>
                                        <input type="text" name="particulars" class="form-control" required>
                                    </div>

                                            <div class="form-group mb-3">
                                        <label>Sizing Name</label>
                                        <input type="text" name="sizing_name" class="form-control" required>
                                    </div>

                                         <div class="form-group mb-3">
                                        <label>Date From</label>
                                        <input type="date" name="date_from" class="form-control" required>
                                    </div>

                                       <div class="form-group mb-3">
                                        <label>Date To</label>
                                        <input type="date" name="date_to" class="form-control" required>
                                    </div>
                           
               
                                    <button type="submit" class="btn btn-success">Save</button>
                                    <a href="{{ route('sizing-masters.index') }}" class="btn btn-secondary">Cancel</a>
                               
                                </form>
                            </div>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->

        </div>
    </div>
</div>
@include('template.form_footer')