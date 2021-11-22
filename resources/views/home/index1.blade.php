@inject('request', 'Illuminate\Http\Request')

@extends('layouts.header')

@section('content')

<section class="slider_wrapper">
    <div class="main-slider owl-carousel owl-theme">
        @foreach($sliders as $slider)
        <div class="slide" style="background-image: url('/public/uploads/slider/thumb/{{$slider->image}}') ">
            <div class="content-column">
                <div class="inner-column">
                    <div class="title">{{$slider->title}}</div>
                    <h1>{{$slider->heading}}</h1>
                    <div class="stext">{{$slider->stext}} <span>
                        @if(!empty($slider->price))
                            ${{$slider->price}}/MONTH
                        @else
                        {{$slider->price}}
                        @endif
                    </span></div>
                    <div class="btns-box">
                        <a href="{{ Config::get('constants.SITE_URL') }}/registration" class="btn btn-web-btn">Register Now</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="slider-block">
        <div class="container">
            <h1>FIND SPORTS, WELLNESS &amp; ADVENTUROUS ACTIVITIES<br></h1>
            <form id="searchform" method="get" action="/search-result-location">
                <div class="row cstm-bnner">
                    <div class="col-sm-12">
                        <ul>
                            <li>
                                <img src="{{ asset('public/images/run-icon.png') }}" alt="">
                                <input autocomplete="off" type="text" name="label" id="activity_label" placeholder="Activity or Bussiness" value="@if(isset($selected_label) && $selected_label != NULL){{$selected_label }}@endif" class="search_input_banner">
                                <div id="suggesstion-box-search-activity"></div>
                            </li>
                            <li>
                                <div id="suggestions">
                                    <img src="{{ asset('public/images/map-marker-icon.png') }}" alt="">
                                    <input autocomplete="off" id="pac-input1" name="location" type="text" placeholder="Location" value="@if(isset($selected_location) && $selected_location != NULL){{$selected_location }}@endif">
                                </div>
                                <div id="suggesstion-box-search-location"></div>
                            </li>
                            <li>
                                <img src="{{ asset('public/images/envlope-icon.png') }}" alt="">
                                <input type="text" autocomplete="off" placeholder="Zip Code" name="zipcode" id="zipcode" value="@if(isset($selected_zipcode) && $selected_zipcode != NULL){{$selected_zipcode }}@endif">
                                <div id="suggesstion-box-search-zipcode"></div>
                            </li>
                            <li><button type="submit">SEARCH</button></li>
                        </ul>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

<section class="bepart_wraper" style="background-image: url({{ asset('public/images/beapart_bg.jpg') }}) ">
    <div class="container">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="col-xs-4 col-lg-4">
                <div class="count_up">
                    <p class="counter_count">{{$count_trainer}}</p>
                    <h3>TRAINERS</h3>
                </div>
            </div>
            <div class="col-xs-4 col-lg-4">
                <div class="count_up">
                    <p class="counter_count">42</p>
                    <h3>LOCATIONS</h3>
                </div>
            </div>
            <div class="col-xs-4 col-lg-4">
                <div class="count_up">
                    <p class="counter_count">{{$count_online}}</p>
                    <h3>ACTIVITIES</h3>
                </div>
            </div>
            <div class="col-xs-4 col-lg-4">
                <div class="count_up">
                    <p class="counter_count">{{$count_business}}</p>
                    <h3>BUSSINESSES</h3>
                </div>
            </div>
            <div class="col-xs-4 col-lg-4">
                <div class="count_up">
                    <p class="counter_count">{{$count_userbooking}}</p>
                    <h3>BOOKINGS</h3>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="category" style="background-image: url({{ asset('public/images/category-bg.jpg') }})">
    <div class="cat-container">
        <div class="about-services-title" style="margin-bottom:3%">
            <h1>What Do You Like To Do</h1>
            <h3>Get Connect to a wide range of multi-sports, wellness, and active activities</h3>
        </div>
        <div class="cate-sidebar hp">
            <h1>SELECT ACTIVITY</h1>
            <ul class="select_activity_hp nav nav-tabs">
                @php 
                $k = 0;
                @endphp
                @foreach($sports_categories as $sports)
                @php 
                $data = str_replace('&', '', $sports->category_name);
                $str = str_replace(' ', '', $data);
                $str1 = str_replace(',', '', $str);
                @endphp
                <li class="@if($k== 0) active @endif">
                    <a href="#{{$str1}}" data-toggle="tab" class="search_by_category">{{$sports->category_name}}</a>
                </li>
                @php 
                $k++;
                @endphp
                @endforeach
            </ul>
        </div>

        <div class="tab-content">
            @php 
            $i = 0;
            @endphp
            @foreach($sports_categories as $sports)
            @php 
            $data = str_replace('&', '', $sports->category_name);
            $str = str_replace(' ', '', $data);
            $str1 = str_replace(',', '', $str);
            @endphp
            <div id="{{$str1}}" class="cate-list owl-carousel owl-demo-category tab-pane fade <?= ($i== 0) ? 'in active' : ''; ?>">
                @php
                $j=1;
                @endphp
                @foreach($most_searched_sports as $data)
                    @php 
                    	$catdata = explode(",",$data->category_id);
                    @endphp
                    @if (in_array($sports->id, $catdata))
                        <div class="cat-item style_prevu_sp item" data-dot="{{$j}}">
                            <span>
                                <div class="cat-img-name">
                                    <img src="{{asset('public/uploads/sports/'."$data->image")}}" alt="{{$data->sport_name}}" />
                                </div>
                                <div class="cat-detail">
                                    <h1>{{$data->sport_name}}</h1>
                                    <a href="/instant-hire?{{$data->sport_name}}">Book Now{{$j}}</a>
                                </div>
                            </span>
                        </div>
                        @php
                        $j++;
                        @endphp
                    @endif
                @endforeach

            </div>
            @php
            $i++;
            @endphp
            @endforeach

        </div>

    </div>
