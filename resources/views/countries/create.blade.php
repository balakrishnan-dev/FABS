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
                                        <h4 class="mb-sm-0">Country&Currency Form</h4>

                                        <div class="page-title-right">
                                            <ol class="breadcrumb m-0">
                                                <li class="breadcrumb-item"><a href="javascript: void(0);">Country Forms</a></li>
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
                <h4 class="card-title mb-0 flex-grow-1">Add Country & Currency</h4>
            </div><!-- end card header -->

            <div class="card-body">
                <div class="live-preview">
            
                        <form action="{{ route('countries.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="country_name" class="form-label">Country Name</label>
                            <input type="text" name="country_name" class="form-control" value="{{ old('country_name') }}">
                            @error('country_name')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="currency_name" class="form-label">Currency Name</label>
                            <input type="text" name="currency_name" class="form-control" value="{{ old('currency_name') }}">
                            @error('currency_name')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-success">Save</button>
                        <a href="{{ route('countries.index') }}" class="btn btn-secondary">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div> <!-- end col -->
</div>

@include('template.form_footer')
