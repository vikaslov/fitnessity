@inject('request', 'Illuminate\Http\Request')
@extends('layouts.header')

<head>
    <title> Fitnessity </title>
    <meta charset="utf-8">
    <meta name="description" content="Looking for a place to grow your career. There are many good reasons to consider the great insurance jobs available through Legends United.">
    <meta name="keywords" content="Great Insurance Jobs">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo Config::get('constants.FRONT_CSS'); ?>all.css">
    <link rel="stylesheet" type="text/css" href="<?php echo Config::get('constants.FRONT_CSS'); ?>stylenew.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{ url('public/css/pixelarity.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('public/css/profile.css') }}">

</head>

@section('content')
<style>
    .veri-icon-new span a{margin:17px; width:57px; height:58px}
    .dropzone{border:0}
    .dz-progress{display:none}
    .dz-image-preview img{width:120px; height:120px}
    table.dp_monthpicker.dp_body td {
        padding: 15px !important;
    }
    .modal-body.login-pad .signup .emplouyee-form .result {
        width: 150px;
        height: auto;
        padding: 20px;
    }
    a:hover, a:focus {
        color: #fff !important;
        text-decoration: none !important;
    }
    .btn {
        top: 6px !important;
        right: -1px !important;
    }
    /*.button {
      display: block;
      width: 135px;
      height: 41px;
      background: #f53b49;
      padding: 10px;
      text-align: center;
      border-radius: 0px;
      color: #fff;
      font-weight: bold;
      line-height: 25px; 
      font-size: 17px;
    }*/
    .Zebra_DatePicker{
        width: 70% !important;
    }
    img.header_img {
        position: absolute;
        left: 0;
    }
    hr.heading_hr {
        width: 10%;
        color: #f53b49;
        margin-top: 0;
        border-top: 3px solid;
        position: absolute;
        margin-bottom: 0 !important;
    }
    .introduction_section,.Education_section,.Company_section{
        padding-left: 16.7%;
    }
    h3{
        color: #f53b49;
    }
    .modal_buttons{
        text-align: center;
    }
    .btn.btn-secondary{
        width: 249px;
        display: inline-block;
        font-size: 23px;
        margin: 40px 0 25px;
        background: #f53b49 none repeat scroll 0 0;
        border: 1px solid #f53b49;
        padding: 12px 0;
        cursor: pointer;
        text-transform: uppercase;
        color: #fff;
        border-radius: 0px;
    }
    .user_img{
        text-align: center;
        margin: 5% 0px;
    }
    .avatar {
        vertical-align: middle;
        width: 120px;
        height: 120px;
        border-radius: 50%;
    }
    .user_img_content {
        margin: 3% 0px;
    }
    .header_content {
        padding: 0px 7%;
    }
    span.user-img > img {
        width: 100%;
        height: 100%;
        border-radius: 100px;
    }
    h4.heading {
        font-size: 22px;
        font-weight: 600;
        text-transform: uppercase;
        margin: 20px 0;
        border-bottom: 3px solid #f53b49;
        width: 70%;
        text-align: center;
        margin: 0px auto 20px auto;
        color: #f53b49;
    }
    span.Zebra_DatePicker_Icon_Wrapper {
        width: 100% !important;
    }
    .Zebra_DatePicker {
        background: #666;
        border-radius: 4px;
        box-shadow: 0 0 10px #888;
        color: #222;
        font: 13px Tahoma,Arial,Helvetica,sans-serif;
        padding: 3px;
        position: absolute;
        display: table;
        *width: 255px;
        z-index: 1200
    }
    .Zebra_DatePicker *,
    .Zebra_DatePicker :after,
    .Zebra_DatePicker :before {
        box-sizing: content-box!important
    }
    .Zebra_DatePicker * {
        padding: 0
    }
    .Zebra_DatePicker table {
        border-collapse: collapse;
        border-radius: 4px;
        border-spacing: 0;
        width: 100%;
    }
    .Zebra_DatePicker td,
    .Zebra_DatePicker th {
        padding: 5px;
        cursor: pointer;
        text-align: center;
        min-width: 25px;
        width: 25px;
    }
    .Zebra_DatePicker .dp_body td,
    .Zebra_DatePicker .dp_body th {
        border: 1px solid #bfbfbf
    }
    .Zebra_DatePicker .dp_body td:first-child,
    .Zebra_DatePicker .dp_body th:first-child {
        border-left: none
    }
    .Zebra_DatePicker .dp_body td:last-child,
    .Zebra_DatePicker .dp_body th:last-child {
        border-right: none
    }
    .Zebra_DatePicker .dp_body tr:first-child td,
    .Zebra_DatePicker .dp_body tr:first-child th {
        border-top: none
    }
    .Zebra_DatePicker .dp_body tr:last-child td,
    .Zebra_DatePicker .dp_body tr:last-child th {
        border-bottom: none
    }
    .Zebra_DatePicker .dp_body td {
        background: #e6e5e5
    }
    .Zebra_DatePicker .dp_body .dp_weekend {
        background: #d6d6d6
    }
    .Zebra_DatePicker .dp_body .dp_not_in_month {
        background: #e0e6f2;
        color: #98acd4
    }
    .Zebra_DatePicker .dp_body .dp_time_controls_condensed td {
        width: 25%
    }
    .Zebra_DatePicker .dp_body .dp_current {
        color: #cc236b
    }
    .Zebra_DatePicker .dp_body .dp_selected {
        background: #b56a6a;
        color: #fff
    }
    .Zebra_DatePicker .dp_body .dp_disabled {
        background: #f2f2f2;
        color: #ccc;
        cursor: text
    }
    .Zebra_DatePicker .dp_body .dp_disabled.dp_current {
        color: #b56a6a
    }
    .Zebra_DatePicker .dp_body .dp_hover {
        color: #fff;
        background: #88a09e
    }
    .Zebra_DatePicker .dp_body .dp_hover.dp_time_control {
        background-color: #8c8c8c;
        color: #fff
    }
    .Zebra_DatePicker .dp_monthpicker td,
    .Zebra_DatePicker .dp_timepicker td,
    .Zebra_DatePicker .dp_yearpicker td {
        width: 33.3333%
    }
    .Zebra_DatePicker .dp_timepicker .dp_disabled {
        border: none;
        color: #222;
        font-size: 26px;
        font-weight: 700
    }
    .Zebra_DatePicker .dp_time_separator div {
        position: relative
    }
    .Zebra_DatePicker .dp_time_separator div:after {
        content: ":";
        color: 1px solid #bfbfbf;
        font-size: 20px;
        left: 100%;
        margin-left: 2px;
        margin-top: -13px;
        position: absolute;
        top: 50%;
        z-index: 1
    }
    .Zebra_DatePicker .dp_header {
        margin-bottom: 3px
    }   
    @supports (-ms-ime-align:auto) {
        .Zebra_DatePicker .dp_header {
            font-family: 'Segoe UI Symbol',Tahoma,Arial,Helvetica,sans-serif
        }
    }
    .Zebra_DatePicker .dp_footer {
        margin-top: 3px
    }
    .Zebra_DatePicker .dp_footer .dp_icon {
        width: 50%
    }
    .Zebra_DatePicker .dp_actions td {
        border-radius: 4px;
        color: #fff
    }
    .Zebra_DatePicker .dp_actions .dp_caption {
        font-weight: 700;
        width: 100%
    }
    .Zebra_DatePicker .dp_actions .dp_next,
    .Zebra_DatePicker .dp_actions .dp_previous {
        *padding: 0 10px
    }
    .Zebra_DatePicker .dp_actions .dp_hover {
        background-color: #8c8c8c;
        color: #fff
    }
    .Zebra_DatePicker .dp_daypicker th {
        background: #fc3;
        cursor: text;
        font-weight: 700
    }
    .Zebra_DatePicker.dp_hidden {
        display: none
    }
    .Zebra_DatePicker .dp_icon {
        height: 16px;
        background-image: url(icons.png);
        background-repeat: no-repeat;
        text-indent: -9999px;
        *text-indent: 0
    }
    .Zebra_DatePicker .dp_icon.dp_confirm {
        background-position: center -123px
    }
    .Zebra_DatePicker .dp_icon.dp_view_toggler {
        background-position: center -91px
    }
    .Zebra_DatePicker .dp_icon.dp_view_toggler.dp_calendar {
        background-position: center -59px
    }
    button.Zebra_DatePicker_Icon {
        background: url(icons.png) center top no-repeat;
        border: none;
        cursor: pointer;
        display: block;
        height: 16px;
        line-height: 0;
        padding: 0;
        position: absolute;
        text-indent: -9000px;
        width: 16px
    }
    button.Zebra_DatePicker_Icon.Zebra_DatePicker_Icon_Disabled {
        background-position: center -32px;
        cursor: default
    }
    .pad{
        padding-top:10px;
    }
    .mt83{
        margin-top: 83px;
    }
    .close{
        opacity: 1 !important;
    }
    .signleft-customer form a {
        font-size: 13.5px;
        color: #777;
        padding-bottom: 0;
        text-align: left;
        float: none;
    }
    .t_c {
        font-size: 13.5px !important;
        color: #777 !important;
        padding-bottom: 0;
        text-align: left;
        float: none;}

    button.FITNESS_ENTHUSIASTS_signup {
        margin-top: 22.4%;
    }
    .signleft {
        float: left;
        width: 45%;
    }
    .signright{
        width: 45%;
    }
    input,select {
        margin: 2.2% 0.5%;
        border: 1px solid #828282;
        padding: 16px 10px;
        width: 100%;
    }
    .modallink.mt20 {
        margin-top: 8% !important;
    }
    .pac-container {
        z-index: 999999999;
    }

    table.dp_monthpicker.dp_body td {
        padding: 15px !important;
    }
    .Zebra_DatePicker .dp_body .dp_selected {
        background: #f53b49 !important;
        color: #fff !important;
    }
    .Zebra_DatePicker .dp_daypicker th {
        background: #f53b49 !important;
        cursor: text;
        font-weight: 700;
        color: #fff !important;
    }
    input#frm1_birthday{
        padding-right: 0px !important;
    }
    .Zebra_DatePicker{
        width: 100% !important;
    }
    button.Zebra_DatePicker_Icon {
        display: none !important;
    }

    .lbl{

        float:left;

    }
    .Zebra_DatePicker_Icon_Wrapper{
        width:150px !important;
    }
    .hide-bullets {
        list-style:none;
        margin-top:8px;
    }
    /*------- changes ----------*/
    .gallery-box{
        padding: 0;
    }
    div#main_area {
        padding: 40px;
    }

    .wrapper{
        width:660px;
        height: 580px;
        background-color: #fff;
        float:left;
        margin:20px;
    }
    #big_img {
        width:600px;
        height: 420px;
        margin:20px 20px 0px 20px;
    }
    .thumbnail-inner{
        width:600px;
        height: 120px;
        background-color: #000;
        float: left;
        margin-left: 20px;
        overflow-y:auto;
    }
    .thumbnail-inner img{
        width:130px;
        height: 100px;
        margin:8px 0px 0px 12px;
        border:3px solid white;
        border-radius: 5px;
        opacity: 0.5;
        cursor: pointer;
    }
    .thumbnail-inner img:hover{
        opacity: 1;
    }
    .img-wrap {
        position: relative;
        float:left;
    }
    .img-wrap .selectPhoto {
        position: absolute;
        top: 55px;
        right: 55px;
        z-index: 100;
        font-size:12px;
        color:#ffffff;
    }
    .img-wrap .unselectPhoto {
        position: absolute;
        top: 55px;
        right: 55px;
        z-index: 100;
        font-size:12px;
        color:#00ff00;
    }
    .img-wrap .delPhoto {
        position: absolute;
        top: 11px;
        right: 5px;
        z-index: 100;
        font-size:12px;
        color:#ff0000;
    }

