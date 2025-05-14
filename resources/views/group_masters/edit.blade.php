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
                        <h4 class="mb-sm-0">Group Master Form</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Group Forms</a></li>
                                <li class="breadcrumb-item active">Edit Group</li>
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
                            <h4 class="card-title mb-0 flex-grow-1">Edit Group</h4>
                        </div><!-- end card header -->

                        <div class="card-body">
                            <div class="live-preview">
                                <form action="{{ route('group-masters.update', $groupMaster->id) }}" method="POST">
                                    @method('PUT')
                                    @csrf
                                    
                                    <div class="mb-3">
                                        <label for="group_name" class="form-label">Group Name</label>
                                        <input type="text" name="group_name" value="{{ old('group_name', $groupMaster->group_name) }}" class="form-control">
                                        @error('group_name')
                                            <div class="text-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="group_type" class="form-label">Group Type</label>
                                        <select name="group_type" class="form-control">
                                            <option value="Asset" {{ old('group_type', $groupMaster->group_type) == 'Asset' ? 'selected' : '' }}>Asset</option>
                                            <option value="Liability" {{ old('group_type', $groupMaster->group_type) == 'Liability' ? 'selected' : '' }}>Liability</option>
                                            <option value="Income" {{ old('group_type', $groupMaster->group_type) == 'Income' ? 'selected' : '' }}>Income</option>
                                            <option value="Expense" {{ old('group_type', $groupMaster->group_type) == 'Expense' ? 'selected' : '' }}>Expense</option>
                                        </select>
                                        @error('group_type')
                                            <div class="text-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="description" class="form-label">Description</label>
                                        <textarea name="description" class="form-control">{{ old('description', $groupMaster->description) }}</textarea>
                                        @error('description')
                                            <div class="text-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-check mb-3">
                                        <input type="checkbox" name="status" class="form-check-input" value="1" {{ old('status', $groupMaster->status) == 1 ? 'checked' : '' }}>
                                        <label class="form-check-label">Active</label>
                                    </div>

                                    <button type="submit" class="btn btn-success">Update</button>
                                    <a href="{{ route('group-masters.index') }}" class="btn btn-secondary">Back</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        </div>
    </div>

@include('template.form_footer')
