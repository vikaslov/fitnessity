@extends('layouts.header')
@section('content')

<section class="main-slider contact-banner">
    <div class="container">
        <h1>CONTACT US</h1>
    </div>
</section>

<section class="breadcrumbs">
    <div class="container">
        <ul>
            <li><a href="{{ Config::get('constants.SITE_URL') }}">HOME</a></li><li><i class="fa fa-angle-right"></i></li>
            <li>CONTACT US</li>
        </ul>
    </div>
</section>

<div class="location-detail contactpage-sec">
    <div class="container">
        <div class="location-left">
            <h2>SEND ENQUIRY</h2>
            <div class="cont-detail">
                {!! $pageContent !!}
            </div>
        </div>

        <div class="location-right">
            <h2>Contact Us</h2>
            <div id='systemMessage' class="contactUsMessage"></div>
            <form  id="frmcontact" method="post">
                <p><input type="text" placeholder="Name" name="name" id="name" /></p>
                <p><input type="text" placeholder="Email" name="email" id="email" autocomplete="off" /></p>
                <textarea placeholder="Send us your Enquiry" name="message" id="message" rows="10"></textarea>
                <input type="hidden" name="_token" id="token" value="{{csrf_token()}}">
                <button type="submit" id='frmcontact_submit' onclick="$('#frmcontact').submit();">SEND  ENQUIRY <i class="fa fa-angle-right" aria-hidden="true"></i></button>
            </form>
        </div>

    </div>
</div>      

<style type="text/css">
    .location-detail{
        background-size: cover;
    }
</style>
@include('layouts.footer')

<script type="text/javascript">
    $(document).ready(function () {
        $("#frmcontact").submit(function (e) {
            e.preventDefault();
            // check for validation
            $('#frmcontact').validate({
                rules: {
                    name: {
                        required: true
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    message: {
                        required: true
                    }
                },
                messages: {
                    name: {
                        required: "Provide a name"
                    },
                    email: {
                        required: "Provide an email address",
                        email: "Please enter a valid email address",
                    },
                    message: "Provide a message"
                },
                submitHandler: SubmitContact
            });
        });

        function SubmitContact() {
            var validForm = $('#frmcontact').valid();
            var posturl = '/contact-us';
            if (validForm) {
                var formData = $("#frmcontact").serialize();
                $.ajax({
                    url: posturl,
                    type: 'POST',
                    dataType: 'json',
                    data: formData,
                    beforeSend: function () {
                        $('#frmcontact_submit').prop('disabled', true);
                        showSystemMessages('#systemMessage', 'info', 'Please wait while we save your Enquiry.');
                    },
                    complete: function () {
                        $('#frmcontact_submit').prop('disabled', false);
                    },
                    success: function (response) {
                        if (typeof (response.msg) != undefined)
                        {
                            showSystemMessages('#systemMessage', response.type, response.msg);
                        }
                        if (response.type == "success") {
                            $("#name").val('');
                            $("#email").val('');
                            $("#message").val('');
                        }
                    }
                });
            }
        }
    });
</script>
@endsection