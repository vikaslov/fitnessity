@inject('request', 'Illuminate\Http\Request')

@extends('layouts.header')

@section('content')

<section class="register ptb-65" style="background-image: url({{ asset('images/register-bg.jpg')}})">
    <div class="container">
        <div class="col-lg-6 col-md-6 col-sm-7 col-xs-12">
            <div class="register_wrap" id="signup_normal">
                <input type="hidden" id="showstep" value="">
                <div class="logo-my">
                    <a href="javascript:void(0)"> <img src="{{ asset('images/logo-small.jpg')}}"> </a>
                </div>               
                <form id="frmlogin" method="post">
                    {{ csrf_field() }}
                    <div class="pop-title ftitle1">
                        <h3>Welcome to fitnessity</h3>
                    </div>
                    <br/> 
                    <div id='systemMessage'></div>
                    <input type="email" name="email" id="email" class="myemail" size="30" autocomplete="off" placeholder="e-MAIL" maxlength="80" autocomplete="off">
                    <span class="text-danger cls-error" id="erremail"></span>                    
                    <input type="password" name="password" id="password" size="30" placeholder="Password" autocomplete="off">
                    <span class="text-danger cls-error" id="errpass"></span>                    
                    <div class="remembermediv terms-wrap">
                        <input type="checkbox" id="remember" name="remember" checked class="remembercheckbox" />
                        <span for="remember" class="rememberme">Remember me</span>
                    </div>
                    <?php echo/* form_password($password);*/ $show_captcha=""; ?>
                    <div id='capchaimg'><?php if ($show_captcha) { ?><?php echo $captcha_html; ?><?php } ?></div>
                    <?php if ($show_captcha) { ?> <?php echo form_input($captcha); ?> <?php } ?>
                    <button class="btn signup-new" id='login_submit' onclick="$('#frmlogin').submit();">Log in </button>
                    <br/><br/>
                    <a href="/auth/jsModalpassword" data-toggle="modal" data-target="#password_modal" onclick="openLoginModal('password')" class="forgotpass">Forgot Password?</a>
                    <p class="already">Don't have an account?
                        <a href="{{ Config::get('constants.SITE_URL') }}/registration">SIGN UP</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</section>

@include('layouts.footer')

<script>
    $(document).on("ready", function() {

        $("#frmlogin").submit(function(e) {
            e.preventDefault();
            $("#erremail").html('');
            $("#errpass").html('');
            var email = $("#email");
            var pass = $("#password");
            var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            if(email.val() == "") {
                $("#erremail").html("Please enter email address");
                email.focus();
                return false;
            }
            if(!regex.test(email.val())){
                $('#erremail').html('Please enter valid email xxx@xxx.xxx');
                email.focus();
                return false;
            }
            if(pass.val() == "") {
                $("#errpass").html("Please enter password");
                pass.focus();
                return false;
            }
            LoginUser();
        });
    });

    function LoginUser() {

        var validForm = $('#frmlogin').valid();
        var posturl = 'auth/userlogin';

        if (validForm) {

            var formData = $("#frmlogin").serialize();

            $.ajax({
                url: posturl,
                type: 'POST',
                dataType: 'json',
                data: formData,
                beforeSend: function () {
                    $('#login_submit').prop('disabled', true).css('background','#999999');
                    showSystemMessages('#systemMessage', 'info', 'Please wait while we login you with Fitnessity.');
                    $("#systemMessage").html('Please wait while we login you with Fitnessity.').addClass('alert-class alert-danger');
                },
                complete: function () {
                    $('#login_submit').prop('disabled', false).css('background','#ed1b24');
                },
                success: function(response) {
                    $("#systemMessage").html(response.msg).addClass('alert-class alert-danger');
                    showSystemMessages('#systemMessage', response.type, response.msg);
                    if (response.type == 'success') {
                        window.location = 'profile/viewProfile';
                    } else {
                        $('#login_submit').prop('disabled', false).css('background','#ed1b24');
                    }
                }
            });
        }
    }

</script>
@endsection
