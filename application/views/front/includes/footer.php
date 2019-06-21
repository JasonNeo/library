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

    <!-- Modal -->
    <div class="modal fade" id="modalCenter" tabindex="-1" role="dialog" aria-labelledby="modalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="modal_title"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="" method="post" id="my_form">
            <div class="modal-body">
                <label>Email: <input type="text" name="email"></label>
                <br>
                <label>Password: <input type="password" name="password"></label>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary" id="submit_btn"></button>
            </div>
        </form>
        </div>
    </div>
    </div>

    <script src="<?php echo base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
    <script>
    // document ready
    $(document).ready(function() {
        $('#modalCenter').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var type = button.data('type');
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this);
            modal.find('#modal_title').text(type);
            modal.find('#submit_btn').text(type);
            $('#my_form').attr('action', '<?= base_url(); ?>login/' + type);
        });
    });
    </script>
    <!-- <script src="<?php echo base_url(); ?>js/jquery-3.2.1.min.js"></script> -->
    <script src="<?php echo base_url(); ?>assets/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/parallax-js-master/parallax.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/scrollmagic/ScrollMagic.min.js"></script>

    <script src="<?php echo base_url(); ?>assets/dist/js/popper.js"></script>
    <script src="<?php echo base_url(); ?>assets/dist/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/dist/js/custom.js"></script>
</body>
</html>