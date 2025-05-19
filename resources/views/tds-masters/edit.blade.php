@include('template.form_header')
@include('template.form_sidebar')

<!-- Left Sidebar End -->
<div class="vertical-overlay"></div>

<!-- Start right Content here -->
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">TDS Master</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">TDS</a></li>
                                <li class="breadcrumb-item active">Edit TDS</li>
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
                            <h4 class="card-title mb-0 flex-grow-1">Edit TDS Entry</h4>
                        </div>

                        <div class="card-body">
                            <div class="live-preview">
                                <form action="{{ route('tds-masters.update', $tdsMaster->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label>Date From</label>
                                            <input type="date" name="date_from" class="form-control" value="{{ old('date_from', $tdsMaster->date_from) }}" required>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label>Date To</label>
                                            <input type="date" name="date_to" class="form-control" value="{{ old('date_to', $tdsMaster->date_to) }}" required>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label>Ledger (Party)</label>
                                            <select name="ledger_id" class="form-control" required>
                                                <option value="">Select Ledger</option>
                                                @foreach($ledgers as $ledger)
                                                    <option value="{{ $ledger->id }}" {{ $tdsMaster->ledger_id == $ledger->id ? 'selected' : '' }}>
                                                        {{ $ledger->ledger_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label>Amount</label>
                                            <input type="number" step="0.01" name="amount" class="form-control" value="{{ old('amount', $tdsMaster->amount) }}">
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label>Bill No</label>
                                            <input type="text" name="bill_no" class="form-control" value="{{ old('bill_no', $tdsMaster->bill_no) }}">
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label>Bank</label>
                                            <select name="bank_id" class="form-control">
                                                <option value="">Select Bank</option>
                                                @foreach($banks as $bank)
                                                    <option value="{{ $bank->id }}" {{ $tdsMaster->bank_id == $bank->id ? 'selected' : '' }}>
                                                        {{ $bank->bank_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label>Type</label>
                                            <input type="text" name="type" class="form-control" value="{{ old('type', $tdsMaster->type) }}">
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Update</button>
                                    <a href="{{ route('tds-masters.index') }}" class="btn btn-secondary">Cancel</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>

        </div>
    </div>
</div>

@include('template.form_footer')
