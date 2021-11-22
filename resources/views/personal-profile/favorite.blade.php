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
                        <h4 class="page-title">My Favorite</h4>
                    </div>
                    <?php
                    if(isset($FavDetail)) {
                    foreach ($FavDetail as $data) {  
                    ?>
                    <div class="favorite_section padding-1 white-bg border-radius1">

                        <div class="favorite-block">

                            <div class="favorite-content">
                                <div class="favorite-img">
                                    <img src="/public/uploads/profile_pic/thumb/<?php  echo $data['logo'];?>" alt="">
                                    <div class="ratings-txt"><span>8.6</span> / 10</div>
                                </div>
                                <div class="favorite-right-content">
                                    <h5><?php  echo $data['first_name'];?> </h5>
                                    <ul>
                                        <li><?php  echo $data['short_description'];?></li>
                                        <li><i class="fas fa-map-marker-alt"></i> <?php  echo $data['address'];?></li>
                                        <li><i class="fas fa-phone-volume"></i> <?php  echo $data['contact_number'];?></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="favorite-button">
                                <a href="#"><i class="fas fa-eye"></i> View Listing</a>
                                <a href="#"><i class="far fa-trash-alt"></i> Remove</a>
                            </div>

                        </div>

                    </div>
                    <?php 
                    }
                    ?>
                    <div class="pr-submit-bg text-center">
                        <p>No favorite activities or businesses added. Find your favorite activity or business and keep track of them here.</p>
                        <div class="btn btn-submit" onclick="location.href='/instant-hire'"> Add Favorite </div>
                    </div>
                    <?php
                    } else {
                    ?>
                    <div class="pr-submit-bg text-center">
                        <p>No favorite activities or businesses added. Find your favorite activity or business and keep track of them here.</p>
                        <div class="btn btn-submit" onclick="location.href='/instant-hire'"> Add Favorite </div>
                    </div>
                    <?php
                    }
                    ?>
                </div>

            </div>

        </div>

    </div>


</div>
@include('layouts.footer')

<script src="{{ url('public/js/jquery-3.3.1.slim.min.js') }}"></script>

<script src="{{ url('public/js/bootstrap.min.js') }}"></script>

<script src="{{ url('public/js/metisMenu.min.js') }}"></script>

<script src="{{ url('public/js/jquery.slimscroll.js') }}"></script>

<script src="{{ url('public/js/moment.min.js') }}"></script>

<script src="{{ url('public/js/fullcalendar.min.js') }}"></script>

<script src="{{ url('public/js/jquery.fullcalendar.js') }}"></script>

<script src="{{ url('public/js/custom.js') }}"></script>

@endsection