@inject('request', 'Illuminate\Http\Request')
@extends('layouts.header')
@section('content')
<style>
    .register_wrap form{padding: 0 50px;}
    .sign-step_2 .reg-title-step2 input{max-width: 340px;}
    .sign-step_3 h2{letter-spacing: 6px}
    .sign-step_4 .form-group{padding:10px; width:355px;}
    .sign-step_5 .form-group{width:355px;}
</style>
<section class="register ptb-65" style="background-image: url({{ asset('public/images/register-bg.jpg')}})">
    <div class="container">
        <div class="col-lg-6 col-md-6 col-sm-7 col-xs-12">
            <div class="register_wrap" id="signup_normal">
                <input type="hidden" id="showstep" value="{{$show_step}}">
                <!--{{$show_step}}-->
                @if($show_step == 1)
                <div class="logo-my">
                    <a href="javascript:void(0)"> <img src="{{ asset('public/images/logo-small.jpg')}}"> </a>
                </div>
                <form id="frmregister" method="post">
                    <div class="pop-title ftitle1">
                        <h3>Welcome to fitnessity</h3>
                    </div>
                    <div id='systemMessage'></div>
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="text" name="firstname" id="firstname" size="30" maxlength="80" placeholder="First Name">
                    <input type="text" name="lastname" id="lastname" size="30" maxlength="80" placeholder="Last Name">
                    <input type="text" name="username" id="username" size="30" maxlength="80" placeholder="Username" autocomplete="off">
                    <input type="email" name="email" id="email" class="myemail" size="30" placeholder="e-MAIL" maxlength="80" autocomplete="off">
                    <input type="text" name="contact" id="contact" size="30" maxlength="10" autocomplete="off" placeholder="Phone">
                    <input type="password" name="password" id="password" size="30" placeholder="Password" autocomplete="off">
                    <input type="password" name="confirm_password" id="confirm_password" size="30" placeholder="Confirm Password" autocomplete="off">
                    <div class="terms-wrap">
                        <input type="checkbox" id="b_trm1" class="form-check-input" value="1">
                        <label for="b_trm1">I agree to Fitnessity <a href="/terms-condition" target="_blank">Terms of Service</a> and <a href="/privacy-policy" target="_blank">Privacy Policy</a></label>
                    </div>
                    <button type="button" style="margin:0px;" class="signup-new" id="register_submit" onclick="$('#frmregister').submit();">Create Account</button>
                    <p class="or-data">OR</p>
                    <div class="social-login">
                        <a href="{{ Config::get('constants.SITE_URL') }}/login/facebook" class="fb-login">
                            <i class="fa fa-facebook" aria-hidden="true"></i> Login with Facebook
                        </a>
                        <a href="{{ Config::get('constants.SITE_URL') }}/login/google" class="plus-login">
                            <i class="fa fa-google-plus" aria-hidden="true"></i> Sign with Google+
                        </a>
                    </div>
                    <p class="already">Already have an account? <a href="{{ Config::get('constants.SITE_URL') }}/userlogin">Login</a></p>
                </form>
                @elseif(Auth::check() && Auth::user()->show_step == 2)
                <form action="#">
                    <div class="sign-step_2">
                        <div class="filledstep-bar">
                            <div class="row">
                                <div class="col-sm-12">
                                    <span class="filledstep"></span>
                                    <span class=""></span>
                                    <span class=""></span>
                                    <span class=""></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="prfle-wrap">
                                    <img src="" alt="">
                                    {{substr(Auth::user()->firstname,0,1)}}
                                </div>
                                <div class="reg-email-step2">{{Auth::user()->email}}</div>
                                <h2>Welcome to Fitnessity</h2>
                                <div class="reg-title-step2"><input type="text" name="" id="" value="@<?=Auth::user()->username?>" readonly=""></div>
                                <p>Your answer to the next few question will help us find the right ideas for you</p>
                                <div class="signup-step-btn">
                                    <button type="button" class="signbutton-next step2_next" id="">Next</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                @elseif(Auth::check() && Auth::user()->show_step == 3)
                <form action="#">
                    <div class="sign-step_3">
                        <div class="filledstep-bar">
                            <div class="row">
                                <div class="col-sm-12">
                                    <span class="filledstep"></span>
                                    <span class="filledstep"></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <h2>How do you Identify?</h2>
                                <div id='systemMessage'></div>
                                <div class="form-group">
                                    <div class="radio">
                                        <label for="male">Male<input type="radio" name="gender" id="male" value="male" class="" /><span class="checkmark"></span></label>
                                    </div>
                                    <div class="radio">
                                        <label for="female">Female<input type="radio" name="gender" id="female" value="female" class="" /><span class="checkmark"></span></label>
                                    </div>
                                    <div class="radio">
                                        <label for="other">Specify another<input type="radio" name="gender" id="other" value="other" class="" /><span class="checkmark"></span></label>
                                        <input type="text" name="othergender" id="othergender" class="othergender">
                                    </div>
                                </div>
                                <div class="signup-step-btn">
                                    <button type="button" class="signbutton-next step3_next" id="regstep2">Next</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                @elseif(Auth::check() && Auth::user()->show_step == 4)
                <form action="#">
                    <div class="sign-step_4">
                        <div class="filledstep-bar">
                            <div class="row">
                                <div class="col-sm-12">
                                    <span class="filledstep"></span>
                                    <span class="filledstep"></span>
                                    <span class="filledstep"></span>
                                    <span></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <ul class="">
                                    <li><i class="fa fa-check"></i><span>Registration Information</span></li>
                                    <li><i class="fa fa-check"></i><span>Your Identification</span></li>
                                </ul>
                                <ul class="nav nav-tabs nav-stacked">
                                    <li class="active"><a data-toggle="tab" href="#add_personel_info"><span class="stp-numbr">3</span> <span>Add Personal Information</span></a></li>
                                    <li><a data-toggle="tab" href="#adding_photo"><span class="stp-numbr">4</span> <span>Adding Photo</span></a></li>
                                </ul>
                                
                                <div class="tab-content">
                                    <div id='systemMessage'></div>
                                    <div id="add_personel_info" class="tab-pane fade in active">
                                        <div class="form-group">
                                            <input type="text" name="address_sign" placeholder="Address" class="form-control b_address" oninput="initialize1(this)">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="address_sign" placeholder="Country" class="form-control b_country">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="city_sign" placeholder="City" class="form-control b_city">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="state_sign" placeholder="State" class="form-control b_state">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="zipcode_sign" placeholder="Zipcode" class="form-control b_zipcode">
                                        </div>
                                        <div class="signup-step-btn">
                                            <button type="button" class="signbutton-next step4_next" id="step4_next">Next</button>
                                        </div>
                                    </div>
                                    <div id="adding_photo" class="tab-pane fade">
                                        <div class="upload-wrp-content">
                                            <p><b>Put a face to the name </b>and improve your adds to networking success.</p>
                                            <p>People prefer to network with members who has a profile photo, but if don't have one ready to upload, you can add it later.</p>
                                        </div>
                                        <div class="upload-wrp-img">
                                            <div class="upload-img">
                                                <input type="file" name="file_upload" id="file" onchange="readURL(this);">
                                                <div class="upload-img-msg">
                                                    <p>Touble uploading profile photo?</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="signup-step-btn">
                                            <button type="button" class="signbutton-next" id="fileimgnext">Upload</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                @else
                <form action="#">
                    <div class="sign-step_5">
                        <div class="filledstep-bar">
                            <div class="row">
                                <div class="col-sm-12">
                                    <span class="filledstep"></span>
                                    <span class="filledstep"></span>
                                    <span class="filledstep"></span>
                                    <span class="filledstep"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <h2>Activities are much more fun with family</h2>
                                <div id='systemMessage'></div>
                                <h4 style="text-align: center; margin-bottom: 10px;"><b>Add Your Family Members Information</b></h4>
                                <div class="form-group">
                                    <label for="">First Name</label>
                                    <input type="text" name="fname" id="" class="form-control first_name" placeholder="First Name">
                                </div>
                                <div class="form-group">
                                    <label for="">Last Name</label>
                                    <input type="text" name="lname" id="" class="form-control last_name" placeholder="Last Name">
                                </div>
                                <div>
                                    <label for="">Birthday</label>
                                    <div class="birthday_date-position">
                                        <input type="date" name="birthday_date" id="birthday_date" class="form-control birthday" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Relationship</label>
                                    <select name="relationship" id="" class="form-control relationship">
                                        <option value="">Select Relationship</option>
                                        <option value="Brother">Brother</option>
                                        <option value="Sister">Sister</option>
                                        <option value="Father">Father</option>
                                        <option value="Mother">Mother</option>
                                        <option value="Wife">Wife</option>
                                        <option value="Husband">Husband</option>
                                        <option value="Son">Son</option>
                                        <option value="Daughter">Daughter</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Mobile Phone</label>
                                    <input maxlength="10" type="number" name="mphone" id="" class="form-control mobile_number" placeholder="Mobile Phone">
                                </div>
                                <div class="form-group">
                                    <label for="">Emergency Contact Number</label>
                                    <input maxlength="10" type="number" name="emergency_phone" id="" class="form-control emergency_phone" placeholder="Emergency Contact Number">
                                </div>
                                <div class="form-group">
                                    <label for="">Gender</label>
                                    <select name="gender" id="" class="form-control gender">
                                        <option value="">Select Gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <option value="other">Specify other</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="email" name="emailid" id="" class="form-control email" placeholder="Email">
                                </div>
                            </div>
                        </div>
                        <div class="signup-step-btn">
                            <button type="button" class="signbutton-next step5_next" id="">Save</button>
                            <button type="button" class="signbutton-next skip5_next" id="">Skip</button>
                        </div>
                    </div>
                </form>

                @endif

            </div>
        </div>
    </div>

