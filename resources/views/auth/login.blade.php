<!doctype html>
<html lang="en" data-layout="twocolumn" data-sidebar="light" data-sidebar-size="lg">

    
<!-- Mirrored from themesbrand.com/velzon/html/creative/auth-signin-basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 10 Feb 2022 08:06:47 GMT -->
<head>
        
        <meta charset="utf-8" />
        <title>Sign In | SRI RAMLAKSHMAN FABS - Admin & Dashboard Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- Layout config Js -->
        <script src="assets/js/layout.js"></script>
        <!-- Bootstrap Css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />
        <!-- custom Css-->
        <link href="assets/css/custom.min.css" rel="stylesheet" type="text/css" />


    </head>

    <body>

        <div class="auth-page-wrapper pt-5">
            <!-- auth page bg -->
            <div class="auth-one-bg-position auth-one-bg"  id="auth-particles">
                <div class="bg-overlay"></div>
                
                <div class="shape">
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1440 120">
                        <path d="M 0,36 C 144,53.6 432,123.2 720,124 C 1008,124.8 1296,56.8 1440,40L1440 140L0 140z"></path>
                    </svg>
                </div>
            </div>

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
                                    <form method="POST" action="{{ route('login') }}">
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
                    
                                            <!-- <div class="mb-3">
                                                <div class="float-end">
                                                    <a href="auth-pass-reset-basic.html" class="text-muted">Forgot password?</a>
                                                </div> -->
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
<!-- 
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="auth-remember-check">
                                                <label class="form-check-label" for="auth-remember-check">Remember me</label>
                                            </div> -->
                                            
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

            <!-- footer -->
            <footer class="footer">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="text-center">
                                <p class="mb-0 text-muted">&copy; <script>document.write(new Date().getFullYear())</script> SRI RAMLAKSHMAN FABS. Crafted with  by Blazing Coders</p>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- end Footer -->
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

    
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const toggleBtn = document.getElementById("password-addon");
        const passwordInput = document.getElementById("password");

        toggleBtn.addEventListener("click", function () {
            const icon = this.querySelector("i");
            const isPassword = passwordInput.getAttribute("type") === "password";
            passwordInput.setAttribute("type", isPassword ? "text" : "password");

            // Toggle icon class
            if (isPassword) {
                icon.classList.remove("ri-eye-fill");
                icon.classList.add("ri-eye-off-fill");
            } else {
                icon.classList.remove("ri-eye-off-fill");
                icon.classList.add("ri-eye-fill");
            }
        });
    });
</script>


<!-- Mirrored from themesbrand.com/velzon/html/creative/auth-signin-basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 10 Feb 2022 08:06:47 GMT -->
</html>