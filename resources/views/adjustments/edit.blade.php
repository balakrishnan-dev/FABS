@include('template.form_header') 
@include('template.form_sidebar')

<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>

<!-- Start right Content here -->
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Adjustment Entry Form</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Accounts</a></li>
                                <li class="breadcrumb-item active">
                                    {{ isset($adjustment) ? 'Edit Adjustment Entry' : 'Add Adjustment Entry' }}
                                </li>
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
                            <h4 class="card-title mb-0 flex-grow-1">
                                {{ isset($adjustment) ? 'Edit Adjustment Entry' : 'Add Adjustment Entry' }}
                            </h4>
                        </div><!-- end card header -->

                        <div class="card-body">
                            <div class="live-preview">
                                <form 
                                    action="{{ isset($adjustment) ? route('adjustments.update', $adjustment->id) : route('adjustments.store') }}" 
                                    method="POST">
                                    @csrf
                                    @if(isset($adjustment))
                                        @method('PUT')
                                    @endif

                                    <div class="mb-3">
                                        <label for="date" class="form-label">Date</label>
                                        <input type="date" name="date" class="form-control" 
                                            value="{{ old('date', isset($adjustment) ? $adjustment->date : '') }}">
                                        @error('date')
                                            <div class="text-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="ledger" class="form-label">Ledger</label>
                                        <input type="text" name="ledger" class="form-control" 
                                            value="{{ old('ledger', isset($adjustment) ? $adjustment->ledger : '') }}">
                                        @error('ledger')
                                            <div class="text-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="amount" class="form-label">Amount</label>
                                        <input type="number" step="0.01" name="amount" class="form-control" 
                                            value="{{ old('amount', isset($adjustment) ? $adjustment->amount : '') }}">
                                        @error('amount')
                                            <div class="text-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="type" class="form-label">Type</label>
                                        <select name="type" class="form-select">
                                            <option value="">Select Type</option>
                                            <option value="debit" {{ old('type', $adjustment->type ?? '') == 'debit' ? 'selected' : '' }}>Debit</option>
                                            <option value="credit" {{ old('type', $adjustment->type ?? '') == 'credit' ? 'selected' : '' }}>Credit</option>
                                        </select>
                                        @error('type')
                                            <div class="text-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="note" class="form-label">Note</label>
                                        <textarea name="note" class="form-control" rows="3">{{ old('note', isset($adjustment) ? $adjustment->note : '') }}</textarea>
                                        @error('note')
                                            <div class="text-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <button type="submit" class="btn btn-success">
                                        {{ isset($adjustment) ? 'Update' : 'Save' }}
                                    </button>
                                    <a href="{{ route('adjustments.index') }}" class="btn btn-secondary">Back</a>
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
