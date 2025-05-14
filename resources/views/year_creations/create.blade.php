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
                                        <h4 class="mb-sm-0">Role Form</h4>

                                        <div class="page-title-right">
                                            <ol class="breadcrumb m-0">
                                                <li class="breadcrumb-item"><a href="javascript: void(0);">Role Forms</a></li>
                                                <li class="breadcrumb-item active">Role</li>
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

    <form action="{{ route('year_creations.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="company_name" class="form-label">Company Name</label>
            <input type="text" class="form-control" id="company_name" name="company_name" required>
        </div>
        <div class="mb-3">
            <label for="no_of_business" class="form-label">No of Business</label>
            <input type="text" class="form-control" id="no_of_business" name="no_of_business" required>
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <input type="text" class="form-control" id="address" name="address" required>
        </div>
        <div class="mb-3">
            <label for="place" class="form-label">Place</label>
            <input type="text" class="form-control" id="place" name="place">
        </div>
        <div class="mb-3">
            <label for="pin" class="form-label">PIN</label>
            <input type="text" class="form-control" id="pin" name="pin">
        </div>
        <div class="mb-3">
            <label for="std" class="form-label">STD</label>
            <input type="text" class="form-control" id="std" name="std">
        </div>
        <div class="mb-3">
            <label for="phone_no" class="form-label">Phone No</label>
            <input type="text" class="form-control" id="phone_no" name="phone_no">
        </div>
        <div class="mb-3">
            <label for="fax" class="form-label">Fax</label>
            <input type="text" class="form-control" id="fax" name="fax">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>
        <div class="mb-3">
            <label for="inc_tax_pan_no" class="form-label">Inc Tax Pan No</label>
            <input type="text" class="form-control" id="inc_tax_pan_no" name="inc_tax_pan_no">
        </div>
        <div class="mb-3">
            <label for="pin_no" class="form-label">PIN No</label>
            <input type="text" class="form-control" id="pin_no" name="pin_no">
        </div>
        <div class="mb-3">
            <label for="cst_no" class="form-label">CST No</label>
            <input type="text" class="form-control" id="cst_no" name="cst_no">
        </div>
        <div class="mb-3">
            <label for="ecc_no" class="form-label">ECC No</label>
            <input type="text" class="form-control" id="ecc_no" name="ecc_no">
        </div>
        <div class="mb-3">
            <label for="cerc_no" class="form-label">CERC No</label>
            <input type="text" class="form-control" id="cerc_no" name="cerc_no">
        </div>
        <div class="mb-3">
            <label for="range" class="form-label">Range</label>
            <input type="text" class="form-control" id="range" name="range">
        </div>
        <div class="mb-3">
            <label for="division" class="form-label">Division</label>
            <input type="text" class="form-control" id="division" name="division">
        </div>
        <div class="mb-3">
            <label for="commission_rate" class="form-label">Commission Rate</label>
            <input type="text" class="form-control" id="commission_rate" name="commission_rate">
        </div>
        <div class="mb-3">
            <label for="location_date" class="form-label">Location Date</label>
            <input type="date" class="form-control" id="location_date" name="location_date">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
               </div>
            </div>
        </div>
    </div> <!-- end col -->
</div>

@include('template.form_footer')