</style>

<?php
$loggedinUser = Auth::user();

$customerName = $loggedinUser->firstname . ' ' . $loggedinUser->lastname;

$profilePicture = $loggedinUser->profile_pic;
$coverPicture = $loggedinUser->cover_photo;
if (isset($_GET['cover']) && $_GET['cover'] == 1) {
    ?>
    <script type="text/javascript">
        alert("Cover photo updated successfully.");
        var uri = window.location.href.toString();
        if (uri.indexOf("?") > 0) {
            var clean_uri = uri.substring(0, uri.indexOf("?"));
            window.history.replaceState({}, document.title, clean_uri);
        }
    </script>
    <?php
}
?>
<div class="banner" style="height:377px; padding-top:77px; overflow:hidden">
    <a href="javascript::void(0);" data-toggle="modal" data-target="#uploadCoverPic">
        <?php
        if (!empty($viewgallery)) {
            ?>
            <div style="height:305px; overflow:hidden; background:#000;  padding-bottom:5px;">
                <?php
                foreach (array_slice($viewgallery, 0, 4) as $pic) {
                    ?>
                    <img style="padding:0; margin:0; float:left" width="25%" height="300" src="/public/uploads/gallery/<?= $loggedinUser->id ?>/thumb/<?= $pic['name'] ?>" />
                <?php } ?>
            </div>
        <?php } else { ?> 
            @if(!empty($coverPicture))
            <img src="{{ url('/public/uploads/cover-photo/'.$UserProfileDetail['cover_photo']) }}" alt="images" class="img-fluid">
            @else
            <img src="/public/images/newimage/banner.jpg" alt="images" class="img-fluid">
            @endif
        <?php } ?>
    </a>
</div>

