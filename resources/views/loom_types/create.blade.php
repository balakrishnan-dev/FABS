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
                                        <h4 class="mb-sm-0">Loom Form</h4>

                                        <div class="page-title-right">
                                            <ol class="breadcrumb m-0">
                                                <li class="breadcrumb-item"><a href="javascript: void(0);">Loom Forms</a></li>
                                                <li class="breadcrumb-item active">Loom</li>
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
                                        <h4 class="card-title mb-0 flex-grow-1">Add Loom Type</h4>
                                    </div><!-- end card header -->

                                    <div class="card-body">
                                        <div class="live-preview">
                                        <form action="{{ route('loom-types.store') }}" method="POST">
                                                @csrf

                                                <div class="mb-3">
                                                    <label for="loom_type" class="form-label">Loom Type</label>
                                                    <input 
                                                        type="text" 
                                                        name="loom_type" 
                                                        id="loom_type" 
                                                        class="form-control @error('loom_type') is-invalid @enderror" 
                                                        value="{{ old('loom_type') }}"
                                                    >
                                                    @error('loom_type')
                                                        <div class="text-danger mt-1">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>

                                                  <div class="mb-3">
                                                    <label for="order_type" class="form-label">Order Type</label>
                                                    <input 
                                                        type="text" 
                                                        name="order_type" 
                                                        id="order_type" 
                                                        class="form-control @error('order_type') is-invalid @enderror" 
                                                        value="{{ old('order_type') }}"
                                                    >
                                                    @error('order_type')
                                                        <div class="text-danger mt-1">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>


                                                <div class="mb-3">
                                                    <label for="weaving_type" class="form-label">Weaving Type</label>
                                                    <input 
                                                        type="text" 
                                                        name="weaving_type" 
                                                        id="weaving_type" 
                                                        class="form-control @error('weaving_type') is-invalid @enderror" 
                                                        value="{{ old('weaving_type') }}"
                                                    >
                                                    @error('weaving_type')
                                                        <div class="text-danger mt-1">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>


                                                <button type="submit" class="btn btn-success">Create</button>
                                                <a href="{{ route('loom-types.index') }}" class="btn btn-secondary">Cancel</a>        
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div>

@include('template.form_footer')

