@include('template.form_header')
@include('template.form_sidebar')
<style>
    #message {
        position: fixed;
        top: 20px;
        right: 20px;
        z-index: 1050;
        width: 300px; /* or any width */
    }

    #clno_autocomplete_list {
        max-height: 200px;
        overflow-y: auto;
        border: 1px solid #ced4da;
        border-top: none;
        background-color: #fff;
        z-index: 1050;
    }

    #clno_autocomplete_list li {
        padding: 8px 12px;
        cursor: pointer;
    }

    #clno_autocomplete_list li:hover {
        background-color: #f8f9fa;
    }

    .autocomplete-colours-list {
        max-height: 200px;
        overflow-y: auto;
        position: absolute;
        width: 100%;
        z-index: 1000;
    }

    .autocomplete-colours-list li {
        cursor: pointer;
    }

    /* new css */

    .card {
        border-radius: 8px;
        background: #f8f9fa;
        /* box-shadow: 0px 5px 12px #dbdbdb !important; */
        border: none;
    }

    h5 {
        font-family: Nunito, sans-serif !important;
        font-weight: 700 !important;
        font-size: 15px !important;
        text-transform: uppercase;
        color: #495057 !important;
    }

    .inside-color {
        background: #fff;
        box-shadow: 0px 5px 12px #dbdbdb !important;
        padding: 20px;
    }

    /* new */

    /* Form label styling */
    .form-label {
        font-size: 0.85rem;
        font-weight: 500;
        color: #495057;
        margin-bottom: 0.3rem;
    }

    /* Form control styling */
    .form-control-sm,
    .form-select-sm {
        border: 1px solid #dee2e6;
        border-radius: 4px;
        padding: 0.4rem 0.7rem;
        font-size: 0.875rem;
        transition: all 0.2s ease-in-out;
    }

    .form-control-sm:focus,
    .form-select-sm:focus {
        border-color: #4361ee;
        box-shadow: 0 0 0 0.2rem rgba(67, 97, 238, 0.15);
        outline: none;
    }

    /* Autocomplete dropdown styling */
    #clno_autocomplete_list {
        border: 1px solid #dee2e6;
        border-radius: 0 0 4px 4px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        max-height: 200px;
        overflow-y: auto;
    }

    #clno_autocomplete_list .list-group-item {
        padding: 0.5rem 0.75rem;
        font-size: 0.875rem;
        cursor: pointer;
        transition: background-color 0.2s;
    }

    #clno_autocomplete_list .list-group-item:hover {
        background-color: #e9ecef;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .inside-color {
            padding: 1rem;
        }

        .col-md-3 {
            margin-bottom: 0.75rem;
        }
    }

    /* Placeholder styling */
    ::placeholder {
        color: #adb5bd;
        opacity: 0.7;
    }

    /* Optional hover effects */
    .form-control-sm:hover,
    .form-select-sm:hover {
        border-color: #adb5bd;
    }

    /* new */
    /* Button styling */
    .btn-sm {
        padding: 0.375rem 0.75rem;
        font-size: 0.875rem;
        border-radius: 4px;
        transition: all 0.2s;
    }

    .btn-primary {
        background-color: #4361ee;
        border-color: #3a56d4;
    }

    .btn-primary:hover {
        background-color: #3a56d4;
        border-color: #304bc1;
    }

    /* Action buttons styling */
    .btn-group .btn-sm {
        font-weight: 500;
        letter-spacing: 0.02em;
        text-transform: uppercase;
        font-size: 0.75rem;
        padding: 0.5rem 0.75rem;
    }

    .btn-group .btn-sm:hover {
        transform: translateY(-1px);
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .btn-group .btn-sm:active {
        transform: translateY(0);
        box-shadow: none;
    }

    /* Custom button styling for the action buttons */
    .btn-group .btn-sm {
        background-color: #4361ee;
        color: white;
        border: 1px solid #3a56d4;
        border-radius: 4px !important;
        margin: 0 2px;
    }

    /* Row spacing */
    .inside-color .row+.row,
    .inside-color br+.row {
        margin-top: 1rem;
    }

    /* Input groups with labels */
    .col-auto.d-flex.align-items-center {
        margin-right: 1rem;
        margin-bottom: 0.5rem;
    }

    .col-auto.d-flex.align-items-center .form-label {
        min-width: 80px;
        margin-bottom: 0;
        font-weight: 500;
    }

    /* Fixed width inputs */
    input[style*="width: 100px"] {
        min-width: 100px;
    }

    /* Design chart dropdown */
    #designChart {
        width: 100%;
    }

    /* Change design button */
    #changeDesignBtn {
        width: 100%;
        white-space: nowrap;
    }

    /* Responsive adjustments for the button group */
    @media (max-width: 768px) {
        .btn-group {
            flex-wrap: wrap;
        }

        .btn-group .btn-sm {
            flex: 1 0 30%;
            margin-bottom: 0.5rem;
        }
    }

    /* Improved spacing for mobile */
    @media (max-width: 576px) {
        .col-auto.d-flex.align-items-center {
            width: 100%;
            margin-right: 0;
        }

        .col-auto.d-flex.align-items-center .form-label {
            min-width: 100px;
        }
    }
    .modal-dialog:not(.modal-dialog-scrollable) .modal-header{
        padding-bottom: 16px !important;
    }
    .modal-dialog:not(.modal-dialog-scrollable) .modal-footer{
        padding-top: 12px !important;
    }
    option,input,select,button,td,tr,label{
        font-family: Nunito, sans-serif !important;
    }
    .g-10{
        gap:10px;
    }
    .p-in-10{
        padding-inline: 10px;
    }
