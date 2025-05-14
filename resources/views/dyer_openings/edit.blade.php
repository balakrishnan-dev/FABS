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
                                        <h4 class="mb-sm-0">Edit Dyer Form</h4>

                                        <div class="page-title-right">
                                            <ol class="breadcrumb m-0">
                                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dyer</a></li>
                                                <li class="breadcrumb-item active">Dyer</li>
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
                <h4 class="card-title mb-0 flex-grow-1">Edit Dyer</h4>
            </div><!-- end card header -->

            <div class="card-body">
                <div class="live-preview">
                    <!-- The action is updated to 'update' route with the correct dyer_openings  ID -->
                    <form action="{{ route('dyer_openings.update', $dyers->id) }}" method="POST">
                        @csrf
                        @method('PUT') <!-- HTTP method spoofing for PUT request -->

                        <div class="mb-3">
                            <label for="dyer_name" class="form-label">Dyer Name</label>
                            <input type="text" name="dyer_name" class="form-control" value="{{ old('dyer_name', $dyers->dyer_name) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="place" class="form-label">Place</label>
                            <input type="text" name="place" class="form-control" value="{{ old('place', $dyers->place) }}" required>
                        </div>
                        <button type="submit" class="btn btn-success">Update</button>
                        <a href="{{ route('dyer_openings.index') }}" class="btn btn-secondary">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->

@include('template.form_footer')
