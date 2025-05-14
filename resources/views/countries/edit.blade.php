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
                                        <h4 class="mb-sm-0">Edit Country Form</h4>

                                        <div class="page-title-right">
                                            <ol class="breadcrumb m-0">
                                                <li class="breadcrumb-item"><a href="javascript: void(0);">Country</a></li>
                                                <li class="breadcrumb-item active">Country</li>
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
                <h4 class="card-title mb-0 flex-grow-1">Edit Country</h4>
            </div><!-- end card header -->

            <div class="card-body">
                <div class="live-preview">
                    <!-- The action is updated to 'update' route with the correct Country ID -->
                    <form action="{{ route('countries.update', $country->id) }}" method="POST">
                        @csrf
                        @method('PUT') <!-- HTTP method spoofing for PUT request -->

                        <div class="mb-3">
                            <label for="country_name" class="form-label">Country Name</label>
                            <input type="text" name="country_name" class="form-control" value="{{ old('country_name', $country->country_name) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="currency_name" class="form-label">Currency Name</label>
                            <input type="text" name="currency_name" class="form-control" value="{{ old('currency_name', $country->currency_name) }}" required>
                        </div>
                        <button type="submit" class="btn btn-success">Update</button>
                        <a href="{{ route('countries.index') }}" class="btn btn-secondary">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->

@include('template.form_footer')
