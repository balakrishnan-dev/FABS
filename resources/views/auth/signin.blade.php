

            <!-- auth page content -->
            <div class="auth-page-content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="text-center mt-sm-5 mb-4 text-white-50">
                                <div>
                                    <a href="index.html" class="d-inline-block auth-logo">
                                        <img src="assets/images/SRI RAMLAKSHMAN FABS.jpg" alt="" height="100" width="100">
                                    </a>
                                </div>
                                <p class="mt-3 fs-15 fw-semibold">Premium Admin & Dashboard Template</p>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row justify-content-center">
                        <div class="col-md-8 col-lg-6 col-xl-5">
                            <div class="card mt-4">
                            
                                <div class="card-body p-4"> 
                                    <div class="text-center mt-2">
                                        <h5 class="text-primary">Welcome Back !</h5>
                                        <p class="text-muted">Sign in to continue to SRI RAMLAKSHMAN FABS.</p>
                                    </div>
                                    <div class="p-2 mt-4">
                                    <form method="POST" action="{{ route('signin') }}">
                                    @csrf
                                            <div class="mb-3">
                                            <div class="mb-3">
                                                <label for="email" class="form-label">Email</label>
                                                <input 
                                                    type="email" 
                                                    class="form-control" 
                                                    id="email" 
                                                    name="email" 
                                                    value="{{ old('email') }}" 
                                                    placeholder="Enter your email" 
                                                    required 
                                                    autofocus
                                                >
                                            </div>
                                            </div>
                    
                            
                                                <label class="form-label" for="password">Password</label>
                                                        <div class="position-relative auth-pass-inputgroup mb-3">
                                                            <input 
                                                                type="password" 
                                                                class="form-control pe-5" 
                                                                id="password" 
                                                                name="password" 
                                                                placeholder="Enter password" 
                                                                required
                                                            >
                                                            <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted" type="button" id="password-addon">
                                                                <i class="ri-eye-fill align-middle"></i>
                                                            </button>
                                                        </div>
                                                </div>
                                            
                                            <div class="mt-4">
                                                <button class="btn btn-success w-100" type="submit">Sign In</button>
                                            </div>

                                           
                                        </form>
                            
                            

                        </div>
                    </div>
                    <!-- end row -->
                </div>
                <!-- end container -->
            </div>
            <!-- end auth page content -->

   
        </div>
        <!-- end auth-page-wrapper -->

        <!-- JAVASCRIPT -->
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>
        <script src="assets/libs/feather-icons/feather.min.js"></script>
        <script src="assets/js/pages/plugins/lord-icon-2.1.0.js"></script>
        <script src="assets/js/plugins.js"></script>

        <!-- particles js -->
        <script src="assets/libs/particles.js/particles.js"></script>
        <!-- particles app js -->
        <script src="assets/js/pages/particles.app.js"></script>
        <!-- password-addon init -->
        <script src="assets/js/pages/password-addon.init.js"></script>
    </body>


<!-- Mirrored from themesbrand.com/velzon/html/creative/auth-signin-basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 10 Feb 2022 08:06:47 GMT -->
</html>