</style>

<!-- Vertical Overlay -->
<div class="vertical-overlay"></div>

<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <!-- Start Page Title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-   center justify-content-between">
                        <h4 class="mb-sm-0">Design Chart</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Design</a></li>
                                <li class="breadcrumb-item active">Design Chart List</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Page Title -->

            <!-- Main Form Card -->
            <div class="row">
                <div id="printableArea">
                <div class="col-lg-12">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <div id="customerList">
                                <form action="{{ route('design_charts.store') }}" method="POST" id="designChartForm">
                                    @csrf
                                    <div class="row g-3">
                                        <div class="col-12">
                                            <div class="inside-color">
                                                <h5 class="mb-3">Design & Buyer Info</h5>
                                                <div class="row g-3 align-items-end">
                                                    <!-- Loom Type -->
                                                    <div class="col-md-3">
                                                        <label for="loom_type" class="form-label">Loom Type</label>
                                                        <select name="loom_type" id="loom_type"
                                                            class="form-select form-select-sm">
                                                            <option value="">Select</option>
                                                            @foreach ($designs as $loom)
                                                                <option value="{{ $loom->loom_type }}">
                                                                    {{ $loom->loom_type }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                            @error('read')
                                                                <div class="text-danger mt-1">{{ $message }}</div>
                                                            @enderror
                                                    </div>

                                                    <!-- Order Type -->
                                                    <div class="col-md-3">
                                                        <label for="order_type" class="form-label">Order Type</label>
                                                        <select name="order_type" id="order_type"
                                                            class="form-select form-select-sm">
                                                            <option value="">Select</option>
                                                            @foreach ($designs as $order)
                                                                <option value="{{ $order->order_type }}">
                                                                    {{ $order->order_type }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        @error('read')
                                                                <div class="text-danger mt-1">{{ $message }}</div>
                                                            @enderror
                                                    </div>

                                                    <!-- CL No -->
                                                    <div class="col-md-3 position-relative">
                                                        <label for="cl_no" class="form-label">CL No</label>
                                                        <input type="text" name="cl_no" id="cl_no"
                                                            class="form-control form-control-sm" placeholder="CL No"
                                                            autocomplete="off">
                                                        <ul id="clno_autocomplete_list"
                                                            class="list-group position-absolute w-100 d-none z-3"></ul>
                                                            @error('read')
                                                                <div class="text-danger mt-1">{{ $message }}</div>
                                                            @enderror
                                                    </div>

                                                    <!-- Design Name -->
                                                    <div class="col-md-3">
                                                        <label for="design_name" class="form-label">Design Name</label>
                                                        <input type="text" name="design_name" id="design_name"
                                                            class="form-control form-control-sm"
                                                            placeholder="Design Name">
                                                            @error('read')
                                                                <div class="text-danger mt-1">{{ $message }}</div>
                                                            @enderror
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="inside-color">
                                                <h5 class="mb-3">Buyer Information</h5>
                                                <div class="row">
                                                    <!-- Read, Pick, Width -->
                                                    <div class="col-md-4">
                                                        <label for="read" class="form-label">Read</label>
                                                        <input type="number" name="read" id="read"
                                                            class="form-control form-control-sm">
                                                            @error('read')
                                                                <div class="text-danger mt-1">{{ $message }}</div>
                                                            @enderror
                                                    </div>
                                        

                                                    <div class="col-md-4">
                                                        <label for="pick" class="form-label">Pick</label>
                                                        <input type="number" name="pick" id="pick"
                                                            class="form-control form-control-sm">
                                                            @error('pick')
                                                                <div class="text-danger mt-1">{{ $message }}</div>
                                                            @enderror
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="width" class="form-label">Width</label>
                                                        <input type="number" name="width" id="width"
                                                            class="form-control form-control-sm">
                                                            @error('width')
                                                                <div class="text-danger mt-1">{{ $message }}</div>
                                                            @enderror
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="order_mts" class="form-label">Order Mts</label>
                                                        <input type="number" name="order_mts" id="order_mts"
                                                            class="form-control form-control-sm">
                                                            @error('order_mts')
                                                                <div class="text-danger mt-1">{{ $message }}</div>
                                                            @enderror
                                                    </div>
                                                    <div class="col-md-5">
                                                        <label for="warp_ends" class="form-label">Warp Ends
                                                            (calculated)</label>
                                                        <input type="number" id="warp_ends" name="warp_ends"
                                                            class="form-control form-control-sm">
                                                            @error('warp_ends')
                                                                <div class="text-danger mt-1">{{ $message }}</div>
                                                            @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="inside-color">
                                                <h5 class="mb-3">On Loom (For Yarn Calculation) Reed & Pick
                                                    Info
                                                </h5>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label for="r_reed" class="form-label">Reed</label>
                                                        <input type="number" id="r_reed" name="r_reed"
                                                            class="form-control form-control-sm">

                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="r_pick" class="form-label">Pick</label>
                                                        <input type="number" name="r_pick" id="r_pick"
                                                            class="form-control form-control-sm">

                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="wa_weet" class="form-label">Wa Weet</label>
                                                        <input type="number" id="wa_weet" name="wa_weet"
                                                            class="form-control form-control-sm" step="any">

                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="we_weet" class="form-label">We Weet</label>
                                                        <input type="number" name="we_weet" id="we_weet"
                                                            class="form-control form-control-sm">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="weft_mts" class="form-label">WeFt Mts</label>
                                                        <input type="number" name="weft_mts" id="weft_mts"
                                                            class="form-control form-control-sm">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="pin" class="form-label">Pin</label>
                                                        <input type="number" name="pin" id="pin"
                                                            class="form-control form-control-sm">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="we_ord_mts" class="form-label">We.Ord.Mts</label>
                                                        <input type="number" name="we_ord_mts" id="we_ord_mts"
                                                            class="form-control form-control-sm">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Warp Details -->
                                        <div class="col-12">
                                            <div class="inside-color">
                                                <h5 class=" mb-3">Warp Details</h5>
                                                <div class="table-responsive">
                                                    <table class="table table-bordered align-middle m-0">
                                                        <thead class="table-primary text-center">
                                                            <tr>
                                                                <th style="width: 60px;">S.No</th>
                                                                <th>Count</th>
                                                                <th>Colour</th>
                                                                <th>Warp</th>
                                                                <th>Type</th>
                                                                <th>Set</th>
                                                                <th>Ext</th>
                                                                <th>DB</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($designs as $index => $designCount)
                                                                <tr>
                                                                    <td class="text-center" name="warps[0][count]" >{{ $index + 1 }}</td>
                                                                    <td>{{ $designCount->count }}</td>
                                                                    <td>
                                                                        <div class="position-relative">
                                                                            <input type="text" class="form-control colours" 
                                                                                placeholder="Enter colour" name="warps[0][colour]"
                                                                                autocomplete="off" />
                                                                            <ul
                                                                                class="list-group autocomplete-colours-list d-none">
                                                                            </ul>
                                                                        </div>
                                                                    </td>
                                                                    <td><input type="number" name="warps[0][warp]"
                                                                            class="form-control form-control-sm warp-field" />
                                                                    </td>
                                                                    <td><input type="text" name="warps[0][type]"
                                                                            class="form-control form-control-sm type-field" />
                                                                    </td>
                                                                    <td><input type="text" name="warps[0][set]"
                                                                            class="form-control form-control-sm set-field" />
                                                                    </td>
                                                                    <td><input type="text" name="warps[0][ext]"
                                                                            class="form-control form-control-sm ext-field" /></td>
                                                                    <td><input type="text" name="warps[0][db]"
                                                                            class="form-control form-control-sm" /></td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>


                                      <!-- Weft Details -->
                                        <div class="col-12">
                                            <div class="inside-color">
                                                <h5 class="mb-3">Weft Details</h5>
                                                <div class="table-responsive">
                                                    <table class="table table-bordered align-middle m-0">
                                                        <thead class="table-success text-center">
                                                            <tr>
                                                                <th style="width: 60px;">S.No</th>
                                                                <th>Count</th>
                                                                <th>Colour</th>
                                                                <th>Weft</th>
                                                                <th>Type</th>
                                                                <th>Set</th>
                                                                <th>Ext</th>
                                                                <th>DB</th>
                                                            </tr>
                                                        </thead>
                                                           <tbody>
                                                            @foreach($designs as $index => $designCount)
                                                                <tr>
                                                                    <td class="text-center">{{ $index + 1 }}</td>
                                                                    <td name="warps[1][count]">{{ $designCount->count }}</td>
                                                                    <td>
                                                                        <div class="position-relative">
                                                                            <input type="text" class="form-control colours" name="warps[1][colour]"
                                                                                placeholder="Enter colour"
                                                                                autocomplete="off" />
                                                                            <ul
                                                                                class="list-group autocomplete-colours-list d-none">
                                                                            </ul>
                                                                        </div>
                                                                    </td>
                                                                    <td> 
                                                                       <input type="number" name="warps[1][warp]" class="form-control form-control-sm weft-field" step="any"/>
                                                                    </td>
                                                                    <td><input type="text" name="warps[1][type]" 
                                                                            class="form-control form-control-sm type-field" />
                                                                    </td>
                                                                    <td><input type="text" 
                                                                            class="form-control form-control-sm set-field" />
                                                                    </td>
                                                                    <td><input type="text"
                                                                            class="form-control form-control-sm ext-field" /></td>
                                                                    <td><input type="text"
                                                                            class="form-control form-control-sm" /></td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div> 

                                    </div>
                           
                            </div>
                            </div>
                            <div class="col-12 mt-3">
                                <div class="inside-color">
                                    <div class="row align-items-center g-10">
                                        <!-- Design Chart -->
                                        <div class="col-md-2">
                                            <select class="form-select form-select-sm" id="designChart">
                                                <option selected> Design Chart</option>
                                                <option value="1">Design 1</option>
                                                <option value="2">Design 2</option>
                                                <option value="3">Design 3</option>
                                            </select>
                                        </div>

                                        <!-- Change Design Button -->
                                        <div class="col-md-2 d-flex align-items-end m-0">
                                            <button type="button" class="btn btn-sm btn-primary w-100" id="changeDesignBtn"
                                                data-bs-toggle="modal" data-bs-target="#colorModal">
                                                Change Design
                                            </button>
                                        </div>


                                        <!-- Wea. Wt -->
                                        <div class="col-auto d-flex align-items-center m-0">
                                            <label for="wea_wt" class="form-label mb-0 me-2"
                                                style="white-space: nowrap;">Wea.
                                                Wt</label>
                                            <input type="text" class="form-control form-control-sm" id="wea_wt" name="wea_wt"
                                                placeholder="Wea. Wt" style="width: 100px;">
                                        </div>

                                        <!-- Warp Wt -->
                                        <div class="col-auto d-flex align-items-center m-0">
                                            <label for="warp_wt" class="form-label mb-0 me-2"
                                                style="white-space: nowrap;">Warp
                                                Wt</label>
                                            <input type="text" class="form-control form-control-sm" id="warp_wt" name="warp_wt"
                                                placeholder="Warp Wt" style="width: 100px;" step="any"> 
                                        </div>  
                                            <!-- Total Picks Display -->
                                            <div class="col-auto d-flex align-items-center m-0">
                                                <label for="total_picks" class="form-label mb-0 me-2" style="white-space: nowrap;">Total Picks</label>
                                                <input type="number" name="total_picks" id="totalPicks" step="any" class="form-control" />
                                            </div>
                                    </div>
                                    <br>
                                    <!-- Row for 3 Inputs: Total Ends, Total Repeat, Extras -->
                                    <div class="row align-items-center m-0 g-10">

                                        <!-- Total Ends -->
                                        <div class="col-auto d-flex align-items-center m-0 p-0">
                                            <label for="totalEnds" class="form-label mb-0 me-2"
                                                style="white-space: nowrap;">Total
                                                Ends</label>
                                            <input type="number" class="form-control form-control-sm" id="totalEnds"
                                                placeholder="Ends" style="width: 100px;" step="any">
                                        </div>

                                        <!-- Extra Input 1 (No Label) -->
                                        <div class="col-auto d-flex align-items-center m-0 p-0">
                                            <input type="text" id="nearTotalEnds" class="form-control form-control-sm"
                                                style="width: 100px;" step="any">
                                        </div>

                                        <!-- Total Repeat -->
                                        <div class="col-auto d-flex align-items-center m-0 p-0">
                                            <label for="totalRepeat" class="form-label mb-0 me-2"
                                                style="white-space: nowrap;">Total
                                                Repeat</label>
                                            <input type="number" class="form-control form-control-sm" id="totalRepeat"
                                                placeholder="Repeat" style="width: 100px;" step="any">
                                        </div>

                                        <!-- Extras -->
                                        <div class="col-auto d-flex align-items-center m-0 p-0">
                                            <label for="extras" class="form-label mb-0 me-2"
                                                style="white-space: nowrap;">Extras</label>
                                            <input type="text" class="form-control form-control-sm" id="extras"
                                                placeholder="Extras" step="any">

                                        </div>
                                        <!-- Extra Input 1 (No Label) -->
                                        <div class="col-auto d-flex align-items-center m-0 p-0">
                                            <input type="text" id="nearextras" class="form-control form-control-sm"
                                                style="width: 100px;" step="any">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="btn-group w-100" role="group" aria-label="Action Buttons"
                                                style="gap: 4px;">
                                                <button type="submit" class="btn btn-sm flex-fill rounded-0" style="background-color: #0d6efd; color: white; border: 2px solid #0047b3;">Save</button>
                                                <button type="button" class="btn btn-sm flex-fill rounded-0" style="background-color: #0d6efd; color: white; border: 2px solid #0047b3;" onclick="printInvoice()">Print</button>
                                                <!-- Hidden invoice -->
                                                <div id="printArea" style="display:none;"></div>


                                                <button type="button" class="btn btn-sm flex-fill rounded-0"
                                                    style="background-color: #0d6efd; color: white; border: 2px solid #0047b3;">Continue</button>
                                                <button type="button" class="btn btn-sm flex-fill rounded-0"
                                                    style="background-color: #0d6efd; color: white; border: 2px solid #0047b3;">Delete</button>
                                                <button type="button" class="btn btn-sm flex-fill rounded-0"
                                                    style="background-color: #0d6efd; color: white; border: 2px solid #0047b3;">Picture</button>
                                                <button type="button" class="btn btn-sm flex-fill rounded-0"
                                                    style="background-color: #0d6efd; color: white; border: 2px solid #0047b3;">Exit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>
                    <div id="message-area" style="position: fixed; top: 20px; right: 20px; z-index: 9999;"></div>


                        <!-- Modal -->
                        <div class="modal fade" id="colorModal" tabindex="-1" aria-labelledby="colorModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form id="colorForm">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="colorModalLabel">Enter Colour Details</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- CL No -->
                                                <div id="popupForm">
                                                    <div class="md-3 position-relative">
                                                        <label for="popup_cl_no" class="form-label">CL No</label>
                                                        <input type="text" name="cl_no" id="popup_cl_no"
                                                            class="form-control form-control-sm cl-no-field"
                                                            placeholder="CL No" autocomplete="off">
                                                        <ul id="popup_clno_autocomplete_list"
                                                            class="list-group position-absolute w-100 d-none z-3"></ul>
                                                    </div>

                                                    <div class="md-3">
                                                        <label for="popup_design_name" class="form-label">Design Name</label>
                                                        <input type="text" name="design_name" id="popup_design_name"
                                                            class="form-control form-control-sm design-name-field"
                                                            placeholder="Design Name">
                                                    </div>
                                        
                                                    <!-- Colour Name -->
                                                    <div class="mb-3">
                                                        <label for="colourName" class="form-label">Colour Name</label>
                                                        <input type="text" class="form-control" id="colourName"
                                                            placeholder="Enter colour name" required>
                                                    </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary btn-sm"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary btn-sm">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>





                    </div>
                </div>
            </div>
        </div>
        <!-- End Main Form Card -->

    </div>
</div>
</div>
<!-- End main-content -->


            <!-- End main-content -->
        @include('template.form_footer')

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
let lastSavedData = null;

$('#designChartForm').on('submit', function (e) {
    e.preventDefault();

    // Clear old errors and messages
    $('.invalid-feedback').remove();           // Remove old error message elements
    $('.is-invalid').removeClass('is-invalid'); // Remove error classes
    $('#message-area').html('');                // Clear success message

    $.ajax({
        type: 'POST',
        url: '{{ route("design_charts.store") }}',
        data: $(this).serialize(),
        success: function (response) {
            if (response.status) {
                lastSavedData = response.data;

                // Show success message
                $('#message-area').html(`
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        ${response.message}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                `);

                // Optionally reset form after success
                $('#designChartForm')[0].reset();
            }
        },
        error: function(xhr) {
            if (xhr.status === 422) {
                // Validation errors from server
                let errors = xhr.responseJSON.errors;

                // Loop through errors and show next to each input
                for (let field in errors) {
                    let errorMessage = errors[field][0];
                    let input = $(`[name="${field}"]`);

                    input.addClass('is-invalid');

                    // Append or show error message
                    if (input.next('.invalid-feedback').length === 0) {
                        input.after(`<div class="invalid-feedback">${errorMessage}</div>`);
                    } else {
                        input.next('.invalid-feedback').text(errorMessage);
                    }
                }
            } else {
                // For other errors, show toastr error like your example
                toastr.error('An error occurred while saving the design.', 'Error', {
                    positionClass: 'toast-top-right',
                    timeOut: 5000,
                });
            }
        }
    });
});
</script>

<script>
$(document).ready(function () {
    function calculateTotalPicks() {
        let total = 0;
        $('.weft-field').each(function () {
            const val = parseFloat($(this).val());
            if (!isNaN(val)) {
                total += val;
            }
        });
        $('#totalPicks').val(total.toFixed(2)); // Make sure this ID matches the input field
        
    }

    // Recalculate total whenever any weft field changes
    $(document).on('input', '.weft-field', calculateTotalPicks);

    // Optional: Recalculate on page load if values exist
    calculateTotalPicks();
});
</script>

@if(session('success'))
    <script>
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "positionClass": "toast-top-right"
        };
        toastr.success("{{ session('success') }}");
    </script>
@endif

@if(session('error'))
    <script>
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "positionClass": "toast-top-right"
        };
        toastr.error("{{ session('error') }}");
    </script>
