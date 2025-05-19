@include('template.form_header')
@include('template.form_sidebar')
<!-- Vertical Overlay -->
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
                        <h4 class="mb-sm-0">Design Chart</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Deign</a></li>
                                <li class="breadcrumb-item active">Design Chart List</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>


             <!-- Loom Type -->
<div class="mb-3 col-md-4 d-flex align-items-center">
    <label for="loom_type" class="form-label me-2 mb-0" style="width: 100px;">Loom Type</label>
    <select name="loom_type" id="loom_type" class="form-select">
        <option value="">Loom Type</option>
        @foreach ($designs as $loom)
            <option value="{{ $loom->loom_type }}">{{ $loom->loom_type }}</option>
        @endforeach
    </select>
</div>

<!-- Order Type -->
<div class="mb-3 col-md-4 d-flex align-items-center">
    <label for="order_type" class="form-label me-2 mb-0" style="width: 100px;">Order Type</label>
    <select name="order_type" id="order_type" class="form-select">
        <option value="">Order Type</option>
        @foreach ($designs as $order)
            <option value="{{ $order->order_type }}">{{ $order->order_type }}</option>
        @endforeach
    </select>
</div>

<!-- CL No Text Input -->
<div class="mb-3 col-md-4 d-flex align-items-center">
    <label for="cl_no" class="form-label me-2 mb-0" style="width: 100px;">CL No</label>
    <input type="text" name="cl_no" id="cl_no" class="form-control" placeholder="Type CL No">
</div>

<!-- Design Name Input -->
<div class="mb-3 col-md-4 d-flex align-items-center">
    <label for="design_name" class="form-label me-2 mb-0" style="width: 100px;">Design Name</label>
    <input type="text" name="design_name" id="design_name" class="form-control" placeholder="Type Design Name">
</div>



             <label for="Buyer Information" class="form-label me-2 mb-0" style="width: 100px;">Buyer Information</label>

<!-- Read No -->
<div class="mb-3 col-md-5 d-flex align-items-center">
    <!-- Wider label pushes the input to the left -->
    <label for="read" class="form-label mb-0" style="width: 80px;">Read</label>

    <!-- Input container with enough space, input still smaller -->
    <div style="width: 246px;">
        <input type="text" name="read" id="read" class="form-control">
        @error('read')
            <div class="text-danger mt-1">{{ $message }}</div>
        @enderror
    </div>
</div>


<!-- Width No -->
<div class="mb-3 col-md-5 d-flex align-items-center">
    <!-- Wider label pushes the input to the left -->
    <label for="width" class="form-label mb-0" style="width: 80px;">Width</label>

    <!-- Input container with enough space, input still smaller -->
    <div style="width: 246px;">
        <input type="text" name="width" id="width" class="form-control">
        @error('width')
            <div class="text-danger mt-1">{{ $message }}</div>
        @enderror
    </div>
</div>

<!-- Pick No -->
<div class="mb-3 col-md-5 d-flex align-items-center">
    <!-- Wider label pushes the input to the left -->
    <label for="pick" class="form-label mb-0" style="width: 80px;">Pick</label>

    <!-- Input container with enough space, input still smaller -->
    <div style="width: 246px;">
        <input type="text" name="pick" id="pick" class="form-control">
        @error('pick')
            <div class="text-danger mt-1">{{ $message }}</div>
        @enderror
    </div>
</div>

<!-- Order No -->
<div class="mb-3 col-md-5 d-flex align-items-center">
    <!-- Wider label pushes the input to the left -->
    <label for="order_mts" class="form-label mb-0" style="width: 80px;">Order Mts</label>

    <!-- Input container with enough space, input still smaller -->
    <div style="width: 246px;">
        <input type="text" name="order_mts" id="order_mts" class="form-control">
        @error('order_mts')
            <div class="text-danger mt-1">{{ $message }}</div>
        @enderror
    </div>
</div>
<!-- Welt mts -->
<div class="mb-3 col-md-5 d-flex align-items-center">
    <!-- Wider label pushes the input to the left -->
    <label for="welt_mts" class="form-label mb-0" style="width: 80px;">Welt Mts</label>

    <!-- Input container with enough space, input still smaller -->
    <div style="width: 246px;">
        <input type="text" name="welt_mts" id="welt_mts" class="form-control">
        @error('welt_mts')
            <div class="text-danger mt-1">{{ $message }}</div>
        @enderror
    </div>
