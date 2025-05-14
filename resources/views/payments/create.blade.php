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
                                        <h4 class="mb-sm-0">Payments Form</h4>

                                        <div class="page-title-right">
                                            <ol class="breadcrumb m-0">
                                                <li class="breadcrumb-item"><a href="javascript: void(0);">Payments Forms</a></li>
                                                <li class="breadcrumb-item active">Payments Narration</li>
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
                <h4 class="card-title mb-0 flex-grow-1">Add Narration</h4>
            </div><!-- end card header -->

            <div class="card-body">
                <div class="live-preview">
                <form action="{{ route('payments.store') }}" method="POST">
    @csrf
    
    <!-- Date From Field -->
    <div class="mb-3">
        <label for="date_from" class="form-label">Date From</label>
        <input type="date" name="date_from" class="form-control @error('date_from') is-invalid @enderror" value="{{ old('date_from') }}">
        @error('date_from')
            <div class="text-danger mt-1">{{ $message }}</div>
        @enderror
    </div>

    <!-- Date To Field -->
    <div class="mb-3">
        <label for="date_to" class="form-label">Date To</label>
        <input type="date" name="date_to" class="form-control @error('date_to') is-invalid @enderror" value="{{ old('date_to') }}">
        @error('date_to')
            <div class="text-danger mt-1">{{ $message }}</div>
        @enderror
    </div>

    <!-- Supplier Name Field -->
    <div class="mb-3">
        <label for="supplier_name" class="form-label">Supplier Name</label>
        <input type="text" name="supplier_name" class="form-control @error('supplier_name') is-invalid @enderror" value="{{ old('supplier_name') }}">
        @error('supplier_name')
            <div class="text-danger mt-1">{{ $message }}</div>
        @enderror
    </div>

    <!-- By Field (Select) -->
    <div class="mb-3">
        <label for="by" class="form-label">By</label>
        <select name="by" id="by" class="form-select @error('by') is-invalid @enderror" >
            <option value="" disabled selected>-- Select By --</option>
            <option value="Single By" {{ old('by') == 'Single By' ? 'selected' : '' }}>Single By</option>
            <option value="Many By" {{ old('by') == 'Many By' ? 'selected' : '' }}>Many By</option>
        </select>
        @error('by')
            <div class="text-danger mt-1">{{ $message }}</div>
        @enderror
    </div>

    <!-- Group By Field (Select) -->
    <div class="mb-3">
    <label for="group_by" class="form-label">Group By</label>
    <select name="group_by" id="group_by" class="form-select @error('group_by') is-invalid @enderror" >
        <option value="">Select Group</option>
        <option value="All group" {{ old('group_by') == 'All group' ? 'selected' : '' }}>All group</option>
        <option value="Second group" {{ old('group_by') == 'Second group' ? 'selected' : '' }}>Second group</option>
    </select>
    @error('group_by')
        <div class="text-danger mt-1">{{ $message }}</div>
    @enderror
</div>


    <!-- Submit Button -->
    <button type="submit" class="btn btn-success">Save</button>

    <!-- Back Button -->
    <a href="{{ route('payments.index') }}" class="btn btn-secondary">Back</a>

</form>

                </div>
            </div>
        </div>
    </div> <!-- end col -->
</div>

@include('template.form_footer')