@endif  

<script>
function printInvoice() {
       if (!lastSavedData) {
        // Replace alert with toast notification
        toastr.error('No data to print.', 'Error', {
            positionClass: 'toast-top-right',
            timeOut: 5000,
        });
        return;
    }
    const data = lastSavedData;

    const printContent = `
        <div style="font-family: Arial, sans-serif; padding: 20px; border: 1px solid #333; max-width: 900px; margin: auto;">
    <h2 style="text-align: center; margin-bottom: 5px;">Design Chart Invoice</h2>
    <hr style="border: 1px solid #000;">

    <table border="1" cellspacing="0" cellpadding="8" style="width: 100%; border-collapse: collapse; font-size: 14px;">
        <tr>
            <th style="width: 25%; background-color: #f0f0f0;">Loom Type</th>
            <td>${data.loom_type}</td>
            <th style="width: 25%; background-color: #f0f0f0;">Order Type</th>
            <td>${data.order_type}</td>
        </tr>
        <tr>
            <th style="background-color: #f0f0f0;">CL No</th>
            <td>${data.cl_no}</td>
            <th style="background-color: #f0f0f0;">Design Name</th>
            <td>${data.design_name}</td>
        </tr>
        <tr>
            <th style="background-color: #f0f0f0;">Read</th>
            <td>${data.read}</td>
            <th style="background-color: #f0f0f0;">Pick</th>
            <td>${data.pick}</td>
        </tr>
        <tr>
            <th style="background-color: #f0f0f0;">Width</th>
            <td>${data.width}</td>
            <th style="background-color: #f0f0f0;">Order Mts</th>
            <td>${data.order_mts}</td>
        </tr>
        <tr>
            <th style="background-color: #f0f0f0;">Warp Ends</th>
            <td>${data.warp_ends}</td>
            <th style="background-color: #f0f0f0;">Reed</th>
            <td>${data.r_reed}</td>
        </tr>
        <tr>
            <th style="background-color: #f0f0f0;">Pick Text</th>
            <td>${data.r_pick}</td>
            <th style="background-color: #f0f0f0;">WA Weet</th>
            <td>${data.wa_weet}</td>
        </tr>
        <tr>
            <th style="background-color: #f0f0f0;">WE Weet</th>
            <td>${data.we_weet}</td>
            <th style="background-color: #f0f0f0;">Weft Mts</th>
            <td>${data.weft_mts}</td>
        </tr>
        <tr>
            <th style="background-color: #f0f0f0;">Pin</th>
            <td>${data.pin}</td>
            <th style="background-color: #f0f0f0;">We Ord Mts</th>
            <td>${data.we_ord_mts}</td>
        </tr>
        <tr>
            <th style="background-color: #f0f0f0;">Wea Wt</th>
            <td>${data.wea_wt}</td>
            <th style="background-color: #f0f0f0;">Warp Wt</th>
            <td>${data.warp_wt}</td>
        </tr>
        <tr>
            <th style="background-color: #f0f0f0;">Total Picks</th>
            <td colspan="3">${data.total_picks}</td>
        </tr>
    </table>
</div>

    `;

    const printWindow = window.open('', '', 'width=900,height=700');
    printWindow.document.write('<html><head><title>Print Invoice</title></head><body>');
    printWindow.document.write(printContent);
    printWindow.document.write('</body></html>');
    printWindow.document.close();
    printWindow.print();
}
</script>




