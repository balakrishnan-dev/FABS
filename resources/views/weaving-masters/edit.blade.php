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
                                        <h4 class="mb-sm-0">Edit Weaving Form</h4>

                                        <div class="page-title-right">
                                            <ol class="breadcrumb m-0">
                                                <li class="breadcrumb-item"><a href="javascript: void(0);">Weaving</a></li>
                                                <li class="breadcrumb-item active">Ports</li>
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
                <h4 class="card-title mb-0 flex-grow-1">Edit Ports</h4>
            </div><!-- end card header -->

            <div class="card-body">
                <div class="live-preview">
                    <!-- The action is updated to 'update' route with the correct Ports ID -->
                    <form action="{{ route('weaving-masters.update', $weaving_master->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                
                                <div class="mb-3">
                                    <label for="design_name" class="form-label">Design Name</label>
                                    <input type="text" name="design_name" class="form-control" value="{{ old('design_name', $weaving_master->design_name) }}">
                                    @error('design_name')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="cl_no" class="form-label">CL No</label>
                                    <input type="text" name="cl_no" class="form-control" value="{{ old('cl_no', $weaving_master->cl_no) }}">
                                    @error('cl_no')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="party_name" class="form-label">Party Name</label>
                                    <input type="text" name="party_name" class="form-control" value="{{ old('party_name', $weaving_master->party_name) }}">
                                    @error('party_name')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="shade" class="form-label">Shade</label>
                                    <input type="text" name="shade" class="form-control" value="{{ old('shade', $weaving_master->shade) }}">
                                    @error('shade')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="weaving_date" class="form-label">Weaving Date</label>
                                    <input type="date" name="weaving_date" class="form-control"
                                      value="{{ old('weaving_date', $weaving_master->weaving_date ? \Carbon\Carbon::parse($weaving_master->weaving_date)->format('Y-m-d') : '') }}">
                                    @error('weaving_date')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-success">Update</button>
                                <a href="{{ route('weaving-masters.index') }}" class="btn btn-secondary">Back</a>
                            </form>
                </div>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->

@include('template.form_footer')
