    @include('template.form_header')
    @include('template.form_sidebar')

    <!-- Vertical Overlay-->
    <div class="vertical-overlay"></div>

    <!-- Start right Content -->
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">

                <!-- Page Title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Grey Yarn</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Grey Yarn</a></li>
                                    <li class="breadcrumb-item active">Add Grey Yarn</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Form Card -->
                <div class="row">
                    <div class="col-xxl-8">
                        <div class="card">
                            <div class="card-header align-items-center d-flex">
                                <h4 class="card-title mb-0 flex-grow-1">Add Grey Yarn</h4>
                            </div>

                            <div class="card-body">
                                <form action="{{ route('grey_yarns.store') }}" method="POST">
                                    @csrf

                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Count</label>
                                            <input type="text" name="count" class="form-control" required>
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label">Group Name</label>
                                            <input type="text" name="group_name" class="form-control" required>
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label">Yarn Name</label>
                                            <input type="text" name="yarn_name" class="form-control" required>
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label">Count Name</label>
                                            <input type="text" name="count_name" class="form-control" required>
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label">Type</label>
                                            <input type="text" name="type" class="form-control">
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label">Unit</label>
                                            <select name="unit" class="form-select">
                                                <option value="">Select</option>
                                                <option value="Tex">Tex</option>
                                                <option value="Decitex">Decitex</option>
                                                <option value="Denier">Denier</option>
                                            </select>
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label">Warp Otam</label>
                                            <input type="text" name="warp_otam" class="form-control" required>
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label">Weft Otam</label>
                                            <input type="text" name="weft_otam" class="form-control" required>
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label">Seer Warp Otam</label>
                                            <input type="text" name="seer_warp_otam" class="form-control" required>
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label">Purchase Date</label>
                                            <input type="date" name="purchase_date" class="form-control">
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label">Opening Stock</label>
                                            <input type="number" name="opening_stock" class="form-control" required>
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label">Pootu</label>
                                            <input type="number" name="pootu" class="form-control">
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label">Bondhu Bundle</label>
                                            <input type="number" name="bondhu_bundle" class="form-control">
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label">Pootu Bondhu</label>
                                            <input type="text" name="pootu_bondhu" class="form-control">
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label">Pootu Bundle</label>
                                            <input type="text" name="pootu_bundle" class="form-control">
                                        </div>
                                    </div>

                                    <div class="mt-4">
                                        <button type="submit" class="btn btn-success">Save</button>
                                        <a href="{{ route('grey_yarns.index') }}" class="btn btn-secondary">Back</a>
                                    </div>
                                </form>
                            </div> <!-- end card-body -->
                        </div> <!-- end card -->
                    </div> <!-- end col -->
                </div> <!-- end row -->

            </div> <!-- container-fluid -->
        </div> <!-- page-content -->
    </div> <!-- main-content -->

    @include('template.form_footer')