</section>

             
<section class="online_wraper" id="activity">
    <div class="cat-container">
        <div class="about-services-title" style="margin-bottom:3%">
            <h1>ONLINE CLASSES & ACTIVITIES</h1>
            <h3>Book your class now and start with the Training Instantly. <a href="{{ Config::get('constants.SITE_URL') }}/instant-hire" class="all_links">View All Trainings</a></h3>
        </div>
        <div class="online_classes_wrap frame" id="cyclepages">
            <ul>
                @foreach($onlines as $online)
                <li>
                    <div class="online_classes_box">
                        <div class="imageclasses">
                            <a href="/instant-hire"><img src="{{ asset('public/uploads/online/thumb/'."$online->image") }}" alt=""></a>
                            <span class="live_img"><img src="{{ asset('public/images/liveimg.png') }}" alt=""></span>
                        </div>
                        <div class="classes_title">
                            <h3>{{$online->heading}}<span>{{$online->title}}</span></h3>

                        </div>
                        <div class="classes_bottom_duration">
                            <div class="duration_wrap">
                                <span class="dtxt">DURATION</span>
                                <span class="dtxt1">{{$online->duration}}</span>
                            </div>
                            <div class="duration_wrap">
                                <span class="dtxt">LEVEL</span>
                                <span class="dtxt1">{{$online->level}}</span>
                            </div>
                            <div class="duration_wrap">
                                <span class="dtxt">TIMINGS</span>
                                <span class="dtxt1">{{$online->timings}}</span>
                            </div>
                            <div class="book_wrap">
                                <a href="/instant-hire"><span>${{$online->price}}</span><span>BOOK NOW</span></a>
                            </div>
                        </div>
                    </div>
                </li>
                @endforeach

            </ul>
        </div>
        <div class="scrollbar">
            <div class="handle">
                <div class="mousearea"></div>
            </div>
        </div>
    </div>
</section>