</div>

<!-- We.Ord mts -->
<div class="mb-3 col-md-5 d-flex align-items-center">
    <!-- Wider label pushes the input to the left -->
    <label for="weaver_mts" class="form-label mb-0" style="width: 80px;">We. Ord Mts</label>

    <!-- Input container with enough space, input still smaller -->
    <div style="width: 246px;">
        <input type="text" name="weaver_mts" id="weaver_mts" class="form-control">
        @error('weaver_mts')
            <div class="text-danger mt-1">{{ $message }}</div>
        @enderror
    </div>
 </div>

    
    <!-- Fixed Recent Designs Box -->
    <div style="position: fixed; bottom: 200px; right: 40px; z-index: 1050; width: 300px;">
        <div class="card border border-primary shadow">
            <div class="card-header bg-primary text-white py-2 px-3">
                <strong>Recent Designs</strong>
            </div>
            <div class="card-body p-2" style="max-height: 700px; overflow-y: auto;">
                @if($storedDesigns->count())
                    <ul class="list-group list-group-flush" id="recent-designs-list">
                        @foreach($storedDesigns as $item)
                            <li class="list-group-item px-2 py-1 d-flex justify-content-between align-items-center"
                                data-clno="{{ strtolower($item->cl_no) }}"
                                data-design="{{ strtolower($item->design_name) }}">
                                <span>{{ $item->cl_no }}</span>
                                <span class="badge bg-secondary">{{ $item->design_name }}</span>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-muted mb-0">No designs available.</p>
                @endif
            </div>
        </div>
    </div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    let debounceTimer;

    // Clear all input fields
    function clearFields() {
        $('#design_name, #read, #width, #pick, #order_mts, #welt_mts, #weaver_mts').val('');
    }

    // Filter the recent designs list based on CL No and Design Name input
    function filterRecentDesigns() {
        let clNoInput = $('#cl_no').val().toLowerCase().trim();
        let designInput = $('#design_name').val().toLowerCase().trim();

        $('#recent-designs-list li').each(function () {
            let itemClNo = $(this).data('clno');
            let itemDesign = $(this).data('design');

            let clNoMatch = clNoInput === '' || itemClNo.includes(clNoInput);
            let designMatch = designInput === '' || itemDesign.includes(designInput);

            if (clNoMatch && designMatch) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    }

    // Auto-fill design details by CL No from server
    function fetchDesignDetails(clNo) {
        fetch(`/get-design-by-clno/${encodeURIComponent(clNo)}`)
            .then(res => res.ok ? res.json() : null)
            .then(data => {
                if (data) {
                    $('#design_name').val(data.design_name);
                    $('#read').val(data.read);
                    $('#width').val(data.width);
                    $('#pick').val(data.pick);
                    $('#order_mts').val(data.order_mts);
                    $('#welt_mts').val(data.welt_mts);
                    $('#weaver_mts').val(data.weaver_mts);
                } else {
                    clearFields();
                }
                filterRecentDesigns(); // Re-filter after auto-fill
            })
            .catch(() => {
                clearFields();
                filterRecentDesigns();
            });
    }

    // Handle CL No input with debounce
    $('#cl_no').on('input', function () {
        clearTimeout(debounceTimer);
        const clNo = $(this).val().toLowerCase().trim();

        filterRecentDesigns(); // Immediate filter

        debounceTimer = setTimeout(function () {
            if (clNo !== '') {
                fetchDesignDetails(clNo);
            } else {
                clearFields();
                filterRecentDesigns();
            }
        }, 400); // Delay for debounce
    });

 // Call filterRecentDesigns on input
$('#cl_no').on('input', function () {
    filterRecentDesigns();
});
$('#design_name').on('input', function () {
    filterRecentDesigns();
});

    // Click on a recent design to populate CL No and trigger input
    $(document).on('click', '.list-group-item', function () {
        const clNo = $(this).find('span:first').text().trim();
        $('#cl_no').val(clNo).trigger('input');
    });
</script>



@include('template.form_footer')
