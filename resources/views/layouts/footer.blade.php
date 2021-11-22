<footer>
        <div class="cat-container">
            <div class="row">
                <div class="col-lg-5 col-md-5 col-sm-4 col-xs-12">
                    <div class="footer-logo">
                        <p>
                            Raise bear crawl flexibility plank dip jump, muscles <br> lower tuck sit triceps sit. Walkout dumbbell <br> crunch arm kick lower stretch. Exercise kettlebell <br> leg pull aerobic lower body bodyweight climp <br> chin up.
                        </p>
                        <div class="footer-bottom-left">
                            <p class="location">
                                Headquarted in New York City, NY
                            </p>
                            <ul>
                                <li>T: <a href="#">0888 002 948 235</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                    <div class="footer-link">
                        <a href="{{ Config::get('constants.SITE_URL') }}/contact-us">- Contact Us</a>
                        <a href="{{ Config::get('constants.SITE_URL') }}/claim-your-business">- Claim your Business</a>
                        <a href="#">- Help Center</a>
                        <a data-toggle="modal" id="btn_feedback" data-target="#feedback_modal" href="#">- Send Us Feedback</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="footer-logo">
                        <form method="get" id="submit_newsletter" action="/contact-us">
                            <div class="input_div float-left w-100">
                                <div class="set_input float-left w-100">
                                    <label for="newsletter_name">Name</label>
                                    <input type="text" name="name" id="newsletter_name" class="form-control" required>
                                </div>
                                <div class="set_input float-left w-100">
                                    <label for="newsletter_email">e-Mail</label>
                                    <input type="email" id="newsletter_email" class="form-control" required>
                                </div>
                                <div class="set_input float-left w-100">
                                    <label for="phone">Phone</label>
                                    <input type="number" name="phone" id="phone" class="form-control" required>
                                </div>
                            </div>
                            <div class="float-left w-100">
                                <button class="btn-u" type="submit">Subscribe</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <p class="copyright">© 2021 Fitnessity</p>
        </div>
    </footer>
    <p id="back-top" title="Back To Top">
        <a href="#top" class="cd-top"><span class="fa fa-arrow-up"></span></a>
    </p>
    <script src="<?php echo Config::get('constants.FRONT_JS'); ?>owl.js"></script>
    <script src="<?php echo Config::get('constants.FRONT_JS'); ?>jquery.flexslider.js"></script>
    <script src="<?php echo Config::get('constants.FRONT_JS'); ?>lightbox.js"></script>
    <script src="https://darsa.in/sly/examples/js/vendor/plugins.js"></script>
    <script src="<?php echo Config::get('constants.FRONT_JS'); ?>sly.min.js"></script>
    <script src="<?php echo Config::get('constants.FRONT_JS'); ?>home.js"></script>
    <script src="<?php echo Config::get('constants.FRONT_JS'); ?>toastr.min.js"></script>
    <script src="<?php echo Config::get('constants.FRONT_JS'); ?>toastr-custom.js"></script>
    <script src="<?php echo Config::get('constants.FRONT_JS'); ?>bootstrap.min.js"></script>
    <script src="<?php echo Config::get('constants.FRONT_JS'); ?>JQueryValidate/jquery.validate.js"></script>
    <script src="<?php echo Config::get('constants.FRONT_JS'); ?>JQueryValidate/additional-methods.min.js"></script>
    <script src="<?php echo Config::get('constants.FRONT_JS'); ?>auth.js"></script>
    <script src="<?php echo Config::get('constants.FRONT_JS'); ?>jquery.blockUI.js"></script>
    <script src="<?php echo Config::get('constants.FRONT_JS'); ?>general.js"></script>
    <script>
        $(document).ready(function() {
            // hide #back-top first
            $("#back-top").hide();
            // fade in #back-top
            $(function() {
                $(window).scroll(function() {
                    if ($(this).scrollTop() > 150) {
                        $('#back-top').fadeIn();
                    } else {
                        $('#back-top').fadeOut();
                    }
                });

                // scroll body to 0px on click
                $('#back-top a').click(function() {
                    $('body,html').animate({
                        scrollTop: 0
                    }, 800);
                    return false;
                });
            });
        });

    </script>