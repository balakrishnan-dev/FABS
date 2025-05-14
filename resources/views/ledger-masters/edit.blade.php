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
                                <li class="breadcrumb-item active">Edit Ledger</li>
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
                            <h4 class="card-title mb-0 flex-grow-1">Edit Ledger</h4>
                        </div><!-- end card header -->

                        <div class="card-body">
                            <div class="live-preview">
                                <form action="{{ route('ledger-masters.update', $ledger->id) }}" method="POST">
                                    @method('PUT')
                                    @csrf

                                    <div class="mb-3">
                                        <label for="ledger_name" class="form-label">Ledger Name</label>
                                        <input type="text" name="ledger_name" class="form-control" value="{{ old('ledger_name', $ledger->ledger_name) }}" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="group_id" class="form-label">Group</label>
                                        <select name="group_id" class="form-control" required>
                                            <option value="">Select Group</option>
                                            @foreach($groups as $group)
                                                <option value="{{ $group->id }}" {{ old('group_id', $ledger->group_id) == $group->id ? 'selected' : '' }}>
                                                    {{ $group->group_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="opening_balance" class="form-label">Opening Balance</label>
                                        <input type="number" name="opening_balance" class="form-control" value="{{ old('opening_balance', $ledger->opening_balance) }}" step="0.01" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="balance_type" class="form-label">Balance Type</label>
                                        <select name="balance_type" class="form-control" required>
                                            <option value="Debit" {{ old('balance_type', $ledger->balance_type) == 'Debit' ? 'selected' : '' }}>Debit</option>
                                            <option value="Credit" {{ old('balance_type', $ledger->balance_type) == 'Credit' ? 'selected' : '' }}>Credit</option>
                                        </select>
                                    </div>

                                    <button type="submit" class="btn btn-success">Update</button>
                                    <a href="{{ route('ledger-masters.index') }}" class="btn btn-secondary">Back</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        </div>
    </div>

@include('template.form_footer')
