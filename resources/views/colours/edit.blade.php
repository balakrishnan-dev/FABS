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
                                        <h4 class="mb-sm-0">Edit Colour Form</h4>

                                        <div class="page-title-right">
                                            <ol class="breadcrumb m-0">
                                                <li class="breadcrumb-item"><a href="javascript: void(0);">Colour</a></li>
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
                <h4 class="card-title mb-0 flex-grow-1">Edit Colour</h4>
            </div><!-- end card header -->

            <div class="card-body">
                <div class="live-preview">
                    <!-- The action is updated to 'update' route with the correct colour ID -->
                    <form action="{{ route('colours.update', $colours->id) }}" method="POST">
                        @csrf
                        @method('PUT') <!-- HTTP method spoofing for PUT request -->

                        <div class="mb-3">
                            <label for="colour_name" class="form-label">Colour Name</label>
                            <input type="text" name="colour_name" class="form-control" value="{{ old('colour_name', $colours->colour_name) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="tamil_colour_name" class="form-label">Tamil Colour Name</label>
                            <select name="tamil_colour_name" class="form-select" required>
                                <option value="">Select Tamil Colour</option>
                                @foreach($tamilColours as $tamilColour)
                                    <option value="{{ $tamilColour }}" {{ old('tamil_colour_name', $colours->tamil_colour_name) == $tamilColour ? 'selected' : '' }}>
                                        {{ $tamilColour }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-success">Update</button>
                        <a href="{{ route('colours.index') }}" class="btn btn-secondary">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->

@include('template.form_footer')