<section class="banner-below-sec">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-2">
                <div class="comp-mark">
                    @if(File::exists(public_path("/uploads/profile_pic/thumb/".$UserProfileDetail['profile_pic'])))
                    <img src="{{ url('/public/uploads/profile_pic/thumb/'.$UserProfileDetail['profile_pic']) }}" alt="images" class="img-fluid">
                    @else
                    <img alt="" src="http://2.gravatar.com/avatar/?s=35&amp;d=mm&amp;r=g" srcset="http://0.gravatar.com/avatar/?s=70&amp;d=mm&amp;r=g 2x" class="avatar avatar-35 photo avatar-default" height="35" width="35" loading="lazy">
                    @endif
                    <a href="javascript:void(0);" class="edit-pic" data-toggle="modal" data-target="#editProfilePic" title="Click here to change picture">
                        <div id="mycamera"  style="color:#fff;background-color:#000;height:30px;width:30px;border-radius:15px;position: absolute;right: 23px;bottom: 2px;">
                            <span class="fa fa-camera" style="position: relative; left: -7px; top: 7px;"></span>
                        </div>
                    </a>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="editProfilePic" role="dialog">
                    {!! Form::open(array('url'=>url('/profile/editProfilePicture'),'method'=>'POST','files' => true , 'enctype' => 'multipart/form-data', 'id' => 'frmeditProfile_side')) !!}
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="modal-dialog modal-lg">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-body login-pad">
                                <div class="pop-title employe-title">
                                    <h3>EDIT PROFILE PICTURE</h3>
                                </div>
                                <button type="button" class="close modal-close" data-dismiss="modal">
                                    <img src="<?php echo Config::get('constants.FRONT_IMAGE'); ?>close.jpg" height="70" width="34"/>
                                </button>
                                <div class="signup">
                                    <div id='systemMessage'></div>
                                    <div class="emplouyee-form">
                                        <input class="upload-pic" type="file" name="profile_pic" id="profile_pic" class="form-control">
                                        <img class="result" id="result">
                                        <button type="submit" id="submit_profilepic">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
                <!-- Modal Ends -->  
            </div>

            <div class="col-lg-6">
                <div class="bnr-information">
                    <h2 style="text-transform: capitalize;">{{$customerName}}</h2>
                    <h6>@if(isset($UserProfileDetail['quick_intro'])) {!! nl2br(@$UserProfileDetail['quick_intro']) !!} @else - @endif</h6>
                    <p>Company: @if(isset($companies)) @foreach($companies as $value) {{$value['company_name']}} @if(count($companies) != $loop->iteration) , @endif @endforeach @endif <a href="/manage/company" title="Manage your company"><i class="fa fa-pencil family_edit" style="color: #f53b49"></i></a></p>
                    <p>Username: @if(isset($UserProfileDetail['username'])) {{ "@".$UserProfileDetail['username']}} @else - @endif</p>
                    <p>Favorite Activities: @if(isset($UserProfileDetail['favorit_activity'])){{$UserProfileDetail['favorit_activity']}}@else - @endif <a href="/personal-profile/user-profile" title="Update your activity"><i class="fa fa-pencil family_edit" style="color: #f53b49"></i></a></p>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="reatingbox">
                    <h5><span>0 </span> / 10 Ratings</h5>
                    <div class="social">
                        <ul>
                            <li><a href=""><i class="far fa-heart mr-2"></i>Save</a></li>
                            <li><a href=""><img src="/public/images/newimage/review.png" alt="icon"> Submit Review</a></li>
                            <li><a href=""><img src="/public/images/newimage/share.png" alt="icon">Share</a></li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<section class="menu-black sticky-top">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-4">
                <div class="name-div border-0">
                    <span><a href="#mydesc" style="color:#ffffffb3"> About </a></span>
                    <span><a href="#photo" style="color:#ffffffb3"> Photos </a></span>
                    <!--<span><a href="#video-box" style="color:#ffffffb3"> Videos </a></span>
                    <span><a href="#family-id" style="color:#ffffffb3"> Family </a></span>-->
                </div>
            </div>
            <div class="col-lg-8">
                <div class="row clamwithblack">
                    <a href="{{route('user-profile')}}" style="float: right"><div class="claim-business"> Edit Profile </div></a>
                    @if(isset($companies) && !empty($companies[0]))
                    <a href="{{route('manageCompany')}}" style="float: right"><div class="claim-business"> Manage Business </div></a>
                    @else
                    <a href="{{route('welcomeBusinessProfile')}}" style="float: right"><div class="claim-business"> Create Business </div></a>
                    @endif
                    {{-- <a href="javascript::void(0);" style="float: right" data-toggle="modal" data-target="#editProfileDetailModal"><div class="claim-business"> Edit Profile </div></a>
                    <a href="{{url('/profile/createProfileSecurity')}}" style="float: right" ><div class="claim-business"> Add/Edit Security Questions </div></a>
                    <a href="{{url('/profile/change-password')}}" style="float: right" ><div class="claim-business"> Change Password</div></a> --}}
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modal -->
<div class="modal" id="uploadCoverPic" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body login-pad">
                <div class="pop-title employe-title">
                    <h3>Change Cover Photo</h3>
                </div>
                <button type="button" class="close modal-close" data-dismiss="modal">
                    <img src="<?php echo Config::get('constants.FRONT_IMAGE'); ?>close.jpg" height="70" width="34"/>
                </button>
                <div class="signup">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                            <div class="cover-tagbox">
                                <i class="fas fa-info-circle"></i>
                                <span>Your Cover Photo will be used to customize the header of your profile.</span>
                            </div>

                            <div class="file-upload">
                                <form name="frm_cover" id="frm_cover" action="{{Route('savemycoverphoto')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="image-upload-wrap piccrop_block" id="file1"@if(@$UserProfileDetail['cover_photo']!="" ) style="display: none;" @endif>
                                         <input class="file-upload-input" name="coverphoto" id="coverphoto" type='file' onchange="readURL(this);" accept="image/*" />

                                        <div class="drag-text">
                                            <h3>Drop your image here</h3>
                                            <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger('click')">Select Your File</button>
                                        </div>
                                        <img class="result" id="result1">
                                    </div>
                                    @if ($errors->has('coverphoto'))
                                    <span class="help-block" style="color:red">
                                        <strong>Upload your photo</strong>
                                    </span>
                                    @endif

                                    <div class="file-upload-content piccrop_block" id="file1"@if(@$UserProfileDetail['cover_photo']!="" ) style="display: block;" @endif>
                                         @php
                                         if(@$UserProfileDetail['cover_photo']!="")
                                         $path='public/uploads/cover-photo/'.$UserProfileDetail['cover_photo'];
                                         else
                                         $path="#"

                                         @endphp
                                         <img class="file-upload-image" src="/{{$path}}" alt="your image" height="100px" />

                                    </div>

                                    <div>
                                    </div>
                                    <div class="highlighted-txt-yellow">
                                        For best result, upload and image that is 1950px by 450px or larger.
                                    </div>

                                    <p>If you'd like to delete your current cover photo, use the delete Cover Photo button.</p>

                                    <div class="image-title-wrap">
                                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                                        <button type="submit" id="submit_cover" name="submit_cover" class="remove-image">Save My Cover Photo</button>
                                        &nbsp;&nbsp;
                                        <button type="button" style="background:#000" onclick="removeUpload_coverphoto()" class="remove-image">Delete My Cover Photo</button>

                                    </div>
                                </form>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="editProfileDetailModal" role="dialog">
    <!-- <form  id="frmeditProfileDetail" method="post"> -->
    {!! Form::open(array('id' => 'frmeditProfileDetail')) !!}
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body login-pad">
                <div class="pop-title employe-title">
                    <h3>EDIT Personal Info</h3>
                </div>
                <button type="button" class="close modal-close" data-dismiss="modal">
                    <img src="<?php echo Config::get('constants.FRONT_IMAGE'); ?>close.jpg" height="70" width="34"/>
                </button>
                <div class="signup">
                    <div id='systemMessage_detail'></div>
                    <div class="emplouyee-form">
                        <input type="text" name="firstname" id="frm_firstname" placeholder="First Name" value="{{ old('firstname',$UserProfileDetail['firstname']) }}">
                        <input type="text" name="lastname" id="frm_lastname" placeholder="Last Name" value="{{ old('lastname',$UserProfileDetail['lastname']) }}">
                        <input type="text" name="username" id="frm_username" placeholder="User Name" value="{{ old('username',$UserProfileDetail['username']) }}">
                        <?php $gender = array('' => 'Select Gender', 'Male' => 'Male', 'Female' => 'Female'); ?>
                        <div class="select-style review-select2">
                            <!--{!! Form::select('gender', $gender, $UserProfileDetail['gender'], ['class' => 'selectpicker', 'id' => 'frm_gender']) !!}-->
                            <select name="gender" class="form-control" id="frm_gender">
                                <option hidden>Select Gender</option>
                                <option value="male" {{ (old('gender',$UserProfileDetail['gender'])=='male')?'selected':'' }}>Male</option>
                                <option value="female" {{ (old('gender',$UserProfileDetail['gender'])=='female')?'selected':'' }}>Female</option>
                            </select>
                        </div>
                        <input type="text" name="email" id="frm_email" placeholder="Email" readonly class="disable-input" value="{{ old('email',$UserProfileDetail['email']) }}">
                            <!-- <input type="text" name="phone_number" id="frm_phone_number" placeholder="(XXX) XXX XXX" value=""> -->
                        <input type="text" name="phone_number" required placeholder="(xxx)xxx-xxxx" class="form-control" data-inputmask='"mask": "(999)999-9999"' data-mask value="{{ old('phone_number',$UserProfileDetail['phone_number']) }}">
                            <!--<input type="text" name="address" id="frm_address" placeholder="Address" maxlength="255">-->
                        <input autocomplete="nope" type="text" name="address" id="frm_address" oninput="initialize1(this)" placeholder="Address" value="{{ old('address',$UserProfileDetail['address']) }}">
                        <input type="text" name="city" id="frm_city" placeholder="City" value="{{ old('city',$UserProfileDetail['city']) }}">
                        <input type="text" name="state" id="frm_state" placeholder="State" value="{{ old('state',$UserProfileDetail['state']) }}">
                        <input type="text" name="country" id="frm_country" placeholder="Country" value="{{ old('country',$UserProfileDetail['country']) }}">
                        <input type="text" name="zipcode" id="frm_zipcode" placeholder="Zipcode" maxlength="6" value="{{ old('zipcode',$UserProfileDetail['zipcode']) }}">
                        <textarea placeholder="Intro ..." name="intro" id="message_area" rows="7" maxlength="120" required>@if(isset($UserProfileDetail['intro'])){!! $UserProfileDetail['intro'] !!}@endif</textarea>
                        <p>
                            <span class="hint" style="color:red" id="textarea_message">
                        </p>
                        <textarea placeholder="Tell Us Somthing About You..." name="about_me" id="about_msg" rows="7" maxlength="300" required>@if(isset($UserProfileDetail['about_me'])){!! $UserProfileDetail['about_me'] !!}@endif</textarea>
                        <p>
                            <span class="hint" style="color:red" id="aboutarea_message">
                        </p>
                        <button type="button" id="submit_profiledetail" onclick="$('#frmeditProfileDetail').submit();">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
</div>

