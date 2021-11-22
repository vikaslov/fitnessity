@extends('layouts.header')
@section('content')

<link rel="shortcut icon" href="{{ url('public/img/favicon.png') }}">

<!--<link rel="stylesheet" type="text/css" href="{{ url('public/css/bootstrap.css') }}">-->
<link rel="stylesheet" type="text/css" href="{{ url('public/css/all.css') }}">
<link rel="stylesheet" type="text/css" href="{{ url('public/css/metismenu.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ url('public/css/fullcalendar.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ url('public/css/profile.css') }}">

<div class="page-wrapper inner_top" id="wrapper">

    <div class="page-container">

        <!-- Left Sidebar Start -->
        @include('personal-profile.left_panel')
        <!-- Left Sidebar End -->

        <div class="page-content-wrapper">

            <div class="content-page">

                <div class="container-fluid">

                    <div class="page-title-box">
                        <h4 class="page-title">Following</h4>
                    </div>

                    <div class="followers_section padding-1 white-bg border-radius1">
                        <?php 
                        if(isset($FollowDetail)) {
                        foreach ($FollowDetail as $data) {
                        ?>
                        <div class="followers-block">

                            <div class="followers-content">
                                <div class="admin-img">
                                    <img src="/public/uploads/profile_pic/thumb/<?php  echo $data['logo'];?>" alt="">
                                </div>
                                <div class="followers-right-content">
                                    <h5> <?php  echo $data['first_name'] . " ".$data['last_name'] ;?> </h5>
                                    <ul>
                                        <li><span>Follower</span> 1</li>
                                        <li><span>Comments</span> 5</li>
                                        <li><span>Following</span> 2</li>
                                        <li><span>Member Since</span> March 2019</li>
                                        <li><span>Listings</span> 9</li>
                                    </ul>
                                </div>
                            </div>

                            <div class="followers-button">
                                <a href="#" class="following-btn unfollow" id="<?php  echo $data['id']; ?>">Unfollow</a>
                            </div>

                        </div>
                        <?php 
                        }
                        ?>
                        <div class="pr-submit-bg text-center">
                        <p>You are not following anyone yet. Visit any profile and follow your favorite profiles.</p>
                        <div class="btn btn-submit" onclick="location.href='/instant-hire'"> Following </div>
                    </div>
                    <?php
                    } else {
                    ?>
                    <div class="pr-submit-bg text-center">
                        <p>You are not following anyone yet. Visit any profile and follow your favorite profiles.</p>
                        <div class="btn btn-submit" onclick="location.href='/instant-hire'"> Following </div>
                    </div>
                    <?php
                    }
                    ?>
                    </div>

                </div>

            </div>

        </div>

    </div>


</div>
@include('layouts.footer')

<?php /*?><script src="{{ url('public/js/jquery-3.3.1.slim.min.js') }}"></script><?php */?>

<script src="{{ url('public/js/bootstrap.min.js') }}"></script>

<script src="{{ url('public/js/metisMenu.min.js') }}"></script>

<script src="{{ url('public/js/jquery.slimscroll.js') }}"></script>

<script src="{{ url('public/js/moment.min.js') }}"></script>

<script src="{{ url('public/js/fullcalendar.min.js') }}"></script>

<script src="{{ url('public/js/jquery.fullcalendar.js') }}"></script>

<script src="{{ url('public/js/custom.js') }}"></script>

<script type="text/javascript">

$(".unfollow").click(function(){

    var _token = $("input[name='_token']").val();
    var fid = $(this).attr('id');
    
    $.ajax({
        type: 'POST',
        url: '{{route("unfollow_company")}}',
        data: {
          "_token": "{{ csrf_token() }}",
          fid:fid
        },
        success: function(data) {
          //alert(data);
          window.location.reload();
        }
    });
});

</script>

@endsection