<script>
    function setupClAutocomplete(containerSelector, clInputId, designFieldId, listId) {
    const $container = $(containerSelector);
    const $clInput = $container.find(clInputId);
    const $designInput = $container.find(designFieldId);
    const $list = $container.find(listId);

    let debounceTimer;

    $clInput.on('input focus', function () {
        clearTimeout(debounceTimer);
        const query = $clInput.val().trim().toLowerCase();

        if (query === '') {
            $list.empty().addClass('d-none');
            return;
        }

        debounceTimer = setTimeout(() => {
            $.get('/autocomplete-clno', { query }, function (data) {
                $list.empty();

                if (!data || data.length === 0) {
                    $list.addClass('d-none');
                    return;
                }

                data.forEach(item => {
                    $('<li class="list-group-item"></li>')
                        .text(item)
                        .on('mousedown', function () {
                            $clInput.val(item);
                            $list.addClass('d-none');
                            fetchPopupDesignDetails(item, $container);
                        })
                        .appendTo($list);
                });

                $list.removeClass('d-none');
            }).fail(() => $list.addClass('d-none'));
        }, 400);
    });

    $(document).on('click', function (e) {
        if (!$(e.target).closest(clInputId + ', ' + listId).length) {
            $list.addClass('d-none');
        }
    });

    function fetchPopupDesignDetails(clNo, container) {
        $.get(`/get-design-by-clno/${encodeURIComponent(clNo)}`, function (data) {
            if (data) {
                container.find(designFieldId).val(data.design_name);
            } else {
                container.find(designFieldId).val('');
            }
        }).fail(() => {
            container.find(designFieldId).val('');
        });
    }
}

