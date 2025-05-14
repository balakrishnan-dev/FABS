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
                                        <h4 class="mb-sm-0">option Form</h4>

                                        <div class="page-title-right">
                                            <ol class="breadcrumb m-0">
                                                <li class="breadcrumb-item"><a href="javascript: void(0);">Option Forms</a></li>
                                                <li class="breadcrumb-item active">option</li>
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
                <h4 class="card-title mb-0 flex-grow-1">Add Year</h4>
            </div><!-- end card header -->

            <div class="card-body">
                <div class="live-preview">

    <form action="{{ route('options.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="option_name" class="form-label">Option Name</label>
            <input type="text" class="form-control" id="option_name" name="option_name" required>
        </div>
        <div class="mb-3">
            <label for="value" class="form-label">value</label>
            <input type="text" class="form-control" id="no_of_business" name="value" required>
        </div>
 

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
               </div>
            </div>
        </div>
    </div> <!-- end col -->
</div>

@include('template.form_footer')