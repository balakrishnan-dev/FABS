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
                                        <h4 class="mb-sm-0">Edit Country Form</h4>

                                        <div class="page-title-right">
                                            <ol class="breadcrumb m-0">
                                                <li class="breadcrumb-item"><a href="javascript: void(0);">Country</a></li>
                                                <li class="breadcrumb-item active">Country</li>
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
                <h4 class="card-title mb-0 flex-grow-1">Edit Country</h4>
            </div><!-- end card header -->

            <div class="card-body">
                <div class="live-preview">
                    <!-- The action is updated to 'update' route with the correct Country ID -->
               <form action="{{ route('companies.update', $company->id) }}" method="POST">
    @csrf
    @method('PUT') <!-- This is necessary to use the PUT method for update -->
    <div class="row">
        <div class="col-md-6 mb-3">
            <label>Financial Year From</label>
            <input type="date" name="financial_year_from" value="{{ old('financial_year_from', $company->financial_year_from) }}" class="form-control @error('financial_year_from') is-invalid @enderror">
            @error('financial_year_from')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-6 mb-3">
            <label>Financial Year To</label>
            <input type="date" name="financial_year_to" value="{{ old('financial_year_to', $company->financial_year_to) }}" class="form-control @error('financial_year_to') is-invalid @enderror">
            @error('financial_year_to')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-6 mb-3">
            <label>Company Name</label>
            <input type="text" name="company_name" value="{{ old('company_name', $company->company_name) }}" class="form-control @error('company_name') is-invalid @enderror">
            @error('company_name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-6 mb-3">
            <label>Nature of Business</label>
            <input type="text" name="nature_of_business" value="{{ old('nature_of_business', $company->nature_of_business) }}" class="form-control @error('nature_of_business') is-invalid @enderror">
            @error('nature_of_business')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-12 mb-3">
            <label>Address</label>
            <textarea name="address" class="form-control @error('address') is-invalid @enderror" rows="2">{{ old('address', $company->address) }}</textarea>
            @error('address')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-4 mb-3">
            <label>Place</label>
            <input type="text" name="place" value="{{ old('place', $company->place) }}" class="form-control @error('place') is-invalid @enderror">
            @error('place')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-4 mb-3">
            <label>Pin</label>
            <input type="text" name="pin" value="{{ old('pin', $company->pin) }}" class="form-control @error('pin') is-invalid @enderror">
            @error('pin')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-4 mb-3">
            <label>STD</label>
            <input type="text" name="std" value="{{ old('std', $company->std) }}" class="form-control @error('std') is-invalid @enderror">
            @error('std')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-4 mb-3">
            <label>Phone No</label>
            <input type="text" name="phone_no" value="{{ old('phone_no', $company->phone_no) }}" class="form-control @error('phone_no') is-invalid @enderror">
            @error('phone_no')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-4 mb-3">
            <label>Fax</label>
            <input type="text" name="fax" value="{{ old('fax', $company->fax) }}" class="form-control @error('fax') is-invalid @enderror">
            @error('fax')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-4 mb-3">
            <label>TEL</label>
            <input type="text" name="tel" value="{{ old('tel', $company->tel) }}" class="form-control @error('tel') is-invalid @enderror">
            @error('tel')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-6 mb-3">
            <label>Income Tax No</label>
            <input type="text" name="income_tax_no" value="{{ old('income_tax_no', $company->income_tax_no) }}" class="form-control @error('income_tax_no') is-invalid @enderror">
            @error('income_tax_no')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-6 mb-3">
            <label>Sales Tax No</label>
            <input type="text" name="sales_tax_no" value="{{ old('sales_tax_no', $company->sales_tax_no) }}" class="form-control @error('sales_tax_no') is-invalid @enderror">
            @error('sales_tax_no')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-6 mb-3">
            <label>CST No</label>
            <input type="text" name="cst_no" value="{{ old('cst_no', $company->cst_no) }}" class="form-control @error('cst_no') is-invalid @enderror">
            @error('cst_no')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    <div class="col-md-6 mb-3">
        <label>Email</label>
        <input type="email" name="email" value="{{ old('email', $company->email) }}" class="form-control">
    </div>

    <div class="col-md-6 mb-3">
        <label>TIN No</label>
        <input type="text" name="tin_no" value="{{ old('tin_no', $company->tin_no) }}" class="form-control">
    </div>

    <div class="col-md-6 mb-3">
        <label>ECC No</label>
        <input type="text" name="ecc_no" value="{{ old('ecc_no', $company->ecc_no) }}" class="form-control">
    </div>

    <div class="col-md-6 mb-3">
        <label>CERC No</label>
        <input type="text" name="cerc_no" value="{{ old('cerc_no', $company->cerc_no) }}" class="form-control">
    </div>

    <div class="col-md-6 mb-3">
        <label>Range</label>
        <input type="text" name="range" value="{{ old('range', $company->range) }}" class="form-control">
    </div>

    <div class="col-md-6 mb-3">
        <label>Division</label>
        <input type="text" name="division" value="{{ old('division', $company->division) }}" class="form-control">
    </div>

    <div class="col-md-6 mb-3">
        <label>Commission Rate (%)</label>
        <input type="number" name="commission_rate" step="0.01" value="{{ old('commission_rate', $company->commission_rate) }}" class="form-control">
    </div>

    <div class="col-md-6 mb-3">
        <label>Location Code No</label>
        <input type="text" name="location_code_no" value="{{ old('location_code_no', $company->location_code_no) }}" class="form-control">
    </div>

    <div class="col-md-6 mb-3">
        <label>PAN No</label>
        <input type="text" name="pan_no" value="{{ old('pan_no', $company->pan_no) }}" class="form-control">
    </div>

    <div class="col-md-6 mb-3">
        <label>Default Year</label>
        <input type="text" name="default_year" value="{{ old('default_year', $company->default_year) }}" class="form-control">
    </div>

    <div class="col-md-6 mb-3">
        <label>Remarks</label>
        <textarea name="remarks" class="form-control">{{ old('remarks', $company->remarks) }}</textarea>
    </div>

    <div class="col-md-6 mb-3">
        <label>Types</label>
        <select name="types" class="form-control">
            <option value="">-- Select --</option>
            <option value="single" {{ old('types', $company->types) == 'single' ? 'selected' : '' }}>Single</option>
            <option value="many" {{ old('types', $company->types) == 'many' ? 'selected' : '' }}>Many</option>
        </select>
    </div>


        <div class="col-md-6 mb-3">
    <label>Password</label>
    <input type="password" name="password" value="{{ old('password', $company->password) }}" class="form-control @error('password') is-invalid @enderror">
    @error('password')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>




        <div class="col-md-6 mb-3">
            <label>Short Name</label>
            <input type="text" name="short_name" value="{{ old('short_name', $company->short_name) }}" class="form-control @error('short_name') is-invalid @enderror">
            @error('short_name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <button type="submit" class="btn btn-success">Update</button>
    <a href="{{ route('companies.index') }}" class="btn btn-secondary">Cancel</a>
</form>

                </div>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->

@include('template.form_footer')