// Call this after modal is opened or page is ready
setupClAutocomplete('#popupForm', '#popup_cl_no', '#popup_design_name', '#popup_clno_autocomplete_list');

        </script>
<script>
function calculateTotals() {
    let totalEnds = 0;

    // Sum of all ext-field values
    $('.ext-field').each(function () {
        let value = parseFloat($(this).val());
        if (!isNaN(value)) {
            totalEnds += value;
        }
    });

    $('#nearTotalEnds').val(totalEnds);

    // Multiply by Total Repeat
    let totalRepeat = parseFloat($('#totalRepeat').val());
    let extras = 0;

    if (!isNaN(totalEnds) && !isNaN(totalRepeat)) {
        extras = totalEnds * totalRepeat;
    }

    $('#extras').val(extras);
}

// Trigger on input for ext-field and totalRepeat
$(document).on('input', '.ext-field, #totalRepeat', calculateTotals);


</script>


<script>
document.addEventListener('DOMContentLoaded', function () {
    function calculateTotalEndsAndRepeat() {
        let totalEndsBase = 0;
        let hasSType = false;




        // Sum of warp and set fields (base total)
        document.querySelectorAll('.warp-field').forEach(input => {
            totalEndsBase += parseFloat(input.value) || 0;
        });

        document.querySelectorAll('.set-field').forEach(input => {
            totalEndsBase += parseFloat(input.value) || 0;
        });

        // Check if any type-field has value 'S'
        document.querySelectorAll('.type-field').forEach(input => {
            const value = (input.value || '').trim().toUpperCase();
            if (value === 'S') {
                hasSType = true;
            }
        });


        

        // Show totalEnds including 1 if S is found
        const displayTotalEnds = hasSType ? totalEndsBase + 1 : totalEndsBase;
        document.getElementById('totalEnds').value = displayTotalEnds;

        // Calculate repeat using base totalEnds (excluding extra 1 for S)
        const warpEnds = parseFloat(document.getElementById('warp_ends').value) || 0;
        const totalRepeat = totalEndsBase > 0 ? (warpEnds / totalEndsBase).toFixed(2) : '';
        document.getElementById('totalRepeat').value = totalRepeat;
    }

    // Listen for any relevant input changes
    document.addEventListener('input', function (e) {
        if (
            e.target.classList.contains('warp-field') ||
            e.target.classList.contains('set-field') ||
            e.target.classList.contains('type-field') ||
            e.target.id === 'warp_ends'
        ) {
            calculateTotalEndsAndRepeat();
        }
    });

    // Initial calculation on load
    calculateTotalEndsAndRepeat();
});
</script>




