@include('template.form_header') 
@include('template.form_sidebar')

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xxl-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Edit W Adjustment Entry</h4>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('w-adjustment.update', $entry->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="mb-3">
                                    <label for="ledger_id" class="form-label">Ledger</label>
                                    <select name="ledger_id" class="form-select">
                                        <option value="">-- Select Ledger --</option>
                                        @foreach($ledgers as $ledger)
                                            <option value="{{ $ledger->id }}" {{ $ledger->id == $entry->ledger_id ? 'selected' : '' }}>
                                                {{ $ledger->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('ledger_id')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="date" class="form-label">Date</label>
                                    <input type="date" name="date" class="form-control" value="{{ old('date', $entry->date) }}" >
                                    @error('date')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="amount" class="form-label">Amount</label>
                                    <input type="number" name="amount" step="0.01" class="form-control" value="{{ old('amount', $entry->amount) }}" >
                                    @error('amount')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="type" class="form-label">Type</label>
                                    <select name="type" class="form-select">
                                        <option value="credit" {{ old('type', $entry->type) == 'credit' ? 'selected' : '' }}>Credit</option>
                                        <option value="debit" {{ old('type', $entry->type) == 'debit' ? 'selected' : '' }}>Debit</option>
                                    </select>
                                    @error('type')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="note" class="form-label">Note</label>
                                    <textarea name="note" class="form-control" rows="3">{{ old('note', $entry->note) }}</textarea>
                                    @error('note')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="{{ route('w-adjustment.index') }}" class="btn btn-secondary">Back</a>
                            </form>
                        </div>
                    </div>
                </div> 
            </div>
        </div> 
    </div> 
</div>

@include('template.form_footer')