</section>

@include('layouts.footer')

<script type="text/javascript">
    /* Show steps */
    $(document).on('click', '.step2_next', function () {
        var posturl = '/auth/updateStep?show_step=3';
        var formdata = new FormData();
        formdata.append('_token', '{{csrf_token()}}');
        formdata.append('show_step', 3);
        $.ajax({
            url: posturl,
            type: 'POST',
            dataType: 'json',
            data: formdata,
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': $("#_token").val()
            },
            beforeSend: function () {
                $('.step2_next').prop('disabled', true);
                showSystemMessages('#systemMessage', 'info', 'Please wait while we processed you with Fitnessity.');
            },
            complete: function () {
                $('.step2_next').prop('disabled', false);
            },
            success: function (response) {
                window.location.href = "{{url('/registration/?showstep=1')}}"
            }
        });
    });

    /* Step 3 */
    $(document).on('click', '.step3_next', function () {
        console.log($('input[name="gender"]:checked').val())
        if ($('input[name="gender"]:checked').val() == '' || $('input[name="gender"]:checked').val() == 'undefined' || $('input[name="gender"]:checked').val() == undefined) {
            //showSystemMessages('#systemMessage', 'danger', 'Select gender.');
            $("#systemMessage").html('Select gender').addClass('text-danger');
        } else {
            if ($('input[name="gender"]:checked').val() == 'other' && $('#othergender').val() == '') {
                //showSystemMessages('#systemMessage', 'danger', 'Enter other gender.');
                $("#systemMessage").html('Enter other gender').addClass('text-danger');
            } else {
                var posturl = '/auth/savegender';
                var formdata = new FormData();
                formdata.append('_token', '{{csrf_token()}}')
                var g = $('input[name="gender"]:checked').val() == 'other' ? $('#othergender').val() : $('input[name="gender"]:checked').val();
                formdata.append('gender', g);
                formdata.append('show_step', 4);
                $.ajax({
                    url: posturl,
                    type: 'POST',
                    dataType: 'json',
                    data: formdata,
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': $("#_token").val()
                    },                
                    beforeSend: function () {
                        $('.step3_next').prop('disabled', true).css('background','#999999');
                        //showSystemMessages('#systemMessage', 'info', 'Please wait while we processed you with Fitnessity.');
                        $("#systemMessage").html('Please wait while we processed you with Fitnessity.').addClass('alert-class alert-danger');
                    },
                    complete: function () {
                        $('.step3_next').prop('disabled', false).css('background','#ed1b24');
                    },
                    success: function (response) {
                        window.location.href = "{{url('/registration/?showstep=1')}}"
                    }
                });
            }
        }
    });

    /* Step 4 */
    $(document).on('click', '.step4_next', function () {
        if ($('.b_address').val() == '' || $('.b_country').val() == '' || $('.b_city').val() == '' || $('.b_state').val() == '' || $('.b_zipcode').val() == '') {
            //showSystemMessages('#systemMessage', 'danger', 'Enter all data.');
            $("#systemMessage").html('Enter all data').addClass('text-danger');
        } else {
            var posturl = '/auth/saveaddress';
            var formdata = new FormData();
            formdata.append('_token', '{{csrf_token()}}')
            formdata.append('address', $('.b_address').val())
            formdata.append('country', $('.b_country').val())
            formdata.append('city', $('.b_city').val())
            formdata.append('state', $('.b_state').val())
            formdata.append('zipcode', $('.b_zipcode').val())
            formdata.append('show_step', 5)
            $.ajax({
                url: posturl,
                type: 'POST',
                dataType: 'json',
                data: formdata,
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': $("#_token").val()
                },
                beforeSend: function () {
                    $('.step4_next').prop('disabled', true);
                    //showSystemMessages('#systemMessage', 'info', 'Please wait while we processed you with Fitnessity.');
                    $("#systemMessage").html('Please wait while we processed you with Fitnessity.').addClass('alert-class alert-danger');
                },
                complete: function () {
                    $('.step4_next').prop('disabled', false);
                },
                success: function (response) {
                    window.location.href = "{{url('/registration/?showstep=1')}}"
                }
            });
        }
    });

    /* Step 5 */
    $(document).on('click', '.skip5_next', function () {
        var posturl = '/skip-family-form1';
        var formdata = new FormData();
        formdata.append('_token', '{{csrf_token()}}')
        formdata.append('first_name', 'check')
        formdata.append('show_step', 6)
        setTimeout(function () {
            $.ajax({
                url: posturl,
                type: 'POST',
                dataType: 'json',
                data: formdata,
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': $("#_token").val()
                },
                beforeSend: function () {
                    $('#skip5_next').prop('disabled', true);
                    //showSystemMessages('#systemMessage', 'info', 'Please wait while we skipping the data');
                    $("#systemMessage").html('Please wait while we processed you with Fitnessity.').addClass('alert-class alert-danger');
                },
                complete: function () {
                    $('#skip5_next').prop('disabled', true);
                },
                success: function (response) {
                    showSystemMessages('#systemMessage', response.type, response.msg);
                    if (response.type === 'success') {
                        window.location.href = response.redirecturl;
                    } else {
                        $('#skip5_next').prop('disabled', false);
                    }
                }
            });
        }, 1000)
    });

    $(document).on('click', '.step5_next', function () {
        if ($('.first_name').val() == '' || $('.last_name').val() == '' || $('.relationship').val() == '' || $('.mobile_number').val() == '' || $('.emergency_phone').val() == '' || $('.birthday').val() == '' || $('.gender').val() == '') {
            //showSystemMessages('#systemMessage', 'danger', 'Enter all data.');
            $("#systemMessage").html('Enter all data').addClass('text-danger');
        } else {
            var posturl = '/submit-family-form1';
            var formdata = new FormData();
            formdata.append('_token', '{{csrf_token()}}')
            formdata.append('first_name', $('.first_name').val())
            formdata.append('last_name', $('.last_name').val())
            formdata.append('email', $('.email').val())
            formdata.append('relationship', $('.relationship').val())
            formdata.append('mobile_number', $('.mobile_number').val())
            formdata.append('emergency_phone', $('.emergency_phone').val())
            formdata.append('birthday', $('#birthday_date').val())
            formdata.append('gender', $('.gender').val())
            formdata.append('show_step', 6)

            setTimeout(function () {
                $.ajax({
                    url: posturl,
                    type: 'POST',
                    dataType: 'json',
                    data: formdata,
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': $("#_token").val()
                    },
                    beforeSend: function () {
                        $('#step5_next').prop('disabled', true);
                        //showSystemMessages('#systemMessage', 'info', 'Please wait while we submitting the data');
                        $("#systemMessage").html('Please wait while we submitting the data.').addClass('alert-class alert-danger');
                    },
                    complete: function () {
                        $('#step5_next').prop('disabled', true);
                    },
                    success: function (response) {
                        showSystemMessages('#systemMessage', response.type, response.msg);
                        if (response.type === 'success') {
                            window.location.href = response.redirecturl;
                        } else {
                            $('#step5_next').prop('disabled', false);
                        }
                    }
                });
            }, 1000)
        }
    });


    $(document).ready(function () {

        $("#register_submit").click(function (e) {
            e.preventDefault();
            $('#frmregister').submit();
        });

        $("#frmregister").submit(function (e) {
            e.preventDefault();
            $('#frmregister').validate({
                rules: {
                    firstname: "required",
                    lastname: "required",
                    username: "required",
                    password: {
                        required: true,
                        minlength: 8
                    },
                    confirm_password: {
                        required: true,
                        minlength: 8,
                        equalTo: "#password"
                    },
                    email: {
                        required: true,
                        email: true
                    },
                },
                messages: {
                    firstname: "Enter your Firstname",
                    lastname: "Enter your Lastname",
                    username: "Enter your Username",
                    password: {
                        required: "Provide a password",
                        minlength: jQuery.validator.format("Enter at least {0} characters")
                    },
                    confirm_password: {
                        required: "Repeat your password",
                        minlength: jQuery.validator.format("Enter at least {0} characters"),
                        equalTo: "Enter the same password as above"
                    },
                    email: {
                        required: "Please enter a valid email address",
                        minlength: "Please enter a valid email address",
                        remote: jQuery.validator.format("{0} is already in use")
                    },
                },
                submitHandler: registerUser
            });
        });
    });

    function registerUser() {
        $('#register_submit').prop('disabled', true);
        var validForm = $('#frmregister').valid();
        var posturl = '/auth/registration';
        if (validForm) {
            var formData = $("#frmregister").serialize();
            $.ajax({
                url: posturl,
                type: 'POST',
                dataType: 'json',
                data: formData,
                beforeSend: function () {
                    $('#register_submit').prop('disabled', true).css('background','#999999');
                    showSystemMessages('#systemMessage', 'info', 'Please wait while we register you with Fitnessity.');
                    $("#systemMessage").html('Please wait while we register you with Fitnessity.').addClass('alert-class alert-danger');
                },
                complete: function () {
                    $('#register_submit').prop('disabled', false).css('background','#ed1b24');
                },
                success: function (response) {
                    $("#systemMessage").html(response.msg).addClass('alert-class alert-danger');
                    showSystemMessages('#systemMessage', response.type, response.msg);
                    if (response.type === 'success') {
                        window.location.href = response.redirecturl;
                    } else {
                        $('#register_submit').prop('disabled', false).css('background','#ed1b24');
                    }
                }
            });
        }
    }
</script>
</body>
</html>
@endsection
