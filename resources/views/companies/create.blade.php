@include('template.form_header')
@include('template.form_sidebar')

<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>

<!-- Start right Content here -->
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <!-- Page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Company Form</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Company Management</a></li>
                                <li class="breadcrumb-item active">Add Company</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form Row -->
            <div class="row">
                <div class="col-xxl-6">
                    <div class="card">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Add Company</h4>
                        </div>
                        <div class="card-body">
                            <div class="live-preview">

                                <!-- Show validation errors -->
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul class="mb-0">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                         <form action="{{ route('companies.store') }}" method="POST">
                        @csrf
                <div class="form-group mb-3">
            <label>Financial Year From</label>
            <input type="date" name="financial_year_from" class="form-control @error('financial_year_from') is-invalid @enderror" value="{{ old('financial_year_from') }}">
            @error('financial_year_from')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
                <div class="form-group mb-3">
            <label>Financial Year To</label>
            <input type="date" name="financial_year_to" class="form-control @error('financial_year_to') is-invalid @enderror" value="{{ old('financial_year_to') }}">
            @error('financial_year_to')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
       
                <div class="form-group mb-3">
            <label>Company Name</label>
            <input type="text" name="company_name" class="form-control @error('company_name') is-invalid @enderror" value="{{ old('company_name') }}">
            @error('company_name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

                <div class="form-group mb-3">
            <label>Nature of Business</label>
            <input type="text" name="nature_of_business" class="form-control @error('nature_of_business') is-invalid @enderror" value="{{ old('nature_of_business') }}">
            @error('nature_of_business')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

                <div class="form-group mb-3">
            <label>Address</label>
            <textarea name="address" class="form-control @error('address') is-invalid @enderror" rows="2">{{ old('address') }}</textarea>
            @error('address')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

                <div class="form-group mb-3">
            <label>Place</label>
            <input type="text" name="place" class="form-control @error('place') is-invalid @enderror" value="{{ old('place') }}">
            @error('place')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

                <div class="form-group mb-3">
            <label>Pin</label>
            <input type="text" name="pin" class="form-control @error('pin') is-invalid @enderror" value="{{ old('pin') }}">
            @error('pin')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
                <div class="form-group mb-3">
            <label>STD</label>
            <input type="text" name="std" class="form-control @error('std') is-invalid @enderror" value="{{ old('std') }}">
            @error('std')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

                <div class="form-group mb-3">
            <label>Phone No</label>
            <input type="text" name="phone_no" class="form-control @error('phone_no') is-invalid @enderror" value="{{ old('phone_no') }}">
            @error('phone_no')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

                <div class="form-group mb-3">
            <label>Fax</label>
            <input type="text" name="fax" class="form-control @error('fax') is-invalid @enderror" value="{{ old('fax') }}">
            @error('fax')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

                <div class="form-group mb-3">
            <label>TEL</label>
            <input type="text" name="tel" class="form-control @error('tel') is-invalid @enderror" value="{{ old('tel') }}">
            @error('tel')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

                   <div class="form-group mb-3">
            <label>Income Tax No</label>
            <input type="text" name="income_tax_no" class="form-control @error('income_tax_no') is-invalid @enderror" value="{{ old('income_tax_no') }}">
            @error('income_tax_no')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

                <div class="form-group mb-3">
            <label>Sales Tax No</label>
            <input type="text" name="sales_tax_no" class="form-control @error('sales_tax_no') is-invalid @enderror" value="{{ old('sales_tax_no') }}">
            @error('sales_tax_no')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

                <div class="form-group mb-3">
            <label>CST No</label>
            <input type="text" name="cst_no" class="form-control @error('cst_no') is-invalid @enderror" value="{{ old('cst_no') }}">
            @error('cst_no')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

                <div class="form-group mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}">
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

       

                <div class="form-group mb-3">
            <label>Short Name</label>
            <input type="text" name="short_name" class="form-control @error('short_name') is-invalid @enderror" value="{{ old('short_name') }}">
            @error('short_name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

                <div class="form-group mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

                <div class="form-group mb-3">
            <label>TIN No</label>
            <input type="text" name="tin_no" class="form-control @error('tin_no') is-invalid @enderror" value="{{ old('tin_no') }}">
            @error('tin_no')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

                <div class="form-group mb-3">
            <label>ECC No</label>
            <input type="text" name="ecc_no" class="form-control @error('ecc_no') is-invalid @enderror" value="{{ old('ecc_no') }}">
            @error('ecc_no')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

                <div class="form-group mb-3">
            <label>CERC No</label>
            <input type="text" name="cerc_no" class="form-control @error('cerc_no') is-invalid @enderror" value="{{ old('cerc_no') }}">
            @error('cerc_no')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

                <div class="form-group mb-3">
            <label>Range</label>
            <input type="text" name="range" class="form-control @error('range') is-invalid @enderror" value="{{ old('range') }}">
            @error('range')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

                 <div class="form-group mb-3">
            <label>Division</label>
            <input type="text" name="division" class="form-control @error('division') is-invalid @enderror" value="{{ old('division') }}">
            @error('division')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

                  <div class="form-group mb-3">
            <label>Commission Rate</label>
            <input type="number" name="commission_rate" class="form-control @error('commission_rate') is-invalid @enderror" value="{{ old('commission_rate') }}">
            @error('commission_rate')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

                <div class="form-group mb-3">
            <label>Location Code No</label>
            <input type="text" name="location_code_no" class="form-control @error('location_code_no') is-invalid @enderror" value="{{ old('location_code_no') }}">
            @error('location_code_no')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

                <div class="form-group mb-3">
            <label>PAN No</label>
            <input type="text" name="pan_no" class="form-control @error('pan_no') is-invalid @enderror" value="{{ old('pan_no') }}">
            @error('pan_no')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

                <div class="form-group mb-3">
            <label>Default Year</label>
            <input type="text" name="default_year" class="form-control @error('default_year') is-invalid @enderror" value="{{ old('default_year') }}">
            @error('default_year')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
                <div class="form-group mb-3">
            <label>Remarks</label>
            <textarea name="remarks" class="form-control @error('remarks') is-invalid @enderror" rows="3" value="{{ old('remarks') }}"></textarea>
            @error('remarks')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
                <div class="form-group mb-3">
            <label>Types</label>
            <select name="types" class="form-control @error('types') is-invalid @enderror">
                <option value="">Select Type</option>
                <option value="single" {{ old('types') == 'single' ? 'selected' : '' }}>Single</option>
                <option value="many" {{ old('types') == 'many' ? 'selected' : '' }}>Many</option>
            </select>
            @error('types')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
    <button type="submit" class="btn btn-success">Create</button>
    <a href="{{ route('companies.index') }}" class="btn btn-secondary">Cancel</a>
</form>


                </div>
            </div>
        </div>
    </div> <!-- end col -->
</div>

@include('template.form_footer')