<section class="online_wraper1">
    <div class="cat-container">
        <div class="about-services-title" style="margin-bottom:3%">
            <h1>IN PERSON CLASSESS & ACTIVITIES</h1>
            <h3>Book your class now and start with the Training Instantly. <a href="{{ Config::get('constants.SITE_URL') }}/instant-hire" class="all_links">View All Trainings</a></h3>
        </div>
        <div class="online_classes_wrap frame" id="cyclepages1">
            <ul>
                @foreach($persons as $person)
                
                <li>
                    <div class="online_classes_box">
                        <div class="imageclasses">
                            <a href="/instant-hire"><img src="{{ asset('public/uploads/person/thumb/'."$person->image") }}" alt=""></a>
                        </div>
                        <div class="classes_title">
                            <h3>{{$person->heading}} <span>- {{$person->title}}</span></h3>
                        </div>
                        <div class="classes_bottom_duration">
                            <div class="duration_wrap">
                                <span class="dtxt">DURATION</span>
                                <span class="dtxt1">{{$person->duration}}</span>
                            </div>
                            <div class="duration_wrap">
                                <span class="dtxt">LEVEL</span>
                                <span class="dtxt1">{{$person->level}}</span>
                            </div>
                            <div class="duration_wrap">
                                <span class="dtxt">TIMINGS</span>
                                <span class="dtxt1">{{$person->timings}}</span>
                            </div>
                            <div class="book_wrap">
                                <a href="/instant-hire"><span>${{$person->price}}</span><span>BOOK NOW</span></a>
                            </div>
                        </div>
                    </div>
                </li>
                @endforeach

            </ul>
        </div>
        <div class="scrollbar">
            <div class="handle">
                <div class="mousearea"></div>
            </div>
        </div>
    </div>
</section>

@foreach($fitnessity_data as $fitnessity)

<section class="ptb-65 plr-60 why_fitnessity" id="why-fitnessity" style="background-image: url('/public/uploads/cms/{{$fitnessity->banner_image}}')">
    <div class="cat-container">
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="whyfitnessity_content">
                <div class="why_title">WHY <span>FITNESSITY?</span></div>

                <!--{{stripslashes($fitnessity->content)}}-->
                {!!$fitnessity->content!!}
                <!--{{substr(strip_tags($fitnessity->content),0,2000)}}-->


                <a href="{{ Config::get('constants.SITE_URL') }}/registration" class="button_default ml-4">Join Today</a>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12 why_video_wrap">
            <div class="video_block">
                <video id="ban_video" class="tv_video">
                    <source src="{{ asset('public/'.$fitnessity->video) }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                <div class="play-bt video_icon"><i class="fa fa-play"></i></div>
                <div class="pause-bt video_icon" style="display:none;"><i class="fa fa-pause"></i></div>
            </div>

        </div>
    </div>
</section>
@endforeach

<section class="ptb-65 plr-60 float-left w-100 discover_activities" id="discover">
    <div class="cat-container">
        <div class="about-services-title" style="margin-bottom:3%">
            <h1>DISCOVER ACTIVITIES</h1>
            <h3>Unique activities with local experts – in person or online.</h3>
        </div>
        <div class="row row1">
            @foreach($discovers as $discover)
            <div class="col-md-4 col-sm-4 col-xs-12 activities_box">
                <div class="activities_img"><a href="/instant-hire"><img src="{{ asset('public/uploads/discover/thumb/'."$discover->image") }}" alt=""></a></div>
                <div class="activites_content">
                    <h3><a href="/instant-hire">{{$discover->title}}</a></h3>
                    <p>{{$discover->description}}</p>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>

@foreach($bepart_data as $data)
<section class="ptb-65 plr-60 float-left w-100 bepart_easywrap" id="be-a-part" style="background-image: url('/public/uploads/cms/{{$data->banner_image}}')">
    <div class="cat-container">
        <div class="col-lg-6 col-md-4 col-sm-4 col-xs-12"></div>
        <div class="col-lg-6 col-md-8 col-sm-8 col-xs-12">
            <div class="bepart_easy_content">
                <h3 class="easy_title">Be a Part, <span class="easy_highlighted">IT’s EASY</span></h3>
                {!!$data->content!!}

                <a href="{{ Config::get('constants.SITE_URL') }}/registration" class="button_default">START TODAY</a>
            </div>
        </div>
    </div>
</section>
@endforeach

