@include('template.form_header')
@include('template.form_sidebar')

<!-- Left Sidebar End -->
<div class="vertical-overlay"></div>

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <!-- Page Title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Edit Lorry</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('lorries_masters.index') }}">Lorry</a></li>
                                <li class="breadcrumb-item active">Edit</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form Card -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="{{ route('lorries_masters.update', $Lorry->id) }}">
                                @csrf
                                @method('PUT')

                                <!-- Loom Type -->
                                <div class="mb-3">
                                    <label for="loom_type" class="form-label">Loom Type</label>
                                    <select class="form-select" name="loom_type" id="loom_type" required>
                                        <option value="">Select Loom Type</option>
                                        <option value="Floor Looms" {{ $Lorry->loom_type == 'Floor Looms' ? 'selected' : '' }}>Floor Looms</option>
                                        <option value="Frame Looms" {{ $Lorry->loom_type == 'Frame Looms' ? 'selected' : '' }}>Frame Looms</option>
                                        <option value="Backstrap" {{ $Lorry->loom_type == 'Backstrap' ? 'selected' : '' }}>Backstrap</option>
                                    </select>
                                </div>

                                <!--Sales No -->
                                <div class="mb-3">
                                    <label for="sales_no" class="form-label">Sales No</label>
                                    <select class="form-select" name="sales_no" id="sales_no" required>
                                        <option value="">Select No</option>
                                        <option value="A" {{ $Lorry->sales_no == 'A' ? 'selected' : '' }}>A</option>
                                        <option value="B" {{ $Lorry->sales_no == 'B' ? 'selected' : '' }}>B</option>
                                        <option value="C" {{ $Lorry->sales_no == 'C' ? 'selected' : '' }}>C</option>
                                        <option value="D" {{ $Lorry->sales_no == 'D' ? 'selected' : '' }}>D</option>
                                    </select>
                                </div>

                                <!-- No Value -->
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">No Value</label>
                                    <div class="col-sm-10">
                                        <input type="number" name="no_value" class="form-control" value="{{ $Lorry->no_value }}">
                                    </div>
                                </div>

                                <!-- Date -->
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Date</label>
                                    <div class="col-sm-10">
                                        <input type="date" name="date" class="form-control" value="{{ $Lorry->date }}" required>
                                    </div>
                                </div>

                                <!-- Party Name -->
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Party Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="party_name" class="form-control" value="{{ $Lorry->party_name }}" required>
                                    </div>
                                </div>

                                <!-- Place Name -->
                                <div class="row mb-4">
                                    <label class="col-sm-2 col-form-label">Place Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="place_name" class="form-control" value="{{ $Lorry->place_name }}" required>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label class="col-sm-2 col-form-label">Attn</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="attn" class="form-control" value="{{ $Lorry->attn }}" required>
                                    </div>
                                </div>

                    
                                <div class="row mb-4">
                                    <label class="col-sm-2 col-form-label">GRN No</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="GRN_no" class="form-control" value="{{ $Lorry->GRN_no }}" required>
                                    </div>
                                </div>
                                    <button type="submit" class="btn btn-success">Update</button>
                                    <a href="{{ route('lorries_masters.index') }}" class="btn btn-secondary">Cancel</a>
                         
                            </form>
                        </div> <!-- end card-body -->
                    </div> <!-- end card -->
                </div> <!-- end col -->
            </div> <!-- end row -->

        </div> <!-- container-fluid -->
    </div> <!-- page-content -->
</div> <!-- main-content -->

@include('template.form_footer')