<script>
    function calculateWarpEnds() {
        let reed = parseFloat(document.getElementById('r_reed').value) || 0;
        let waWeet = parseFloat(document.getElementById('wa_weet').value) || 0;
        let result = (reed * waWeet).toFixed(2);

        // Update both warp_ends and nearextras
        document.getElementById('warp_ends').value = result;
        document.getElementById('nearextras').value = result;
    }

    document.addEventListener('DOMContentLoaded', function () {
        const rReed = document.getElementById('r_reed');
        const waWeet = document.getElementById('wa_weet');
        const warpEnds = document.getElementById('warp_ends');
        const nearextras = document.getElementById('nearextras');

        // When reed or wa_weet changes, recalculate
        rReed.addEventListener('input', calculateWarpEnds);
        waWeet.addEventListener('input', calculateWarpEnds);

        // When warp_ends is manually changed, update nearextras
        warpEnds.addEventListener('input', function () {
            nearextras.value = warpEnds.value;
        });
        // When warp_ends is manually changed, update nearextras
        nearextras.addEventListener('input', function () {
            warpEnds.value = nearextras.value;
        });
    });
</script>



<script>
    document.addEventListener('DOMContentLoaded',function(){
        const waWeetInput = document.getElementById('wa_weet');
        const warpWtInput = document.getElementById('warp_wt');
        waWeetInput.addEventListener('input', function(){
            warpWtInput.value = waWeetInput.value;
        })
    })