<section class="ptb-65 plr-60 float-left w-100 popular_trainer_wrap hide" id="trainer">
    <div class="cat-container">
        <div class="about-services-title button_title" style="margin-bottom:3%">
            <h1>JOIN THE POPULAR TRAINER</h1>
            <h3><span>Fitnessity has 53 professionals trainers that will support you in your way to <br> become healthier and happier</span><a href="{{ Config::get('constants.SITE_URL') }}/all-trainings" class="button_default_1">HIRE TRAINER</a></h3>
        </div>
        <div class="easyboxes_wrap">
            @foreach($trainers as $trainer)
            <div class="easyboxes_items">
                <div class="easy_img"><a href="#"><img src="{{ asset('public/uploads/trainer/thumb/'."$trainer->image") }}" alt=""></a></div>
                <div class="easy_content">
                    <h3><a href="#">{{$trainer->name}}</a></h3>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="plr-60 float-left w-100 social_wrap">
    <div class="cat-container">
        <ul>
            <li><a href="#"><i class="fa fa-facebook fa-w-14 fa-3x"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter fa-w-14 fa-3x"></i></a></li>
            <li><a href="#"><i class="fa fa-linkedin fa-w-14 fa-3x"></i></a></li>
            <li><a href="#"><i class="fa fa-instagram fa-w-14 fa-3x"></i></a></li>
            <li><a href="#"><i class="fa fa-youtube fa-w-14 fa-3x"></i></a></li>
            <li><a href="#"><i class="fa fa-skype fa-w-14 fa-3x"></i></a></li>
        </ul>
    </div>
</section>

@include('layouts.footer')

<script>
    $(document).ready(function() {
        var video1 = document.getElementById("ban_video");
        if (typeof(video1) != 'undefined' && video1 != null)
        {
          video1.currentTime = 0;
        }
        $(".mute-bt").click(function() {
            if ($(this).hasClass("stop")) {
                var ban_video = document.getElementById("ban_video");
                $("#ban_video").prop('muted', false);
                $(this).removeClass("stop");
            } else {
                var ban_video = document.getElementById("ban_video");
                $("#ban_video").prop('muted', true);
                $(this).addClass("stop");
            }
        });
        $(".play-bt").click(function() {
            $(".play-bt").hide();
            $(".pause-bt").show();
            var ban_video = document.getElementById("ban_video");
            if ($(".stop-bt").hasClass("active")) {
                ban_video.currentTime = 0;
            }
            ban_video.play();
        });
        $(".pause-bt").click(function() {
            $(".play-bt").show();
            $(".pause-bt").hide();
            $(".pause-bt").addClass("active");
            $(".stop-bt").removeClass("active");
            var ban_video = document.getElementById("ban_video");
            ban_video.pause();
        });
    });
</script>

<script>
    //google.maps.event.addDomListener(window, 'load', initialize);
    function initialize() {
        var options = {
            types: ['(cities)'],
            componentRestrictions: {country: "US"}
        };
        var input = document.getElementById('pac-input');
        var autocomplete = new google.maps.places.Autocomplete(input, options);
        autocomplete.addListener('place_changed', function () {
            var place = autocomplete.getPlace();
            $("#location").val(place.formatted_address);
            // place variable will have all the information you are looking for.
            // console.log(place.geometry['location'].lat());
            // console.log(place.geometry['location'].lng());
        });
    }
</script>

<script>
    $(document).ready(function(){ 
        $("#activity_label").keyup(function(){
            var _token = $('input[name="_token"]').val();

            $.ajax({

                type: "POST",
                url: "/searchactionactivity",
                data:{query:$(this).val(), _token:_token},
                beforeSend: function(){
                    //$("#label").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
                },

                success: function(data){ 
                    $("#suggesstion-box-search-activity").show();
                    $("#suggesstion-box-search-activity").html(data);
                    $("#activity_label").css("background","#FFF");
                }
            });
        });

        $(document).on('click', '.searchclickactivity', function()
        {
            $("#activity_label").val($(this).attr('data-num'));
            $("#suggesstion-box-search-activity").hide();
        });

        $("#pac-input1").keyup(function(){

            var _token = $('input[name="_token"]').val();

            $.ajax({

                type: "POST",

                url: "/searchactionlocation",

                data:{query:$(this).val(), _token:_token},

                beforeSend: function(){

                    //$("#label").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");

                },

                success: function(data){ 

                    $("#suggesstion-box-search-location").show();

                    $("#suggesstion-box-search-location").html(data);

                    $("#pac-input1").css("background","#FFF");

                }

            });

        });

    });

    $(document).on('click', '.searchclicklocation', function(){

        $("#pac-input1").val($(this).attr('data-num'));

        $("#suggesstion-box-search-location").hide();

    });

</script>

@endsection