    <footer class="footer">
        <div class="footer_background" style=""></div>
        <div class="container">
            <div class="row footer_row">
                <div class="col">
                    <ul>
                        <li><a href="https://sclibrary.sunway.edu.my/friendly.php?s=contactus">Contact Us</a></li>
                        <li><a href="https://sclibrary.sunway.edu.my/faqs">FAQ</a></li>
                        <li><a href="https://sclibrary.sunway.edu.my/friendly.php?s=feedbacktous">Feedback</a></li>
                    </ul>
                </div>
            </div>

            <div class="row copyright_row">
                <div class="col">
                    <div class="copyright d-flex flex-lg-row flex-column align-items-center justify-content-center">
                        <div class="cr_text">Copyright &copy Sunway Campus Library <script>document.write(new Date().getFullYear());</script></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div> <!-- super-container -->

    <!-- Login Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal_title">Login</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="container">
                    <form id="login-form" action="<?= base_url(); ?>login/loginMe" method="post" role="form">
                        <div class="form-group">
                            <input type="text" name="login-email" id="login-email" tabindex="1" class="form-control" placeholder="Email" value="">
                        </div>
                        <div class="form-group">
                            <input type="password" name="login-password" id="login-password" tabindex="2" class="form-control" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-12">
                                    <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="text-center">
                                        <a href="" tabindex="5" class="forgot-password">Forgot Password?</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Register Modal -->
    <div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal_title">Register</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="container">
                    <form id="register-form" action="<?= base_url(); ?>home/register" method="post" role="form">
                        <div class="form-group">
                            <input type="text" name="register-fname" id="register-fname" tabindex="1" class="form-control" placeholder="Full Name" value="">
                        </div>
                        <div class="form-group">
                            <input type="tel" name="register-mobile" id="register-mobile" tabindex="1" class="form-control" placeholder="Mobile Number" value="">
                        </div>
                        <div class="form-group">
                            <input type="email" name="register-email" id="register-email" tabindex="1" class="form-control" placeholder="Email Address" value="">
                        </div>
                        <div class="form-group">
                            <input type="password" name="register-password" id="register-password" tabindex="2" class="form-control" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <input type="password" name="register-cpassword" id="register-cpassword" tabindex="2" class="form-control" placeholder="Confirm Password">
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-12">
                                    <input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Now">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="<?php echo base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- <script src="<?php echo base_url(); ?>js/jquery-3.2.1.min.js"></script> -->
    <script src="<?php echo base_url(); ?>assets/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/parallax-js-master/parallax.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/scrollmagic/ScrollMagic.min.js"></script>

    <script src="<?php echo base_url(); ?>assets/dist/js/popper.js"></script>
    <script src="<?php echo base_url(); ?>assets/dist/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/dist/js/custom.js"></script>
    <script src="<?php echo base_url(); ?>assets/dist/js/home.js"></script>
</body>
</html>