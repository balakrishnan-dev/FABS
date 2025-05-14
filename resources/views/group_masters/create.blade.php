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
                        <h4 class="mb-sm-0">Ledger Form</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Ledger Forms</a></li>
                                <li class="breadcrumb-item active">Ledger</li>
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
                                <form action="{{ route('group-masters.store') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="group_name" class="form-label">Group Name</label>
                                        <input type="text" name="group_name" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="group_type" class="form-label">Group Type</label>
                                        <select name="group_type" class="form-control">
                                            <option>Asset</option>
                                            <option>Liability</option>
                                            <option>Income</option>
                                            <option>Expense</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Description</label>
                                        <textarea name="description" class="form-control"></textarea>
                                    </div>
                                    <div class="form-check mb-3">
    <input type="checkbox" name="status" class="form-check-input" value="1" checked>
    <label class="form-check-label">Active</label>
</div>


                                    <button type="submit" class="btn btn-success">Save</button>
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