<section class="desc-sec">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="desc-box-new">
                    <div class="desc-text" id="mydesc">
                        <h5>About</h5>
                        <?php $gender = array('' => 'Select Gender', 'Male' => 'Male', 'Female' => 'Female'); ?>
                        <p>@if(isset($UserProfileDetail['business_info'])) {!! nl2br(@$UserProfileDetail['business_info']) !!} @else - @endif</p>
                        <p>@if(isset($UserProfileDetail['intro'])) {!! nl2br(@$UserProfileDetail['intro']) !!} @endif</p>
                    </div>

                    <div class="gallery-box" id="photo">
                        <div id="main_area" style="padding:0">
                            <!-- Slider -->
                            <div class="row" style="display:none">
                                <div class="col-xs-12" id="slider">
                                    <h5> Photos </h5>
                                    <!-- Top part of the slider -->
                                    <div class="" id="carousel-bounding-box">
                                        <div class="carousel slide round5px" id="myCarousel" data-ride="carousel">
                                            <!-- Carousel items -->
                                            <div class="carousel-inner">
                                                @foreach($gallery as $key=>$pic)
                                                @if($key==0)
                                                <div class="active item" data-slide-number="{{ $pic['id'] }}">
                                                    @else
                                                    <div class="item"  data-slide-number="{{ $pic['id'] }}">
                                                        @endif
                                                        <img src="/public/uploads/gallery/<?= $loggedinUser->id ?>/<?= $pic['name'] ?>" style="width:100%;">
                                                    </div>
                                                    @endforeach
                                                </div>
                                                <!-- Carousel nav -->
                                            </div>
                                            <!--/Slider-->
                                            <div id="slider-thumbs">
                                                <!-- Bottom switcher of slider -->
                                                <ul class="hide-bullets">
                                                    <?php
                                                    foreach ($gallery as $pic) {
                                                        ?>
                                                        <li>
                                                            <img class="short-cru-img" style="width:100%;" src="/public/uploads/gallery/<?= $loggedinUser->id ?>/thumb/<?= $pic['name'] ?>" id="<?= $pic['id'] ?>" />
                                                        </li>
                                                    <?php } ?> 
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="video-box" id="video-box" style="display:none">
                                <h5> Video </h5>
                                <div class="video-responsive">
                                    <iframe width="560" height="315" src="https://www.youtube.com/embed/Ol2QjF53OPQ" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div>
                            </div>

                            <div class="pr-listing-amerties" id="family-id" style="display:none">
                                <!-- Modal -->
                                <div class="modal fade" id="addFamilyDetailModal" role="dialog">
                                    <!-- <form  id="frmeditProfileDetail" method="post"> -->
                                    {!! Form::open(array('id' => 'frmaddFamilyDetail')) !!}
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="modal-dialog modal-lg">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-body login-pad">
                                                <div class="pop-title employe-title">
                                                    <h3 id="familyModal">Add Family Member Info</h3>
                                                </div>
                                                <button type="button" class="close modal-close" data-dismiss="modal">
                                                    <img src="<?php echo Config::get('constants.FRONT_IMAGE'); ?>close.jpg" height="70" width="34"/>
                                                </button>

                                                <div class="signup">
                                                    <div id='systemMessage_detail'></div>
                                                    <div class="emplouyee-form">
                                                        <div class="row">
                                                            <div class="col-sm-4">
                                                                <label for="usr" class="lbl">First Name:</label>
                                                            </div>
                                                            <div class="col-sm-8">
                                                                <input type="text" name="first_name" id="frm1_firstname" placeholder="First Name">
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-sm-4">
                                                                <label for="usr" class="lbl">Last Name:</label>
                                                            </div>
                                                            <div class="col-sm-8">
                                                                <input type="text" name="last_name" id="frm1_lastname" placeholder="Last Name">
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-sm-4">
                                                                <label for="usr" class="lbl">Gender Name:</label>
                                                            </div>
                                                            <div class="col-sm-8">
                                                                <div class="select-style review-select2">

                                                                    {!! Form::select('gender', $gender,null, ['class' => 'form-control', 'id' => 'frm1_gender']) !!}

                                                                </div>
                                                            </div>
                                                        </div>

                                                        <input type="hidden" style="display:none;" name="family_id" id="family_id" value="0" />
                                                        <div class="row">
                                                            <div class="col-sm-4">
                                                                <label for="usr" class="lbl">Email:</label>
                                                            </div>
                                                            <div class="col-sm-8">
                                                                <input type="text" name="email" id="frm1_email" placeholder="Email">
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-sm-4">
                                                                <label for="usr" class="lbl">Relationship:</label>
                                                            </div>
                                                            <div class="col-sm-8">
                                                                <?php
                                                                $relationship = array('' => 'Select Relationship', 'Brother' => 'Brother', 'Sister' => 'Sister', 'Father' => 'Father', 'Mother' => 'Mother', 'Wife' => 'Wife'
                                                                    , 'Husband' => 'Husband', 'Son' => 'Son', 'Daughter' => 'Daughter');
                                                                ?>

                                                                <div class="select-style review-select2">

                                                                    {!! Form::select('relationship', $relationship, null, ['class' => 'form-control', 'id' => 'frm1_relationship']) !!}

                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-sm-4">
                                                                <label for="usr" class="lbl">Birthday:</label>
                                                            </div>
                                                            <div class="col-sm-8" id="datepicker-position">
                                                                <input type="text" class="form-control" autocomplete="off" name="birthday"   placeholder="MM-DD-YYYY" id="frm1_birthday" />
                                                            <!--<input type="text" autocomplete="off" name="birthday" id="my_date_picker" placeholder="Birthday">-->

                                                            </div>
                                                        </div>

                                                        <!-- <input type="text" name="phone_number" id="frm_phone_number" placeholder="(XXX) XXX XXX" value=""> -->
                                                        <div class="row">
                                                            <div class="col-sm-4">
                                                                <label for="usr" class="lbl">Mobile:</label>
                                                            </div>
                                                            <div class="col-sm-8">
                                                                <input type="text" name="mobile" maxlength="10" id="frm1_mobile" required placeholder="Mobile" />
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-sm-4">
                                                                <label for="usr" class="lbl">Emergency Contact:</label>
                                                            </div>
                                                            <div class="col-sm-8">
                                                                <input type="text" name="emergency_contact" maxlength="10" id="frm1_emergency_contact" placeholder="Emergency Contact" />
                                                            </div>
                                                        </div>

                                                        <button type="button" id="submit_familydetail">Submit</button>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                    {!! Form::close() !!}

                                    <!-- </form> -->

                                </div>

                                <h5> Family Details</h5>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nw-user-detail">
                                    <a href="javascript: void(0);" style="float: right" data-toggle="modal" id="addFamily" data-target="#addFamilyDetailModal"><i class="fa fa-plus"></i> Add Family Member</a>
                                </div> 
                                <table class="table">
                                    <thead>
                                        <tr>

                                            <th scope="col" id="uplogradProfileBtn">Name</th>

                                            <th scope="col">Relationship</th>

                                            <th scope="col">Email</th>

                                            <th scope="col">Emergency Contact</th>

                                            <th scope="col">Mobile</th>

                                            <th scope="col">Gender</th>

                                            <th scope="col">Action</th>

                                            <!--<th scope="col">Birthday</th>-->

                                        </tr>

                                    </thead>

                                    <tbody>

                                        @if(count($family) == 0)

                                        <tr>

                                            <td colspan="8"><h3 class="nw-user-nm text-center">Family Details not added yet.</h3></td>

                                        </tr>

                                        @else

                                        @foreach($family as $value)

                                        <tr>

                                            <td>{{$value->first_name}} {{$value->last_name}}</td>

                                            <td>{{$value->relationship}}</td>

                                            <td>{{$value->email}}</td>

                                            <td>{{$value->emergency_contact}}</td>

                                            <td>{{$value->mobile}}</td>

                                            <td>{{$value->gender}}</td>

                                            <td><a href="javascript: void(0);" data-toggle="modal" data-target="#addFamilyDetailModal"><i class="fa fa-pencil family_edit" user_id="{{$value}}" style="color: #f53b49"></i></a> 
                                                <a href="javascript: void(0);" ><i class="fa fa-trash family_delete" user_id="{{$value->id}}" style="color: #f53b49"></i></a></td>

                                            {{--<td style="display: flex!important;">{{ date('m-d-Y', strtotime($value->birthday)) }}</td>--}}



                                        </tr>

                                        @endforeach

                                        @endif

                                    </tbody>

                                </table>

                            </div>

                            <div class="video-box">
                                <h5> Photos </h5>
                                <?php
                                if (!empty($gallery)) {
                                    ?>
                                    <div class="wrapper">
                                        <div id="big_img">
                                            <img src="/public/uploads/gallery/<?= $loggedinUser->id ?>/<?= $gallery[0]['name'] ?>" width="600" height="400" id="myPicture" class="border" />
                                        </div>
                                        <div class="thumbnail-inner">
                                            <?php
                                            foreach ($gallery as $pic) {
                                                ?>
                                                <div class="img-wrap">
                                                    <?php if( $pic['cover'] == 1 ) { ?>
                                                    <i class="fa fa-image unselectPhoto" selectId="{{ $pic['id'] }}" aria-hidden="true" title="Unset cover photo"></i>
                                                    <?php } else { ?>
                                                    <i class="fa fa-image selectPhoto" selectId="{{ $pic['id'] }}" aria-hidden="true" title="Set cover photo"></i>
                                                    <?php } ?>
                                                    <i class="fa fa-trash-o delPhoto" delId="{{ $pic['id'] }}" aria-hidden="true" title="Delete photo"></i>
                                                    <img src="/public/uploads/gallery/<?= $loggedinUser->id ?>/thumb/<?= $pic['name'] ?>" id="/public/uploads/gallery/<?= $loggedinUser->id ?>/<?= $pic['name'] ?>" />
                                                </div>
                                            <?php } ?> 
                                        </div>
                                    </div>
                                <?php } ?> 

                                <div class="file-upload" style="width:600px">
                                    <form name="frm_cover" id="frm_cover" action="{{Route('file-upload')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="image-upload-wrap piccrop_block" id="file1">
                                            <input required class="file-upload-input" name="galleryphoto" id="galleryphoto" type='file' onchange="readURL(this);" accept="image/*" />
                                            <div class="drag-text">
                                                <h3>Drop your image here</h3>
                                                <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger('click')">Select Your File</button>
                                            </div>
                                            <img class="result" id="result1">
                                        </div>
                                        <p>&nbsp;</p>
                                        <div class="image-title-wrap" style="text-align:right">
                                            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                                            <button type="submit" name="submit_cover" class="remove-image">Save Photo</button>
                                        </div>
                                    </form>
                                </div>

                                <div class="pr-upload-imgbox" id="imagedropbox" style="display:none">
                                    <div class="upoload-dotbox">
                                        <p>Drop images to upload</p>
                                        <p>Or</p>
                                        <p><img src="/public/images/newimage/upload-img.jpg" alt="images"></p>
                                        <p class="gallryup">Gallery Images</p>
                                    </div>
                                </div>

                            </div>


                            <!-- Thumbnail images of users from company_images objects are 
                            rendering here and also publishing in the buiness profile page -->                   
                            @isset(Auth::user()->company_images)
                            <div class="row" style="padding: 10px 20px;" id="delimgbox">
                                @foreach(json_decode(Auth::user()->company_images) as $key=>$value)

                                <div class="col-md-4" class="imgdeletediv" style="position:relative;padding: 15px;">
                                    <img src="<?php echo Config::get('constants.USER_IMAGE_THUMB') . $value; ?>" style="width:100%;height:200px;" />
                                    <button type="button" myindex="{{$key}}" class="btn btn-primary delimg" style="margin-top: 15px;"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                </div>
                                @endforeach
                            </div>
                            @endisset

                            <div id="Modal" class="modal fade" role="dialog">
                                <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title" style="color:black;">Add User Images</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST" action="{{url('/user-multi-image-upload')}}" enctype="multipart/form-data">
                                                <input required type="file" class="form-control" name="images[]" placeholder="Company Image" multiple>
                                                <input type="hidden" name="_token" value="{{csrf_token()}}" />

                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-default">Save</button>
                                            </form>
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>

                </div>
                <div class="col-lg-4">
                    <div class="right-box">
                        <div class="pr-verification" style="background-color:transparent;background-image:url('/public/images/get-verified.jpg');background-repeat: no-repeat;background-position: center;background-size: 360px 240px">
                            <div class="veri-icon-new" style="margin-top:112px">
                                <span >
                                    <a href="{{'tel:'.$UserProfileDetail['phone_number']}}" style="background-color:green;" title="phone" class="cophone"><i class="fa fa-phone" aria-hidden="true"></i></a>
                                </span>
                                <span >
                                    <a href="{{'mailto:'.$UserProfileDetail['email']}}" style="background-color:green;" title="email"  class="coemail"><i class="fa fa-envelope" aria-hidden="true"></i></a>
                                </span>
                                <span >
                                    <a href="{{'http://maps.google.com/?q='.$UserProfileDetail['address']}}" style="background-color:green;" title="address" class="coaddress" target="_blank"><i class="fa fa-map-marker" aria-hidden="true"></i></a>
                                </span>
                            </div>
                        </div>

                        <div class="static">
                            <h5><i class="far fa-bookmark mr-2"></i> Statistic </h5>
                            <div class="static-soc">
                                <ul>
                                    <li><a href="#"><i class="far fa-eye mr-2"></i> 0 Views </a></li>
                                    <li><a href="#"><i class="far fa-star mr-2"></i> 0 Ratings </a></li>
                                    <li><a href="#"><i class="far fa-heart mr-2"></i> 0 Favorites</a></li>
                                    <li><a href="#"><i class="fas fa-share mr-2"></i> 0 Shares </a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="get-started">
                            <div class="get-img"><img src="/public/images/newimage/get-started.jpg" alt="images" class="img-fluid"></div>
                            <div class="get-text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</div>
                            <div class="get-btn-box"><a href="#" class="get-btn"> Get Started </a> </div>
                        </div>

                        <div class="ad-img">
                            <img src="/public/images/newimage/ad-img.jpg" alt="images" class="img-fluid">
                        </div>
                    </div>
                </div>

            </div>

            </section>

            @include('layouts.footer')
            <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
            <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" />
            <link href="https://cdn.jsdelivr.net/npm/zebra_datepicker@latest/dist/css/default/zebra_datepicker.min.css" />
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/Zebra_datepicker/1.9.15/zebra_datepicker.src.js"></script>
            <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
            <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
            <script src="{{ url('public/js/pixelarity-face.js') }}"></script>
            <script type="text/javascript">
                                                    function readURL(input) {
                                                        if (input.files && input.files[0]) {
                                                            var reader = new FileReader();
                                                            reader.onload = function (e) {
                                                                $('.blah').attr('src', e.target.result);
                                                                var html = '<img src="' + e.target.result + '">';
                                                                $('.uploadedpic').html(html);
                                                            };
                                                            profile_pic_var = input.files[0];
                                                            reader.readAsDataURL(input.files[0]);
                                                        }
                                                    }

                                                    window.onload = gallery;
                                                    //when we load your gallery in browser then gallery function is loaded
                                                    function gallery() {
                                                        // gallery is the name of function
                                                        var allimages = document.images;
                                                        //now we create a variable allimages
                                                        //and we store all images in this allimages variable
                                                        for (var i = 0; i < allimages.length; i++) {
                                                            //now we create a for loop
                                                            //if(allimages[i].id.indexOf("small") > -1){
                                                            allimages[i].onclick = imgChanger;
                                                            //in above line we are adding a listener to all the thumbs stored inside the allimages array on onclick event.
                                                            //}
                                                        }
                                                    }
                                                    //declaring the imgChanger function
                                                    function imgChanger() {
                                                        //changing the src attribute value of the large image.
                                                        document.getElementById('myPicture').src = this.id;
                                                    }


                                                    $(document).ready(function () {

                                                        $("#profile_pic").change(function (e) {
                                                            var img = e.target.files[0];

                                                            if (!pixelarity.open(img, false, function (res, faces) {
                                                                console.log(faces);

                                                                $("#result").attr("src", res);
                                                                $(".face").remove();

                                                                for (var i = 0; i < faces.length; i++) {
                                                                    $("body").append("<div class='face' style='height: " + faces[i].height + "px; width: " + faces[i].width + "px; top: " + ($("#result").offset().top + faces[i].y) + "px; left: " + ($("#result").offset().left + faces[i].x) + "px;'>");
                                                                }

                                                            }, "jpg", 0.7, true)) {
                                                                alert("Whoops! That is not an image!");
                                                            }

                                                        });


                                                    });

            </script>
            <script>
                function initialize1(q) {
                    console.log(q.value)
                    console.log('callles')
                    var input = q;
                    console.log(input.value)
                    var s = input.value

                    // var streetaddress= input.substr(0, input.indexOf(',')); 
                    // console.log(streetaddress)

                    var autocomplete = new google.maps.places.Autocomplete(input);
                    //  if(s != ''){
                    //     var streetaddress= s.substr(0, s.indexOf(','));
                    //     console.log(streetaddress)
                    //     input.value = streetaddress
                    // }
                    $('.pac-container').css('z-index', '999999999');
                    autocomplete.addListener('place_changed', function () {
                        var place = autocomplete.getPlace();
                        lat = place.geometry.location.lat();
                        long = place.geometry.location.lng();
                        for (var i = 0; i < place.address_components.length; i++) {
                            for (var j = 0; j < place.address_components[i].types.length; j++) {
                                if (place.address_components[i].types[j] == "postal_code") {
                                    $('#frm_zipcode').val(place.address_components[i].long_name);
                                }
                                if (place.address_components[i].types[j] == "locality") {


                                    $('#frm_city').val(place.address_components[i].long_name);
                                    // document.getElementById('b_address').value = place.address_components[i].short_name;
                                    //document.getElementById('b_city').value = place.address_components[i].short_name;
                                }
                                if (place.address_components[i].types[j] == "country") {
                                    $('#frm_country_dd').val(place.address_components[i].short_name);
                                }
                                if (place.address_components[i].types[j] == "administrative_area_level_1") {
                                    $('#frm_state').val(place.address_components[i].long_name);
                                }
                            }
                        }
                    });
                }
            </script>

            <script>
                $(document).ready(function () {


                    $('.delimg').click(function () {
                        $.ajax({
                            url: "{{url('/delete-image-user?myindex=')}}" + $(this).attr('myindex'),
                            type: 'get',
                            beforeSend: function () {
                                $('.loader').show();
                            },
                            complete: function () {
                                $('.loader').hide();
                            },
                            success: function (response) {
                                //if(response.status ==200){
                                window.location.reload()
                                $(this).parent().remove();
                                //}
                            }
                        });
                    });

                    $('.delPhoto').click(function () {
                        var txt;
                        var r = confirm("Are you sure, you want to delete?");
                        if (r == true) {
                            $.ajax({
                                url: "{{url('/delete-image-gallery?delId=')}}" + $(this).attr('delId'),
                                type: 'get',
                                beforeSend: function () {
                                    $('.loader').show();
                                },
                                complete: function () {
                                    $('.loader').hide();
                                },
                                success: function (response) {
                                    //if(response.status ==200){
                                    window.location.reload()
                                    $(this).parent().remove();
                                    //}
                                }
                            });
                        }
                    });

                    $('.selectPhoto').click(function () {
                        var txt;
                        var r = confirm("Are you sure, you want to set cover photo?");
                        if (r == true) {
                            $.ajax({
                                url: "{{url('/set-cover-photo?selectId=')}}" + $(this).attr('selectId'),
                                type: 'get',
                                beforeSend: function () {
                                    $('.loader').show();
                                },
                                complete: function () {
                                    $('.loader').hide();
                                },
                                success: function (response) {
                                    //if(response.status ==200){
                                    window.location.reload()
                                    $(this).parent().remove();
                                    //}
                                }
                            });
                        }
                    });
                    
                    $('.unselectPhoto').click(function () {
                        var txt;
                        var r = confirm("Are you sure, you want to unset cover photo?");
                        if (r == true) {
                            $.ajax({
                                url: "{{url('/unset-cover-photo?selectId=')}}" + $(this).attr('selectId'),
                                type: 'get',
                                beforeSend: function () {
                                    $('.loader').show();
                                },
                                complete: function () {
                                    $('.loader').hide();
                                },
                                success: function (response) {
                                    //if(response.status ==200){
                                    window.location.reload()
                                    $(this).parent().remove();
                                    //}
                                }
                            });
                        }
                    });

                    //Loads the html to each slider. Write in the "div id="slide-content-x" what you want to show in each slide
                    $('#carousel-text').html($('#slide-content-0').html());

                    //Handles the carousel thumbnails
                    $('[id^=carousel-selector-]').click(function () {
                        var id = this.id.substr(this.id.lastIndexOf("-") + 1);
                        var id = parseInt(id);
                        $('#myCarousel').carousel(id);
                    });


                    // When the carousel slides, auto update the text
                    $('#myCarousel').on('slid.bs.carousel', function (e) {
                        var id = $('.item.active').data('slide-number');
                        $('#carousel-text').html($('#slide-content-' + id).html());
                    });
                    $('.coemail').attr('href', "{{'mailto:'.$UserProfileDetail['email']}}")
                    $('.cophone').attr('href', "{{'tel:'.$UserProfileDetail['phone_number']}}")
                    $('.coaddress').attr('href', "{{'http://maps.google.com/?q='.$UserProfileDetail['address']}}")
                    $('.prfl-nme').html('')
                    if (window.location.href.split('?').pop() == 'companyCreate=1') {
                        $('#create_company_btn').click()
                    }

                    $("#resetPassword").click(function () {
                        formdata = new FormData();
                        var token = '{{csrf_token()}}';
                        var email = '{{Auth::user()->email}}';
                        formdata.append("_token", token)
                        formdata.append("email", email)
                        $.ajax({
                            url: '/password/email',
                            type: 'POST',
                            dataType: 'json',
                            data: formdata,
                            processData: false,
                            contentType: false,
                            beforeSend: function () {

                                // $('#submit_profiledetail').prop('disabled', true);

                            },
                            complete: function () {

                                // $('#submit_profiledetail').prop('disabled', false);

                            },
                            success: function (response) {

                                showSystemMessages('#systemMessage_detail', response.type, response.msg);
                            }
                        });
                    })

                    $('#datepicker-on-change').Zebra_DatePicker({
                        default_position: 'below',
                        container: $('.datepicker-position')
                    });
                    $('#frm1_birthday').Zebra_DatePicker({
                        default_position: 'below',
                        direction: -1,
                        format: 'm-d-Y',
                        container: $('#datepicker-position')
                    });
                });

                $(function () {
                    $("#my_date_picker").datepicker({
                        format: 'yy/mm/dd',
                    });
                });

                $(document).on('click', '.delete', function () {
                    var j = $(this).attr('num')
                    var hell = $('.add-more-div').toArray();
                    hell[j].remove();
                    console.log($(this).attr('num'))
                });

                $('.add-more').click(function () {
                    var lastcount = $('.delete').length + 1;
                    var html = '<div class="row add-more-div"><hr />'
                            + '<div class="col-sm-6">'
                            + '<div class="row col-sm-12 text-left">'
                            + '<label>Company Name<span class="color-red">*</span></label>'
                            + ' </div>'
                            + '<input type="text" name="Companyname" id="b_companyname" size="30" maxlength="80" placeholder="Company Name">'
                            + ' <span class="error" id="b_cmpo"></span>'
                            + '<div class="row col-sm-12 text-left">'
                            + '<label>City<span class="color-red">*</span></label>'
                            + '</div>'
                            + '<input type="text" name="City" id="b_city" size="30" placeholder="City" size="30" maxlength="80"> '
                            + '<span class="error" id="b_ct"></span>'
                            + '<div class="row col-sm-12 text-left">'
                            + '<label>Zip Code<span class="color-red">*</span></label>'
                            + '</div>'
                            + '<input type="number" name="Zip Code" id="b_zipcode" size="30" placeholder="Zip Code">'
                            + '<span class="error" id="b_zip"></span>'
                            + '<div class="row col-sm-12 text-left">'
                            + '<label>EIN Number<span class="color-red">*</span></label>'
                            + '</div>'
                            + '<input type="text" name="b_EINnumber" maxlength="10" id="b_EINnumber" maxlength="10"  oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" placeholder="EIN Number">'
                            + '<span class="error" id="b_ein"></span>'
                            + '</div>'

                            + '<div class="col-sm-6">'
                            + '<div class="row col-sm-12 text-left">'
                            + ' <label>Address<span class="color-red">*</span></label>'
                            + ' </div>'
                            + ' <input type="text" name="Address" id="b_address" placeholder="Address">'
                            + ' <span class="error" id="b_addr"></span>'
                            + ' <div class="row col-sm-12 text-left">'
                            + ' <label>State<span class="color-red">*</span></label>'
                            + ' </div>'
                            + '<input type="text" name="State" id="b_state" size="30" placeholder="State" size="30" maxlength="80">'
                            + '<span class="error" id="b_sta"></span>'

                            + '<div class="row col-sm-12 text-left">'
                            + '<label>Country<span class="color-red">*</span></label>'
                            + '</div>'
                            + '<input type="text" name="Country" value="" id="b_country" size="30" placeholder="Country">'

                            + '<span class="error" id="b_cont"></span>'
                            + '<div class="row col-sm-12 text-left">'
                            + '<label>Establishment Year<span class="color-red">*</span></label>'
                            + '</div>'
                            + '<input type="number" name="b_Establishmentyear" id="b_Establishmentyear" size="30" maxlength="4" placeholder="Establishment Year" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">'
                            + '<span class="error" id="b_estb"></span>'
                            + '</div>'
                            + '<div class="text-right">'
                            + '<button type="button" class="btn btn-secondary delete" num="' + lastcount + '">Delete</button>'
                            + '</div>'
                            + '</div>'
                    $("div.add-more-div:last").after(html);
                    lastcout = lastcount + 1;
                })

                $('#b_v_2').click(function () {
                    $(".error").empty();
                    if ($("#frm_organisationname").val() != '') {
                        if ($("#frm_position").val() != '') {
                            if ($("#dp1").val() != '') {
                                if ($("#dp2").val() != '') {
                                    if ($("#frm_course").val() != '') {
                                        if ($("#frm_university").val() != '') {
                                            if ($("#passingyear").val() != '') {
                                                if ($("#certification").val() != '') {
                                                    if ($("#completionyear").val() != '') {
                                                        if ($("#skiils_achievments_awards").val() != '') {
                                                            if ($("#skillcompletionpicker").val() != '') {
                                                                $('#fitnessity_for_business_step2').hide();
                                                                $('#fitnessity_for_business_step3').show();
                                                            } else {
                                                                $("#b_skillyear").text("Please Enter the skill completion date");
                                                            }
                                                        } else {
                                                            $("#b_skilltype").text("Please select skill type");
                                                        }
                                                    } else {
                                                        $("#b_certificateyear").text("Please Enter the Certication completion date");
                                                    }
                                                } else {
                                                    $("#b_certification").text("Please Enter the certification");
                                                }
                                            } else {
                                                $("#b_year").text("Please select passing year ");
                                            }

                                        } else {
                                            $("#b_university").text("Please Enter the university ");
                                        }
                                    } else {
                                        $("#b_degree").text("Please enter the course ");
                                    }
                                } else {
                                    $("#b_employmentto").text("Please enter the to date ");
                                }
                            } else {
                                $("#b_employmentfrom").text("Please enter the from date ");
                            }
                        } else {
                            $("#b_position").text("Please enter the position ");
                        }
                    } else {
                        $("#b_organisationname").text("Please enter the organisation name ");
                    }

                });
                $("label.present_work_btn").click(function () {
                    $("#frm_ispresentcheck").attr("checked", !$("#frm_ispresentcheck").attr("checked"));
                    changeDateBasedonPresent();
                });

                function changeDateBasedonPresent()
                {
                    if ($("#frm_ispresentcheck").attr("checked")) {
                        $("#frm_ispresent").val("1");
                        $("#dp2").val("Till Date");
                        $("#dp2").attr("disabled", true);
                    } else {
                        $("#frm_ispresent").val("0");
                        $("#dp2").val("");
                        $("#dp2").attr("disabled", false);
                    }
                }

                //     $('#passingyear').Zebra_DatePicker({
                //          view: 'years',
                //          format: 'Y',
                //         default_position: 'below',
                //         container : $('#passingpicker-position')      
                // });
                $('#dp1').Zebra_DatePicker({
                    default_position: 'below',
                    container: $('#dp1-position')
                });
                $('#dp2').Zebra_DatePicker({
                    default_position: 'below',
                    container: $('#dp2-position')
                });
                $('#completionyear').Zebra_DatePicker({
                    default_position: 'below',
                    container: $('#completionpicker-position')
                });
                $('#skillcompletionpicker').Zebra_DatePicker({
                    default_position: 'below',
                    container: $('#skillcompletionpicker-position')
                });

                $('#imagedropbox').click(function () {
                    console.log("Photo Upload");
                    $('#Modal').modal('show');
                });

                $('#uplogradProfileBtn').click(function () {
                    $('#upgradeProfileForm').modal('show');
                    //         $.ajax({
                    //   url:'customer/upgradeProfile/{{Auth::user()->upgrade_profile_link}}',
                    //   type:'GET',
                    // success: function (response) {
                    //     if(response.type === 'success'){
                    //             $('#upgradeProfileForm').modal('show'); 
                    //       }else{
                    //           showSystemMessages('#systemMessage', response.type, response.msg);
                    //       }
                    //     }
                    // });
                });

                $(".family_edit").click(function () {
                    var data = JSON.parse($(this).attr('user_id'))
                    $('#family_id').val(data.id)
                    $('#frm1_firstname').val(data.first_name)
                    $('#frm1_lastname').val(data.last_name)
                    $('#frm1_email').val(data.email)
                    $('#frm1_mobile').val(data.mobile)
                    $('#frm1_emergency_contact').val(data.emergency_contact)
                    $('#frm1_gender').val(data.gender)
                    $('#frm1_relationship').val(data.relationship)
                    console.log(moment("YYYY-MM-DD", data.birthday))
                    $('#frm1_birthday').val(moment(data.birthday, "YYYY-MM-DD").format("MM-DD-YYYY"))
                    $('#familyModal').text('Edit Family Detail')
                });

                $("#addFamily").click(function () {
                    //var data = JSON.parse($(this).attr('user_id'))
                    $('#family_id').val(0)
                    $('#frm1_firstname').val('')
                    $('#frm1_lastname').val('')
                    $('#frm1_email').val('')
                    $('#frm1_mobile').val('')
                    $('#frm1_gender').val('')
                    $('#frm1_relationship').val('')
                    $('#frm1_birthday').val('')
                    $('#frm1_emergency_contact').val('')
                    $('#familyModal').text('Add Family Detail')
                });

                $(".family_delete").click(function () {
                    var family_id = $(this).attr('user_id')
                    swal({
                        title: "Are you sure?",
                        text: "You want to delete this family member!",
                        icon: "warning",
                        buttons: [
                            'Cancel',
                            'Delete'
                        ],
                        dangerMode: true,
                    }).then(function (isConfirm) {
                        if (isConfirm) {
                            $.ajax({
                                url: '/family-member-delete/' + family_id,
                                type: 'GET',
                                beforeSend: function () {
                                    // $('#register_submit').prop('disabled', true);
                                    showSystemMessages('#systemMessage', 'info', 'Please wait while we delete family member with Fitnessity.');
                                },
                                complete: function () {
                                    //$('#register_submit').prop('disabled', true);
                                },
                                success: function (response) {
                                    showSystemMessages('#systemMessage', response.type, response.msg);
                                    if (response.type === 'success') {
                                        window.location.reload();
                                    } else {
                                        // $('#register_submit').prop('disabled', false);    
                                    }
                                }
                            });
                        } else {
                            swal("Cancelled", "Your data is safe");
                        }
                    });
                });

                //var phonecode = '<?php //echo $phonecode;     ?>';
                $('#country').change(function () {
                    var country_code = $('#frm_country').val();
                    if (country_code) {
                        $.ajax({
                            type: "GET",
                            url: "{{url('/get-state-list')}}?country_code=" + country_code,
                            success: function (res) {
                                if (res) {
                                    $("#frm_state").empty();
                                    $("#frm_state").append('<option>Select</option>');
                                    $.each(res, function (key, value) {
                                        $("#frm_state").append('<option value="' + key + '">' + value + '</option>');
                                    });
                                } else {
                                    $("#frm_state").empty();
                                }
                            }
                        });
                    } else {
                        $("#frm_state").empty();
                        $("#frm_city").empty();
                    }
                });

                $('#frm_state').on('change', function () {
                    var state_id = $(this).val();
                    if (state_id) {
                        $.ajax({
                            type: "GET",
                            // url: '/get-city-list/'+state_id,
                            url: "{{url('/get-city-list')}}?state_id=" + state_id,
                            success: function (res) {
                                if (res) {
                                    $("#frm_city").empty();
                                    $.each(res, function (key, value) {
                                        $("#frm_city").append('<option value="' + key + '">' + value + '</option>');
                                    });
                                } else {
                                    $("#frm_city").empty();
                                }
                            }
                        });
                    } else {
                        $("#frm_city").empty();
                    }
                });

                //   $("#frm_phone_number").keydown(function(e) {
                //        var field=this;
                //        setTimeout(function () {
                //            if(field.value.indexOf(phonecode) !== 0) {
                //                $(field).val(phonecode);
                //            } 
                //        }, 1);
                //    });

                var form = document.querySelector('form');
                // edit profile picture
                $('#frmeditProfile').submit(function (e) {
                    e.preventDefault();
                    $('#frmeditProfile').validate({
                        rules: {
                            profile_pic: {
                                required: true,
                                accept: "image/*"
                            },
                        },
                        messages: {
                            profile_pic: {
                                required: "Upload a Profile picture",
                                accept: "Please upload an image"
                            },
                        }
                    });

                    if (!$('#frmeditProfile').valid()) {
                        return false;
                    }
                    var inputData = new FormData($(this)[0]);
                    $.ajax({
                        url: '/profile/editProfilePicture',
                        type: 'POST',
                        dataType: 'json',
                        data: inputData,
                        processData: false,
                        contentType: false,
                        beforeSend: function () {
                            $('#submit_profilepic').prop('disabled', true);
                        },
                        complete: function () {
                            $('#submit_profilepic').prop('disabled', false);
                        },
                        success: function (response) {
                            console.log('dfsfddsf')
                            if (response.type == 'success') {
                                showSystemMessages('#systemMessage', 'success', 'Profile updated scuccessfully');
                                // $("#display_user_profile_pic").attr("src", response.returndata.profile_pic);
                                // $(".display_user_profile_pic_view_profile").attr("src", response.returndata.profile_pic);
                                $(".display_user_profile_pic_view_profile").each(function () {
                                    $(this).attr("src", response.returndata.profile_pic);
                                });
                                $('#editProfilePic').modal('hide');
                            } else {
                                showSystemMessages('#systemMessage', response.type, response.msg);
                            }
                        }
                    });
                });

                // fill modal form with user details
                var UserProfileDetail = <?php echo json_encode($UserProfileDetail); ?>;
                var ProfessionalDetail = <?php echo json_encode($UserProfileDetail['ProfessionalDetail']); ?>;

                $("#editProfileDetailModal").on("show.bs.modal", function () {
                    $('#editProfileDetailModal').find('#frm_firstname').val(UserProfileDetail.firstname);
                    $('#editProfileDetailModal').find('#frm_lastname').val(UserProfileDetail.lastname);
                    $('#editProfileDetailModal').find('#frm_username').val(UserProfileDetail.username);
                    $('#editProfileDetailModal').find('#frm_gender').val(UserProfileDetail.gender);
                    $('#editProfileDetailModal').find('#frm_email').val(UserProfileDetail.email);
                    $('#editProfileDetailModal').find('#frm_phone_number').val(UserProfileDetail.phone_number);
                    $('#editProfileDetailModal').find('#frm_address').val(UserProfileDetail.address);
                    if (UserProfileDetail.state != null) {
                        $('#editProfileDetailModal').find('#frm_state').val(UserProfileDetail.state);
                        // $('#frm_state').change(function() {
                        //     if(UserProfileDetail.city != null)
                        $('#editProfileDetailModal').find('#frm_city').val(UserProfileDetail.city);
                        // });
                    }
                    $('#editProfileDetailModal').find('#frm_country').val(UserProfileDetail.country);
                    $('#editProfileDetailModal').find('#frm_zipcode').val(UserProfileDetail.zipcode);
                    $('#editProfileDetailModal').find('#message_area').val(UserProfileDetail.intro);
                });

                $("#submit_familydetail").click(function () {
                    $('#frmaddFamilyDetail').submit()
                });

                // validate user detail form
                $('#frmeditProfileDetail').submit(function (e) {
                    e.preventDefault();
                    // check for validation
                    $('#frmeditProfileDetail').validate({
                        rules: {
                            company_name: {
                                required: true
                            },
                            firstname: {
                                required: true
                            },
                            lastname: {
                                required: true
                            },
                            gender: {
                                required: true

                            },
                            phone_number: {
                                // phoneUS: true
                            },
                            address: {
                                required: true
                            },
                            city: {
                                required: true
                            },
                            state: {
                                required: true
                            },
                            zipcode: {
                                required: true
                            },
                            intro: {
                                required: true
                            },
                            about_me: {
                                required: true
                            },
                        },
                        messages: {
                            company_name: {
                                required: "Provide a company name",
                            },
                            firstname: {
                                required: "Provide a first name",
                            },
                            lastname: {
                                required: "Provide a last name",
                            },
                            username: {
                                required: "Provide a last name",
                            },
                            gender: {
                                required: "Select a Gender",
                            },
                            phone_number: {
                                // phoneUS: "Phone number format is invalid. Please enter phone in format of (XXX) XXX XXX",
                            },
                            address: {
                                required: "Provide an adderess",
                            },
                            city: {
                                required: "Provide a city",
                            },
                            state: {
                                required: "Provide a state",
                            },
                            zipcode: {
                                required: "Provide a zipcode",
                            },
                            intro: {
                                required: "Provide a intro",
                            },
                            about_me: {
                                required: "Provide about me",
                            },
                        },
                        submitHandler: saveProfileDetail
                    });
                });

                // $("#submit_familydetail").click(function(){
                //       console.log("called2")
                //     $('#frmaddFamilyDetail').submit();
                //   });


                // validate user detail form
                $('#frmaddFamilyDetail').submit(function (e) {
                    //console.log("callled")
                    e.preventDefault();
                    // check for validation
                    $('#frmaddFamilyDetail').validate({
                        rules: {
                            first_name: {
                                required: true
                            },
                            last_name: {
                                required: true
                            },
                            gender: {
                                required: true
                            },
                            // email:{
                            //     required:true
                            // },
                            relationship: {
                                required: true
                            },
                            birthday: {
                                required: true

                            },
                            mobile: {
                                required: true,
                                maxlength: 10,
                                minlength: 10,
                                // phoneUS: true

                            },
                            emergency_contact: {
                                maxlength: 10,
                                minlength: 10,
                            },
                        },
                        messages: {
                            mobile: {
                                required: "Provide a phone number",
                                minlength: "Please enter a valid contact number",
                                maxlength: "Please enter a valid contact number",
                            },
                            first_name: {
                                required: "Provide a first name",
                            },
                            last_name: {
                                required: "Provide a last name",
                            },
                            gender: {
                                required: "Select a Gender",
                            },
                            relationship: {
                                required: "Select relationship",
                            },
                            birthday: {
                                required: "Select Birthdate",
                            },
                            // email: {
                            //   required: "Email field is required",
                            // },
                            emergency_contact: {
                                minlength: "Please enter a valid contact number",
                                maxlength: "Please enter a valid contact number",
                            },
                        },
                        submitHandler: saveFamilyDetail
                    });
                });

                //$("#submit_cover")
                // save user profile
                function saveProfileDetail() {
                    if ($('#frmeditProfileDetail').valid()) {
                        var formData = $("#frmeditProfileDetail").serialize();
                        $.ajax({
                            url: '/profile/editProfileDetail',
                            type: 'POST',
                            dataType: 'json',
                            data: formData,
                            beforeSend: function () {
                                $('#submit_profiledetail').prop('disabled', true);
                            },
                            complete: function () {
                                $('#submit_profiledetail').prop('disabled', false);
                            },
                            success: function (response) {
                                showSystemMessages('#systemMessage_detail', response.type, response.msg);
                                console.log(response);
                                if (response.type == 'success') {
                                    setTimeout(function () {
                                        location.reload();
                                    }, 1000);
                                    // window.location = "/profile/viewProfile";
                                }
                            }
                        });
                    }
                }

                function saveFamilyDetail() {
                    if ($('#frmaddFamilyDetail').valid()) {
                        var formData = $("#frmaddFamilyDetail").serialize();
                        $.ajax({
                            url: '/add-family-detail',
                            type: 'POST',
                            dataType: 'json',
                            data: formData,
                            beforeSend: function () {
                                $('#submit_familydetail').prop('disabled', true);
                            },
                            complete: function () {
                                $('#submit_familydetail').prop('disabled', false);
                            },
                            success: function (response) {
                                showSystemMessages('#systemMessage_detail', response.type, response.msg);
                                console.log(response);
                                if (response.type == 'success') {
                                    setTimeout(function () {
                                        location.reload();
                                    }, 1000);
                                    // window.location = "/profile/viewProfile";
                                }
                            }
                        });
                    }
                }

                $('textarea#message_area').on('keyup', function () {
                    var maxlen = $(this).attr('maxlength');

                    var length = $(this).val().length;
                    if (length > (maxlen - 10)) {
                        $('#textarea_message').text('max length ' + maxlen + ' characters only!')
                    } else
                    {
                        $('#textarea_message').text('');
                    }
                });

                $('textarea#about_msg').on('keyup', function () {
                    var maxlen = $(this).attr('maxlength');
                    var length = $(this).val().length;
                    if (length > (maxlen - 10)) {
                        $('#aboutarea_message').text('max length ' + maxlen + ' characters only!')
                    } else
                    {
                        $('#aboutarea_message').text('');
                    }
                });

                function removeUpload_coverphoto() {
                    if (confirm("Are you sure you want to delete cover photo?")) {
                        var _token = $("input[name='_token']").val();
                        $.ajax({
                            type: 'POST',
                            url: '{{route("removeusercoverphoto")}}',
                            data: {
                                _token: _token
                            },
                            success: function (data) {
                                alert("Cover photo removed successfully.");
                                window.location.reload();
                            }
                        });
                    }
                }
            </script>

            @endsection