</script>
        

<script>
$(document).ready(function () {

    // --- 1. Dropdown Toggle ---
    const dropdown = document.getElementById('designDropdown');
    const dropdownBtn = document.getElementById('dropdownBtn');
    const dropdownContent = document.getElementById('dropdownContent');

    dropdownBtn?.addEventListener('click', () => {
        dropdown.classList.toggle('active');
    });

    dropdownContent?.querySelectorAll('a').forEach(option => {
        option.addEventListener('click', (e) => {
            e.preventDefault();
            dropdownBtn.textContent = option.getAttribute('data-value') + ' ▼';
            dropdown.classList.remove('active');
        });
    });

    window.addEventListener('click', (e) => {
        if (!dropdown.contains(e.target)) {
            dropdown.classList.remove('active');
        }
    });



    // --- 3. CL No Autocomplete and Fetch ---
    let debounceTimer;
    $('#cl_no').on('input', function () {
        clearTimeout(debounceTimer);
        const clNo = $(this).val().trim().toLowerCase();
        filterRecentDesigns();

        debounceTimer = setTimeout(() => {
            if (clNo !== '') {
                fetchDesignDetails(clNo);
            } else {
                clearFields();
                filterRecentDesigns();
            }
        }, 400);
    });

    function fetchDesignDetails(clNo) {
        $.get(`/get-design-by-clno/${encodeURIComponent(clNo)}`, function (data) {
            if (data) {
                $('#design_name').val(data.design_name);
                $('#read').val(data.read);
                $('#width').val(data.width);
                $('#pick').val(data.pick);
                $('#order_mts').val(data.order_mts);
                $('#weft_mts').val(data.weft_mts);
                $('#we_ord_mts').val(data.we_ord_mts);
            } else {
                clearFields();
            }
        }).fail(clearFields);
    }

    function clearFields() {
        $('#design_name, #read, #width, #pick, #order_mts, #weft_mts, #we_ord_mts').val('');
    }

    // --- 4. Recent Designs Filter ---
    function filterRecentDesigns() {
        const clNo = $('#cl_no').val().toLowerCase().trim();
        const design = $('#design_name').val().toLowerCase().trim();

        $('#recent-designs-list li').each(function () {
            const itemCl = $(this).data('clno');
            const itemDesign = $(this).data('design');

            const clMatch = !clNo || itemCl.includes(clNo);
            const designMatch = !design || itemDesign.includes(design);

            $(this).toggle(clMatch && designMatch);
        });
    }

    $('#design_name').on('input', filterRecentDesigns);

    // --- 5. CL No Autocomplete (Separate from filterRecentDesigns) ---
    $('#cl_no').on('input focus', function () {
        const query = $(this).val().trim();
        const $list = $('#clno_autocomplete_list');

        if (query.length === 0) {
            $list.empty().addClass('d-none');
            return;
        }

        $.get('/autocomplete-clno', { query }, function (data) {
            $list.empty();
            if (data.length === 0) {
                $list.addClass('d-none');
                return;
            }

            data.forEach(item => {
                $('<li class="list-group-item"></li>')
                    .text(item)
                    .on('mousedown', function () {
                        $('#cl_no').val(item);
                        $list.addClass('d-none');
                        fetchDesignDetails(item);
                    })
                    .appendTo($list);
            });

            $list.removeClass('d-none');
        }).fail(() => $list.addClass('d-none'));
    });

    $(document).on('click', function (e) {
        if (!$(e.target).closest('#cl_no, #clno_autocomplete_list').length) {
            $('#clno_autocomplete_list').addClass('d-none');
        }
    });

    // --- 6. Colour Suggestions ---
   let activeColourInput = null;
let suppressDropdown = false;

$(document).on('focus input', '.colours', function () {
    // Prevent showing dropdown immediately after a selection
    if (suppressDropdown) {
        suppressDropdown = false;
        return;
    }

    activeColourInput = $(this);
    const $dropdown = activeColourInput.siblings('.autocomplete-colours-list');
    const query = activeColourInput.val().trim();

    if (query.length === 0) {
        $dropdown.empty().addClass('d-none');
        return;
    }

    $.get("{{ route('design_chart.filter_colours') }}", { search: query }, function (colours) {
        $dropdown.empty();

        if (colours.length === 0) {
            $dropdown.append('<li class="list-group-item text-muted">No colours found.</li>').removeClass('d-none');
            return;
        }

        colours.forEach(colour => {
            $('<li class="list-group-item list-colour-item"></li>')
                .text(`${colour.colour_name} (${colour.tamil_colour_name})`)
                .attr('data-colour-name', colour.colour_name)
                .on('mousedown', function (e) {
                    e.preventDefault();

                    // Set value just once and suppress further triggering
                    activeColourInput.val($(this).data('colour-name'));

                    suppressDropdown = true;

                    // Hide dropdown shortly after
                    setTimeout(() => {
                        $dropdown.addClass('d-none');
                    }, 100);
                })
                .appendTo($dropdown);
        });

        $dropdown.removeClass('d-none');
    }).fail(() => {
        $dropdown.addClass('d-none');
    });
});

// Hide dropdown on blur (after short delay to allow click selection)
$(document).on('blur', '.colours', function () {
    const $dropdown = $(this).siblings('.autocomplete-colours-list');
    setTimeout(() => {
        $dropdown.addClass('d-none');
    }, 150);
});

// Optional: Close dropdown on outside click
$(document).on('click', function (e) {
    if (!$(e.target).closest('.colours, .autocomplete-colours-list').length) {
        $('.autocomplete-colours-list').addClass('d-none');
    }
});

    // --- 7. UI Toggle Cards Based on Focus ---
    $('#cl_no').on('focus click', () => {
        $('.recent-designs-card').show();
        $('.recent-colours-card').hide();
    });

    $(document).on('focus click', '.colours', function () {
        $('.recent-designs-card').hide();
        $('.recent-colours-card').show();
    });

    $(document).on('click', function (e) {
        if (!$(e.target).closest('#cl_no, .colours, #recent-designs-list, #recent-colours-list, .autocomplete-colours-list').length) {
            $('.recent-designs-card').show();
            $('.recent-colours-card').hide();
            $('.autocomplete-colours-list').addClass('d-none');
        }
    });

});
</script>
