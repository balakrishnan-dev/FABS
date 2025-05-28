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
                                        <h4 class="mb-sm-0">Colour&Colour Form</h4>

                                        <div class="page-title-right">
                                            <ol class="breadcrumb m-0">
                                                <li class="breadcrumb-item"><a href="javascript: void(0);">Colour Forms</a></li>
                                                <li class="breadcrumb-item active">Colour</li>
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
                <h4 class="card-title mb-0 flex-grow-1">Add Colour & Currency</h4>
            </div><!-- end card header -->

            <div class="card-body">
                <div class="live-preview">
                <form action="{{ route('colours.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                <label for="colour_name" class="form-label">Colour Name</label>
                <input type="text" name="colour_name" id="colour_name" class="form-control" value="{{ old('colour_name') }}">
                @error('colour_name')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="tamil_colour_name" class="form-label">Tamil Colour Name</label>
                <select name="tamil_colour_name" id="tamil_colour_name" class="form-select">
                    <option value="">Select Tamil Colour</option>
                    @foreach($tamilColours as $tamilColour)
                        <option value="{{ $tamilColour }}" {{ old('tamil_colour_name') == $tamilColour ? 'selected' : '' }}>
                            {{ $tamilColour }}
                        </option>
                    @endforeach
                </select>
                @error('tamil_colour_name')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

    <button type="submit" class="btn btn-success">Add</button>
    <a href="{{ route('colours.index') }}" class="btn btn-secondary">Back</a>
</form>

                </div>
            </div>
        </div>
    </div> <!-- end col -->
</div>

@include('template.form_footer')
