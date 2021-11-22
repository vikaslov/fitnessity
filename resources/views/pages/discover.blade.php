@extends('layouts.header')
@section('content')
<style>
.btn-style-one {
    position: relative;
    display: inline-block;
    font-size: 14px;
    line-height: 30px;
    color: #ffffff;
    padding: 10px 30px;
    font-weight: 500;
    overflow: hidden;
    border-radius: 50px;
    overflow: hidden;
    text-transform: capitalize;
    background-color: #f91942;
    font-family: 'Montserrat', sans-serif;
    cursor: pointer;
}

.btn-style-one:hover {
    color: #ffffff;
    background: #000;
}
</style>
<section class="main-slider inner-banner" style="background-image:url('images/full-offer-banner.jpg')">
    <div class="container">
        <h1>{{ $pageTitle }}</h1>
    </div>
</section>

<section class="breadcrumbs">
    <div class="container">
        <ul>
            <li><a href="/">HOME</a></li><li><i class="fa fa-angle-right"></i>
            </li>
            <li>{{ $pageTitle }}</li>
        </ul>
    </div>
</section>

<div class="about-services">
    <div class="container">
        <div class="about-services-title">
            <h1>Discover More and Live Actively</h1>
            <p>We believe in creating opportunities for our users to stay healthy and active while connecting to a community that’s gets them.</p><br />
            <p style="color: red;">Some Platform Features</p>
        </div>
        <ul>
            <li>
                <span><img src="images/MULTI-SPORTS-&-FITNESS-PLATFORM.png"></span>                  
                <div class="core-service-detail">
                    <h4 style="color:red"><b>Multi-Sports, Wellness & Active Experiences</b></h4> <br />
                    <p style="text-align: justify">Fitnessity helps fitness enthusiasts, athletes,
                        and newcomers take on being active 
                        differently. Getting in shape or getting invovled
                        with sports and wellness has a different
                        motivation from person to person. What motivates 
                        one person to be active might not motivate the 
                        others. Fitnessity creates the ability to book
                        one-on-one lessons, group classes, and active
                        adventures on one site.</p>
                </div>
            </li>
            <li>
                <span><img src="images/INTEGRATED-BOOKING-SOFTWARE.png"></span>                
                <div class="core-service-detail">
                    <h4 style="color:red"><b>Scheduling, Booking & Payments</b></h4>
                    <br /> <br />
                    <p style="text-align: justify">Never ask, "What time works for you?" again. Book
                        directly with hundreds of businesses and view
                        real-time availability. Book personal training,
                        classes, activties, adventures, and experiences, all
                        while paying securely online.</p>
                </div>
            </li>
            <li>
                <span><img src="images/SOCIAL-NETWORKING.png"></span>                
                <div class="core-service-detail">
                    <h4 style="color:red"><b>Social Networking, Notifications and Private Messaging (Coming Soon)</b></h4>
                    <p style="text-align: justify">Motivation plas an essential role in exercising. Without it,
                        working out becomes working. Share your experiences,
                        network with friends and instructors, send private
                        messages to discuss your needs, or chat.
                        Fitnessity uses the network to not only connect with
                        others but to use it as an accountability partner.</p>
                </div>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-10 text-right">
            <button type="button" class="btn-style-one" onclick="location.href = '/instant-hire'">Explore Now <i class="fa fa-arrow-right"></i></button>
        </div>
    </div>
</div>   

@include('layouts.footer')  
@endsection