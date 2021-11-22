@extends('layouts.header')
@section('content')

<link rel="shortcut icon" href="{{ url('public/img/favicon.png') }}">

<!--<link rel="stylesheet" type="text/css" href="{{ url('public/css/bootstrap.css') }}">-->
<link rel="stylesheet" type="text/css" href="{{ url('public/css/all.css') }}">
<link rel="stylesheet" type="text/css" href="{{ url('public/css/metismenu.min.css') }}">
<link href="{{ url('public/css/jquery-ui.css') }}" rel="stylesheet" type="text/css">
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
                        <h4 class="page-title">Bookings</h4>
                    </div>

                    <div class="booking_info_section padding-1 white-bg border-radius1">

                        <div class="bookings-block">

                            <nav>

                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="nav-today-tab" data-toggle="tab" href="#nav-today" role="tab" aria-controls="nav-today" aria-selected="true">Today</a>

                                    <a class="nav-item nav-link" id="nav-upcoming-tab" data-toggle="tab" href="#nav-upcoming" role="tab" aria-controls="nav-upcoming" aria-selected="false">Upcoming</a>

                                    <a class="nav-item nav-link" id="nav-pending-tab" data-toggle="tab" href="#nav-pending" role="tab" aria-controls="nav-pending" aria-selected="false">Pending</a>

                                    <a class="nav-item nav-link" id="nav-completed-tab" data-toggle="tab" href="#nav-completed" role="tab" aria-controls="nav-completed" aria-selected="true">Completed</a>

                                    <a class="nav-item nav-link" id="nav-incomplete-tab" data-toggle="tab" href="#nav-incomplete" role="tab" aria-controls="nav-incomplete" aria-selected="false">Incomplete</a>

                                    <a class="nav-item nav-link" id="nav-cancelled-tab" data-toggle="tab" href="#nav-cancelled" role="tab" aria-controls="nav-cancelled" aria-selected="false">Cancelled</a>
                                </div>

                            </nav>

                            <div class="tab-content" id="nav-tabContent">

                                <div class="tab-pane active" id="nav-today" role="tabpanel" aria-labelledby="nav-today-tab">

                                    <div class="showentrie_block col-md-12 p-0">

                                        <div class="showentries_date_block">

                                            <div class="show_block">
                                                <label for="">Show</label>
                                                <select name="" id="" class="form-control">
                                                    <option value="">10</option>
                                                    <option value="">25</option>
                                                    <option value="">50</option>
                                                    <option value="">All</option>
                                                </select>
                                                <label for="">Entries</label>
                                            </div>

                                            <div class="date_block">
                                                <label for="">Date:</label>
                                                <input type="text" name="" id="" placeholder="Search By Date" class="form-control booking-date">
                                                <i class="far fa-calendar-alt"></i>
                                            </div>

                                        </div>

                                        <div class="search_block">
                                            <label for="">Search:</label>
                                            <input type="search" name="" id="" placeholder="See by Businesses Booked" class="form-control">
                                        </div>

                                    </div>

                                    <div class="col-md-12 p-0">
                                        <p><b>Today Date: Wednesday, April 07, 2021</b></p>
                                    </div>

                                    <div class="row">

                                        <div class="col-md-4 col-sm-6">

                                            <div class="boxes_arts">

                                                <div class="headboxes">
                                                    <img src="{{ url('public/img/volar.png') }}" class="imgboxes" alt="">
                                                    <h4>Valor Mixed Martial Arts</h4>
                                                    <div class="highlighted_box">Confirmed</div>
                                                </div>

                                                <div class="middleboxes middletoday">
                                                    <p>
                                                        <span>BOOKING #</span>
                                                        <span>1</span>
                                                    </p>
                                                    <p>
                                                        <span>TOTAL PRICE</span>
                                                        <span>$1,200</span>
                                                    </p>
                                                    <p>
                                                        <span>PAYMENT TYPE:</span>
                                                        <span>15 Sessions</span>
                                                    </p>
                                                    <p>
                                                        <span>TOTAL REMAINING:</span>
                                                        <span>14/15</span>
                                                    </p>
                                                    <p>
                                                        <span>DATE BOOKED:</span>
                                                        <span>04/07/2021</span>
                                                    </p>
                                                    <p>
                                                        <span>RESERVED DATE:</span>
                                                        <span>04/07/2021</span>
                                                    </p>
                                                    <p>
                                                        <span>RESERVED TIMED:</span>
                                                        <span>12:00 PM EST</span>
                                                    </p>
                                                    <p>
                                                        <span>BOOKED BY:</span>
                                                        <span>Darryl Phipps</span>
                                                    </p>
                                                    <p>
                                                        <span>CHECK IN DATE:</span>
                                                        <span>04/07/2021</span>
                                                    </p>
                                                    <p>
                                                        <span>CHECK IN TIME:</span>
                                                        <span>12:15 PM EST</span>
                                                    </p>
                                                    <p>
                                                        <span>ACTIVITY TYPE:</span>
                                                        <span>Kickboxing</span>
                                                    </p>
                                                    <p>
                                                        <span>SERVICE TYPE:</span>
                                                        <span>Personal Training</span>
                                                    </p>
                                                    <p>
                                                        <span>PROGRAM NAME:</span>
                                                        <span>Kickboxing for Adults</span>
                                                    </p>
                                                    <p>
                                                        <span>ACTIVITY LOCATION:</span>
                                                        <span>On Location</span>
                                                    </p>
                                                    <p>
                                                        <span>DURATION:</span>
                                                        <span>1 Hour</span>
                                                    </p>
                                                    <p>
                                                        <span>GREAT FOR:</span>
                                                        <span>Adults</span>
                                                    </p>
                                                    <p>
                                                        <span>GROUP SIZE:</span>
                                                        <span>2</span>
                                                    </p>
                                                    <p>
                                                        <span>WHO IS PARTICIPATING?</span>
                                                        <span>Me (18+) <br>Lisa (18+)</span>
                                                    </p>
                                                </div>

                                                <div class="foterboxes">
                                                    <div class="threebtn_fboxes">
                                                        <a href="#">Check In</a>
                                                        <a href="#">Reschedule</a>
                                                        <a href="#">Cancel</a>
                                                    </div>
                                                    <div class="icon">
                                                        <span><img src="{{ url('public/img/map.png') }}" alt=""></span>
                                                        <span><img src="{{ url('public/img/message.png') }}" alt=""></span>
                                                    </div>
                                                    <div class="viewmore_links">
                                                        <a id="viewmore">View More <img src="{{ url('public/img/arrow-down.png') }}" alt=""></a>
                                                        <a id="viewless">View Less <img src="{{ url('public/img/arrow-down.png') }}" alt=""></a>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>

                                        <div class="col-md-4 col-sm-6">

                                            <div class="boxes_arts">

                                                <div class="headboxes">
                                                    <img src="{{ url('public/img/volar.png') }}" class="imgboxes" alt="">
                                                    <h4>Valor Mixed Martial Arts</h4>
                                                    <div class="highlighted_box">Confirmed</div>
                                                </div>

                                                <div class="middleboxes1 middletoday1">
                                                    <p>
                                                        <span>BOOKING #</span>
                                                        <span>1</span>
                                                    </p>
                                                    <p>
                                                        <span>TOTAL PRICE</span>
                                                        <span>$1,200</span>
                                                    </p>
                                                    <p>
                                                        <span>PAYMENT TYPE:</span>
                                                        <span>15 Sessions</span>
                                                    </p>
                                                    <p>
                                                        <span>TOTAL REMAINING:</span>
                                                        <span>14/15</span>
                                                    </p>
                                                    <p>
                                                        <span>DATE BOOKED:</span>
                                                        <span>04/07/2021</span>
                                                    </p>
                                                    <p>
                                                        <span>RESERVED DATE:</span>
                                                        <span>04/07/2021</span>
                                                    </p>
                                                    <p>
                                                        <span>RESERVED TIMED:</span>
                                                        <span>12:00 PM EST</span>
                                                    </p>
                                                    <p>
                                                        <span>BOOKED BY:</span>
                                                        <span>Darryl Phipps</span>
                                                    </p>
                                                    <p>
                                                        <span>CHECK IN DATE:</span>
                                                        <span>04/07/2021</span>
                                                    </p>
                                                    <p>
                                                        <span>CHECK IN TIME:</span>
                                                        <span>12:15 PM EST</span>
                                                    </p>
                                                    <p>
                                                        <span>ACTIVITY TYPE:</span>
                                                        <span>Kickboxing</span>
                                                    </p>
                                                    <p>
                                                        <span>SERVICE TYPE:</span>
                                                        <span>Personal Training</span>
                                                    </p>
                                                    <p>
                                                        <span>PROGRAM NAME:</span>
                                                        <span>Kickboxing for Adults</span>
                                                    </p>
                                                    <p>
                                                        <span>ACTIVITY LOCATION:</span>
                                                        <span>On Location</span>
                                                    </p>
                                                    <p>
                                                        <span>DURATION:</span>
                                                        <span>1 Hour</span>
                                                    </p>
                                                    <p>
                                                        <span>GREAT FOR:</span>
                                                        <span>Adults</span>
                                                    </p>
                                                    <p>
                                                        <span>GROUP SIZE:</span>
                                                        <span>2</span>
                                                    </p>
                                                    <p>
                                                        <span>WHO IS PARTICIPATING?</span>
                                                        <span>Me (18+) <br>Lisa (18+)</span>
                                                    </p>
                                                </div>

                                                <div class="foterboxes">
                                                    <div class="threebtn_fboxes">
                                                        <a href="#">Check In</a>
                                                        <a href="#">Reschedule</a>
                                                        <a href="#">Cancel</a>
                                                    </div>
                                                    <div class="icon">
                                                        <span><img src="{{ url('public/img/map.png') }}" alt=""></span>
                                                        <span><img src="{{ url('public/img/message.png') }}" alt=""></span>
                                                    </div>
                                                    <div class="viewmore_links">
                                                        <a id="viewmore1">View More <img src="{{ url('public/img/arrow-down.png') }}" alt=""></a>
                                                        <a id="viewless1">View Less <img src="{{ url('public/img/arrow-down.png') }}" alt=""></a>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                                <div class="tab-pane" id="nav-upcoming" role="tabpanel" aria-labelledby="nav-upcoming-tab">
                                    <h4>Upcoming</h4>
                                </div>

                                <div class="tab-pane" id="nav-pending" role="tabpanel" aria-labelledby="nav-pending-tab">
                                    
                                    <div class="showentrie_block col-md-12 p-0">

                                        <div class="showentries_date_block">

                                            <div class="show_block">
                                                <label for="">Show</label>
                                                <select name="" id="" class="form-control">
                                                    <option value="">10</option>
                                                    <option value="">25</option>
                                                    <option value="">50</option>
                                                    <option value="">All</option>
                                                </select>
                                                <label for="">Entries</label>
                                            </div>

                                            <div class="date_block">
                                                <label for="">Date:</label>
                                                <input type="text" name="" id="" placeholder="Search By Date" class="form-control booking_date1">
                                                <i class="far fa-calendar-alt"></i>
                                            </div>

                                        </div>

                                        <div class="search_block">
                                            <label for="">Search:</label>
                                            <input type="search" name="" id="" placeholder="See by Businesses Booked" class="form-control">
                                        </div>

                                    </div>

                                    <div class="row">

                                        <div class="col-md-4 col-sm-6">

                                            <div class="boxes_arts pendingbox">

                                                <div class="headboxes">
                                                    <img src="{{ url('public/img/volar.png') }}" class="imgboxes" alt="">
                                                    <h4>Valor Mixed Martial Arts</h4>
                                                    <div class="highlighted_box pendinghili">Waiting for Confirmation</div>
                                                </div>

                                                <div class="middleboxes middlepending">
                                                    <p>
                                                        <span>BOOKING #</span>
                                                        <span>1</span>
                                                    </p>
                                                    <p>
                                                        <span>TOTAL PRICE</span>
                                                        <span>$1,200</span>
                                                    </p>
                                                    <p>
                                                        <span>PAYMENT TYPE:</span>
                                                        <span>15 Sessions</span>
                                                    </p>
                                                    <p>
                                                        <span>TOTAL REMAINING:</span>
                                                        <span>14/15</span>
                                                    </p>
                                                    <p>
                                                        <span>DATE BOOKED:</span>
                                                        <span>04/07/2021</span>
                                                    </p>
                                                    <p>
                                                        <span>RESERVED DATE:</span>
                                                        <span>04/07/2021</span>
                                                    </p>
                                                    <p>
                                                        <span>RESERVED TIMED:</span>
                                                        <span>12:00 PM EST</span>
                                                    </p>
                                                    <p>
                                                        <span>BOOKED BY:</span>
                                                        <span>Darryl Phipps</span>
                                                    </p>
                                                    <p>
                                                        <span>CHECK IN DATE:</span>
                                                        <span>04/07/2021</span>
                                                    </p>
                                                    <p>
                                                        <span>CHECK IN TIME:</span>
                                                        <span>12:15 PM EST</span>
                                                    </p>
                                                    <p>
                                                        <span>ACTIVITY TYPE:</span>
                                                        <span>Kickboxing</span>
                                                    </p>
                                                    <p>
                                                        <span>SERVICE TYPE:</span>
                                                        <span>Personal Training</span>
                                                    </p>
                                                    <p>
                                                        <span>PROGRAM NAME:</span>
                                                        <span>Kickboxing for Adults</span>
                                                    </p>
                                                    <p>
                                                        <span>ACTIVITY LOCATION:</span>
                                                        <span>On Location</span>
                                                    </p>
                                                    <p>
                                                        <span>DURATION:</span>
                                                        <span>1 Hour</span>
                                                    </p>
                                                    <p>
                                                        <span>GREAT FOR:</span>
                                                        <span>Adults</span>
                                                    </p>
                                                    <p>
                                                        <span>GROUP SIZE:</span>
                                                        <span>2</span>
                                                    </p>
                                                    <p>
                                                        <span>WHO IS PARTICIPATING?</span>
                                                        <span>Me (18+) <br>Lisa (18+)</span>
                                                    </p>
                                                </div>

                                                <div class="foterboxes">
                                                    <div class="threebtn_fboxes justify-content-end">
                                                        <a href="#"></a>
                                                        <a href="#">Reschedule</a>
                                                        <a href="#">Cancel</a>
                                                    </div>
                                                    <div class="icon">
                                                        <span><a href="#"><i class="fas fa-comment-dots"></i></a></span>
                                                        <span><img src="{{ url('public/img/map.png') }}" alt=""></span>
                                                        <span><img src="{{ url('public/img/message.png') }}" alt=""></span>
                                                    </div>
                                                    <div class="viewmore_links">
                                                        <a id="viewmore" class="viewpend">View More <img src="{{ url('public/img/arrow-down.png') }}" alt=""></a>
                                                        <a id="viewless" class="lesspend">View Less <img src="{{ url('public/img/arrow-down.png') }}" alt=""></a>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>

                                        <div class="col-md-4 col-sm-6">

                                            <div class="boxes_arts pendingbox">

                                                <div class="headboxes">
                                                    <img src="{{ url('public/img/volar.png') }}" class="imgboxes" alt="">
                                                    <h4>Valor Mixed Martial Arts</h4>
                                                    <div class="highlighted_box pendinghili">Respond to Your Quotes</div>
                                                </div>

                                                <div class="middleboxes1 middlepending1">
                                                    <p>
                                                        <span>BOOKING #</span>
                                                        <span>1</span>
                                                    </p>
                                                    <p>
                                                        <span>TOTAL PRICE</span>
                                                        <span>$1,200</span>
                                                    </p>
                                                    <p>
                                                        <span>PAYMENT TYPE:</span>
                                                        <span>15 Sessions</span>
                                                    </p>
                                                    <p>
                                                        <span>TOTAL REMAINING:</span>
                                                        <span>14/15</span>
                                                    </p>
                                                    <p>
                                                        <span>DATE BOOKED:</span>
                                                        <span>04/07/2021</span>
                                                    </p>
                                                    <p>
                                                        <span>RESERVED DATE:</span>
                                                        <span>04/07/2021</span>
                                                    </p>
                                                    <p>
                                                        <span>RESERVED TIMED:</span>
                                                        <span>12:00 PM EST</span>
                                                    </p>
                                                    <p>
                                                        <span>BOOKED BY:</span>
                                                        <span>Darryl Phipps</span>
                                                    </p>
                                                    <p>
                                                        <span>CHECK IN DATE:</span>
                                                        <span>04/07/2021</span>
                                                    </p>
                                                    <p>
                                                        <span>CHECK IN TIME:</span>
                                                        <span>12:15 PM EST</span>
                                                    </p>
                                                    <p>
                                                        <span>ACTIVITY TYPE:</span>
                                                        <span>Kickboxing</span>
                                                    </p>
                                                    <p>
                                                        <span>SERVICE TYPE:</span>
                                                        <span>Personal Training</span>
                                                    </p>
                                                    <p>
                                                        <span>PROGRAM NAME:</span>
                                                        <span>Kickboxing for Adults</span>
                                                    </p>
                                                    <p>
                                                        <span>ACTIVITY LOCATION:</span>
                                                        <span>On Location</span>
                                                    </p>
                                                    <p>
                                                        <span>DURATION:</span>
                                                        <span>1 Hour</span>
                                                    </p>
                                                    <p>
                                                        <span>GREAT FOR:</span>
                                                        <span>Adults</span>
                                                    </p>
                                                    <p>
                                                        <span>GROUP SIZE:</span>
                                                        <span>2</span>
                                                    </p>
                                                    <p>
                                                        <span>WHO IS PARTICIPATING?</span>
                                                        <span>Me (18+) <br>Lisa (18+)</span>
                                                    </p>
                                                </div>

                                                <div class="foterboxes">
                                                    <div class="threebtn_fboxes justify-content-end">
                                                        <a href="#"></a>
                                                        <a href="#">Reschedule</a>
                                                        <a href="#">Cancel</a>
                                                    </div>
                                                    <div class="icon">
                                                        <span><img src="{{ url('public/img/message.png') }}" alt=""></span>
                                                        <span><img src="{{ url('public/img/map.png') }}" alt=""></span>
                                                        <span><a href="#"><i class="fas fa-comment-dots"></i></a></span>
                                                    </div>
                                                    <div class="viewmore_links">
                                                        <a id="viewmore1" class="viewpend1">View More <img src="{{ url('public/img/arrow-down.png') }}" alt=""></a>
                                                        <a id="viewless1" class="lesspend1">View Less <img src="{{ url('public/img/arrow-down.png') }}" alt=""></a>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>

                                    </div>
                                    
                                </div>

                                <div class="tab-pane" id="nav-completed" role="tabpanel" aria-labelledby="nav-completed-tab">

                                    <div class="showentrie_block col-md-12 p-0">

                                        <div class="showentries_date_block">

                                            <div class="show_block">
                                                <label for="">Show</label>
                                                <select name="" id="" class="form-control">
                                                    <option value="">10</option>
                                                    <option value="">25</option>
                                                    <option value="">50</option>
                                                    <option value="">All</option>
                                                </select>
                                                <label for="">Entries</label>
                                            </div>

                                            <div class="date_block">
                                                <label for="">Date:</label>
                                                <input type="text" name="" id="" placeholder="Search By Date" class="form-control booking_date2">
                                                <i class="far fa-calendar-alt"></i>
                                            </div>

                                        </div>

                                        <div class="search_block">
                                            <label for="">Search:</label>
                                            <input type="search" name="" id="" placeholder="See by Businesses Booked" class="form-control">
                                        </div>

                                    </div>

                                    <div class="row">

                                        <div class="col-md-4 col-sm-6">

                                            <div class="boxes_arts completebox">

                                                <div class="headboxes">
                                                    <img src="{{ url('public/img/volar.png') }}" class="imgboxes" alt="">
                                                    <h4>Valor Mixed Martial Arts</h4>
                                                    <div class="highlighted_box completehili">Completed</div>
                                                </div>

                                                <div class="middleboxes middlecomp">
                                                    <p>
                                                        <span>BOOKING #</span>
                                                        <span>1</span>
                                                    </p>
                                                    <p>
                                                        <span>TOTAL PRICE</span>
                                                        <span>$1,200</span>
                                                    </p>
                                                    <p>
                                                        <span>PAYMENT TYPE:</span>
                                                        <span>15 Sessions</span>
                                                    </p>
                                                    <p>
                                                        <span>TOTAL REMAINING:</span>
                                                        <span>14/15</span>
                                                    </p>
                                                    <p>
                                                        <span>DATE BOOKED:</span>
                                                        <span>04/07/2021</span>
                                                    </p>
                                                    <p>
                                                        <span>RESERVED DATE:</span>
                                                        <span>04/07/2021</span>
                                                    </p>
                                                    <p>
                                                        <span>RESERVED TIMED:</span>
                                                        <span>12:00 PM EST</span>
                                                    </p>
                                                    <p>
                                                        <span>BOOKED BY:</span>
                                                        <span>Darryl Phipps</span>
                                                    </p>
                                                    <p>
                                                        <span>CHECK IN DATE:</span>
                                                        <span>04/07/2021</span>
                                                    </p>
                                                    <p>
                                                        <span>CHECK IN TIME:</span>
                                                        <span>12:15 PM EST</span>
                                                    </p>
                                                    <p>
                                                        <span>ACTIVITY TYPE:</span>
                                                        <span>Kickboxing</span>
                                                    </p>
                                                    <p>
                                                        <span>SERVICE TYPE:</span>
                                                        <span>Personal Training</span>
                                                    </p>
                                                    <p>
                                                        <span>PROGRAM NAME:</span>
                                                        <span>Kickboxing for Adults</span>
                                                    </p>
                                                    <p>
                                                        <span>ACTIVITY LOCATION:</span>
                                                        <span>On Location</span>
                                                    </p>
                                                    <p>
                                                        <span>DURATION:</span>
                                                        <span>1 Hour</span>
                                                    </p>
                                                    <p>
                                                        <span>GREAT FOR:</span>
                                                        <span>Adults</span>
                                                    </p>
                                                    <p>
                                                        <span>GROUP SIZE:</span>
                                                        <span>2</span>
                                                    </p>
                                                    <p>
                                                        <span>WHO IS PARTICIPATING?</span>
                                                        <span>Me (18+) <br>Lisa (18+)</span>
                                                    </p>
                                                </div>

                                                <div class="foterboxes">
                                                    <div class="threebtn_fboxes justify-content-center">
                                                        <span><img src="{{ url('public/img/map.png') }}" alt=""></span>
                                                        <a href="#">Book Again</a>
                                                        <span><img src="{{ url('public/img/report.png') }}" alt=""></span>
                                                    </div>
                                                    <div class="viewmore_links">
                                                        <a id="viewmore" class="viewcomp">View More <img src="{{ url('public/img/arrow-down.png') }}" alt=""></a>
                                                        <a id="viewless" class="lesscomp">View Less <img src="{{ url('public/img/arrow-down.png') }}" alt=""></a>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>

                                        <div class="col-md-4 col-sm-6">

                                            <div class="boxes_arts completebox">

                                                <div class="headboxes">
                                                    <img src="{{ url('public/img/volar.png') }}" class="imgboxes" alt="">
                                                    <h4>Valor Mixed Martial Arts</h4>
                                                    <div class="highlighted_box completehili">Completed</div>
                                                </div>

                                                <div class="middleboxes1 middlecomp1">
                                                    <p>
                                                        <span>BOOKING #</span>
                                                        <span>1</span>
                                                    </p>
                                                    <p>
                                                        <span>TOTAL PRICE</span>
                                                        <span>$1,200</span>
                                                    </p>
                                                    <p>
                                                        <span>PAYMENT TYPE:</span>
                                                        <span>15 Sessions</span>
                                                    </p>
                                                    <p>
                                                        <span>TOTAL REMAINING:</span>
                                                        <span>14/15</span>
                                                    </p>
                                                    <p>
                                                        <span>DATE BOOKED:</span>
                                                        <span>04/07/2021</span>
                                                    </p>
                                                    <p>
                                                        <span>RESERVED DATE:</span>
                                                        <span>04/07/2021</span>
                                                    </p>
                                                    <p>
                                                        <span>RESERVED TIMED:</span>
                                                        <span>12:00 PM EST</span>
                                                    </p>
                                                    <p>
                                                        <span>BOOKED BY:</span>
                                                        <span>Darryl Phipps</span>
                                                    </p>
                                                    <p>
                                                        <span>CHECK IN DATE:</span>
                                                        <span>04/07/2021</span>
                                                    </p>
                                                    <p>
                                                        <span>CHECK IN TIME:</span>
                                                        <span>12:15 PM EST</span>
                                                    </p>
                                                    <p>
                                                        <span>ACTIVITY TYPE:</span>
                                                        <span>Kickboxing</span>
                                                    </p>
                                                    <p>
                                                        <span>SERVICE TYPE:</span>
                                                        <span>Personal Training</span>
                                                    </p>
                                                    <p>
                                                        <span>PROGRAM NAME:</span>
                                                        <span>Kickboxing for Adults</span>
                                                    </p>
                                                    <p>
                                                        <span>ACTIVITY LOCATION:</span>
                                                        <span>On Location</span>
                                                    </p>
                                                    <p>
                                                        <span>DURATION:</span>
                                                        <span>1 Hour</span>
                                                    </p>
                                                    <p>
                                                        <span>GREAT FOR:</span>
                                                        <span>Adults</span>
                                                    </p>
                                                    <p>
                                                        <span>GROUP SIZE:</span>
                                                        <span>2</span>
                                                    </p>
                                                    <p>
                                                        <span>WHO IS PARTICIPATING?</span>
                                                        <span>Me (18+) <br>Lisa (18+)</span>
                                                    </p>
                                                </div>

                                                <div class="foterboxes">
                                                    <div class="threebtn_fboxes justify-content-center">
                                                        <span><img src="{{ url('public/img/map.png') }}" alt=""></span>
                                                        <a href="#">Book Again</a>
                                                        <span><img src="{{ url('public/img/report.png') }}" alt=""></span>
                                                    </div>
                                                    <div class="viewmore_links">
                                                        <a id="viewmore1" class="viewcomp1">View More <img src="{{ url('public/img/arrow-down.png') }}" alt=""></a>
                                                        <a id="viewless1" class="lesscomp1">View Less <img src="{{ url('public/img/arrow-down.png') }}" alt=""></a>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                                <div class="tab-pane" id="nav-incomplete" role="tabpanel" aria-labelledby="nav-incomplete-tab">
                                    <h4>Incomplete</h4>
                                </div>

                                <div class="tab-pane" id="nav-cancelled" role="tabpanel" aria-labelledby="nav-cancelled-tab">
                                    
                                    <div class="showentrie_block col-md-12 p-0">

                                        <div class="showentries_date_block">

                                            <div class="show_block">
                                                <label for="">Show</label>
                                                <select name="" id="" class="form-control">
                                                    <option value="">10</option>
                                                    <option value="">25</option>
                                                    <option value="">50</option>
                                                    <option value="">All</option>
                                                </select>
                                                <label for="">Entries</label>
                                            </div>

                                            <div class="date_block">
                                                <label for="">Date:</label>
                                                <input type="text" name="" id="" placeholder="Search By Date" class="form-control booking_date3">
                                                <i class="far fa-calendar-alt"></i>
                                            </div>

                                        </div>

                                        <div class="search_block">
                                            <label for="">Search:</label>
                                            <input type="search" name="" id="" placeholder="See by Businesses Booked" class="form-control">
                                        </div>

                                    </div>

                                    <div class="row">

                                        <div class="col-md-4 col-sm-6">

                                            <div class="boxes_arts cancelbox">

                                                <div class="headboxes">
                                                    <img src="{{ url('public/img/volar.png') }}" class="imgboxes" alt="">
                                                    <h4>Valor Mixed Martial Arts</h4>
                                                    <div class="highlighted_box cancelhili">Cancelled</div>
                                                </div>

                                                <div class="middleboxes middlecan">
                                                    <p>
                                                        <span>BOOKING #</span>
                                                        <span>1</span>
                                                    </p>
                                                    <p>
                                                        <span>TOTAL PRICE</span>
                                                        <span>$1,200</span>
                                                    </p>
                                                    <p>
                                                        <span>PAYMENT TYPE:</span>
                                                        <span>15 Sessions</span>
                                                    </p>
                                                    <p>
                                                        <span>TOTAL REMAINING:</span>
                                                        <span>14/15</span>
                                                    </p>
                                                    <p>
                                                        <span>DATE BOOKED:</span>
                                                        <span>04/07/2021</span>
                                                    </p>
                                                    <p>
                                                        <span>RESERVED DATE:</span>
                                                        <span>04/07/2021</span>
                                                    </p>
                                                    <p>
                                                        <span>RESERVED TIMED:</span>
                                                        <span>12:00 PM EST</span>
                                                    </p>
                                                    <p>
                                                        <span>BOOKED BY:</span>
                                                        <span>Darryl Phipps</span>
                                                    </p>
                                                    <p>
                                                        <span>CHECK IN DATE:</span>
                                                        <span>04/07/2021</span>
                                                    </p>
                                                    <p>
                                                        <span>CHECK IN TIME:</span>
                                                        <span>12:15 PM EST</span>
                                                    </p>
                                                    <p>
                                                        <span>ACTIVITY TYPE:</span>
                                                        <span>Kickboxing</span>
                                                    </p>
                                                    <p>
                                                        <span>SERVICE TYPE:</span>
                                                        <span>Personal Training</span>
                                                    </p>
                                                    <p>
                                                        <span>PROGRAM NAME:</span>
                                                        <span>Kickboxing for Adults</span>
                                                    </p>
                                                    <p>
                                                        <span>ACTIVITY LOCATION:</span>
                                                        <span>On Location</span>
                                                    </p>
                                                    <p>
                                                        <span>DURATION:</span>
                                                        <span>1 Hour</span>
                                                    </p>
                                                    <p>
                                                        <span>GREAT FOR:</span>
                                                        <span>Adults</span>
                                                    </p>
                                                    <p>
                                                        <span>GROUP SIZE:</span>
                                                        <span>2</span>
                                                    </p>
                                                    <p>
                                                        <span>WHO IS PARTICIPATING?</span>
                                                        <span>Me (18+) <br>Lisa (18+)</span>
                                                    </p>
                                                </div>

                                                <div class="foterboxes">
                                                    <div class="threebtn_fboxes justify-content-center">
                                                        <a href="#">Book Again</a>
                                                    </div>
                                                    <div class="icon">
                                                        <span><a href="#"><i class="fas fa-comment-dots"></i></a></span>
                                                        <span><img src="{{ url('public/img/map.png') }}" alt=""></span>
                                                        <span><img src="{{ url('public/img/message.png') }}" alt=""></span>
                                                    </div>
                                                    <div class="viewmore_links">
                                                        <a id="viewmore" class="viewcan">View More <img src="{{ url('public/img/arrow-down.png') }}" alt=""></a>
                                                        <a id="viewless" class="lesscan">View Less <img src="{{ url('public/img/arrow-down.png') }}" alt=""></a>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>

                                        <div class="col-md-4 col-sm-6">

                                            <div class="boxes_arts cancelbox">

                                                <div class="headboxes">
                                                    <img src="{{ url('public/img/volar.png') }}" class="imgboxes" alt="">
                                                    <h4>Valor Mixed Martial Arts</h4>
                                                    <div class="highlighted_box cancelhili">Cancelled</div>
                                                </div>

                                                <div class="middleboxes1 middlecan1">
                                                    <p>
                                                        <span>BOOKING #</span>
                                                        <span>1</span>
                                                    </p>
                                                    <p>
                                                        <span>TOTAL PRICE</span>
                                                        <span>$1,200</span>
                                                    </p>
                                                    <p>
                                                        <span>PAYMENT TYPE:</span>
                                                        <span>15 Sessions</span>
                                                    </p>
                                                    <p>
                                                        <span>TOTAL REMAINING:</span>
                                                        <span>14/15</span>
                                                    </p>
                                                    <p>
                                                        <span>DATE BOOKED:</span>
                                                        <span>04/07/2021</span>
                                                    </p>
                                                    <p>
                                                        <span>RESERVED DATE:</span>
                                                        <span>04/07/2021</span>
                                                    </p>
                                                    <p>
                                                        <span>RESERVED TIMED:</span>
                                                        <span>12:00 PM EST</span>
                                                    </p>
                                                    <p>
                                                        <span>BOOKED BY:</span>
                                                        <span>Darryl Phipps</span>
                                                    </p>
                                                    <p>
                                                        <span>CHECK IN DATE:</span>
                                                        <span>04/07/2021</span>
                                                    </p>
                                                    <p>
                                                        <span>CHECK IN TIME:</span>
                                                        <span>12:15 PM EST</span>
                                                    </p>
                                                    <p>
                                                        <span>ACTIVITY TYPE:</span>
                                                        <span>Kickboxing</span>
                                                    </p>
                                                    <p>
                                                        <span>SERVICE TYPE:</span>
                                                        <span>Personal Training</span>
                                                    </p>
                                                    <p>
                                                        <span>PROGRAM NAME:</span>
                                                        <span>Kickboxing for Adults</span>
                                                    </p>
                                                    <p>
                                                        <span>ACTIVITY LOCATION:</span>
                                                        <span>On Location</span>
                                                    </p>
                                                    <p>
                                                        <span>DURATION:</span>
                                                        <span>1 Hour</span>
                                                    </p>
                                                    <p>
                                                        <span>GREAT FOR:</span>
                                                        <span>Adults</span>
                                                    </p>
                                                    <p>
                                                        <span>GROUP SIZE:</span>
                                                        <span>2</span>
                                                    </p>
                                                    <p>
                                                        <span>WHO IS PARTICIPATING?</span>
                                                        <span>Me (18+) <br>Lisa (18+)</span>
                                                    </p>
                                                </div>

                                                <div class="foterboxes">
                                                    <div class="threebtn_fboxes justify-content-center">
                                                        <a href="#">Book Again</a>
                                                    </div>
                                                    <div class="icon">
                                                        <span><img src="{{ url('public/img/message.png') }}" alt=""></span>
                                                        <span><img src="{{ url('public/img/map.png') }}" alt=""></span>
                                                        <span><a href="#"><i class="fas fa-comment-dots"></i></a></span>
                                                    </div>
                                                    <div class="viewmore_links">
                                                        <a id="viewmore1" class="viewcan1">View More <img src="{{ url('public/img/arrow-down.png') }}" alt=""></a>
                                                        <a id="viewless1" class="lesscan1">View Less <img src="{{ url('public/img/arrow-down.png') }}" alt=""></a>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>

                                    </div>
                                    
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>


</div>
@include('layouts.footer')

<script src="{{ url('public/js/jquery.1.11.1.min.js') }}"></script>

<script src="{{ url('public/js/bootstrap.min.js') }}"></script>

<script src="{{ url('public/js/metisMenu.min.js') }}"></script>

<script src="{{ url('public/js/jquery.slimscroll.js') }}"></script>

<script src="{{ url('public/js/moment.min.js') }}"></script>

<script src="{{ url('public/js/jquery-ui.min.js') }}"></script>

<script src="{{ url('public/js/jquery-ui.multidatespicker.js') }}"></script>

<script src="{{ url('public/js/custom.js') }}"></script>

<script>
    $('.booking-date').datepicker({
        dateFormat: "mm/dd/yy"
    })
    $('.booking_date1').datepicker({
        dateFormat: "mm/dd/yy"
    })
    $('.booking_date2').datepicker({
        dateFormat: "mm/dd/yy"
    })
    $('.booking_date3').datepicker({
        dateFormat: "mm/dd/yy"
    })

</script>

@endsection