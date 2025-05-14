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
                                        <h4 class="mb-sm-0">Edit Bank Form</h4>

                                        <div class="page-title-right">
                                            <ol class="breadcrumb m-0">
                                                <li class="breadcrumb-item"><a href="javascript: void(0);">Banks</a></li>
                                                <li class="breadcrumb-item active">Banks List</li>
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
                <h4 class="card-title mb-0 flex-grow-1">Edit Banks</h4>
            </div><!-- end card header -->

            <div class="card-body">
                <div class="live-preview">
                    <!-- The action is updated to 'update' route with the correct Bank ID -->
                    <form action="{{ route('bank-masters.update', $bankMaster->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label>Bank Name</label>
                            <input type="text" name="bank_name" value="{{ $bankMaster->bank_name }}" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Account Number</label>
                            <input type="text" name="account_number" value="{{ $bankMaster->account_number }}" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>IFSC Code</label>
                            <input type="text" name="ifsc_code" value="{{ $bankMaster->ifsc_code }}" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Branch</label>
                            <input type="text" name="branch" value="{{ $bankMaster->branch }}" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="ledger_id" class="form-label">Ledger</label>
                            <select name="ledger_id" id="ledger_id" class="form-control">
                                <option value="">Select Ledger</option>
                                @foreach($ledgers as $ledger)
                                    <option value="{{ $ledger->id }}"
                                        {{ old('ledger_id', $bankMaster->ledger_id) == $ledger->id ? 'selected' : '' }}>
                                        {{ $ledger->ledger_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success">Update</button>
                        <a href="{{ route('bank-masters.index') }}" class="btn btn-secondary">Back</a>
                    </form>

                </div>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->

@include('template.form_footer')
