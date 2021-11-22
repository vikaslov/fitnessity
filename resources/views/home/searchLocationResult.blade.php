@extends('layouts.header')
<style>
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    .card-claimed-business .content-left-claimed ul li{
        width: 19px!important;
        height: 19px!important;
        padding: 5px!important;
    }
    .card-claimed-business:hover{
        box-shadow: none !important;
    }
    .gm-style .gm-style-iw-c{
        padding: 0;
        left: -85px;
        width: 256 !important;
        height: 111 !important;
    }
    .gm-style-iw-d{
        max-height: 145px !important;
        overflow: hidden !important;
    }
    .card-claimed-business .img-claimed-business img{
        max-width: 100% !important;
        height :auto !important;
    }
    body{
        font-family: Poppins,Helvetica Neue,Helvetica,Arial,sans-serif;
    }
    /*.col-md-6.offset-md-2{*/
    /*    margin: 0px 0px 30px;*/
    /*}*/
    .col-md-4.offset-md-3 p{
        position: relative;
        left: 120px;
        top: 5px;
        color: #ff8026;
        font-weight: 600;
    }
    /*Profile card 2*/
    .profile-card-2{
        box-shadow: 0 0 20px 0 rgb(62 28 131 / 10%);
        border: 0px;
        overflow: hidden;
        border-radius: 7px;
    }
    .profile-card-2 .card-img-block{
        width:100%;
        height:180px;
        overflow:hidden;
        transition: .7s;
    }
    .profile-card-2 .card-img-block:hover{
        transform: scale(1.2);
        transition: .7s;
    }
    .profile-card-2 .card-body{
        position:relative;
    }
    .profile-card-2 .profile {
        border-radius: 50%;
        position: absolute;
        top: -42px;
        left: 50%;
        width: 90px;
        height: 90px;
        border: 4px solid rgb(255 255 255 / 72%);
        -webkit-transform: translate(-50%, 0%);
        transform: translate(-50%, 0%);
    }
    .profile-card-2 .card-img-block img.img-fluid {
        width: 100%;
    }
    .profile-card-2 h5{
        margin: 35px 0px 40px;
        font-weight: 600;
        color: #1b1d1f;
        text-align: center;
        font-family: system-ui;
        font-size: 17px;
    }
    .profile-card-2 h5 span{
        color: gray;
        font-size: 14px;
        font-weight: 400;
        position: relative;
        top: 5px;
    }
    .profile-card-2 .card-text{
        font-weight:300;
        font-size:15px;
    }

    .profile-card-2 .icon-block{
        float:center;
        width:100%;
    }
    .profile-card-2 .icon-block a{
        text-decoration:none;
    }
    .glass_icon i {
        display: inline-block;
        font-size: 16px;
        color: #fff;
        background-color: #ff8026;
        text-align: center;
        border: 1px solid #ff8026;
        width: 30px;
        height: 30px;
        line-height: 30px;
        border-radius: 50%;
        margin:0 5px;
    }
    .card-body{
        padding: 10px 5px;
    }
    .col-md-9.card-footer-left{
        display: flex;
    }
    .card_para{
        margin: 5px 5px;
        color: gray;
    }
    .count_point{
        margin: 0px 3px;
        border: 2px solid #ff80268c;
        border-radius: 70%;
        padding: 3px;
        height: 30px;
        width: 30px;
    }
    .open-option{
        margin: 3px 0px 0px 5px;
        color: #ff8026;
    }
    .card-btn{
        background-color: #ff8026;
        border: 0px;
    }
    .show-btn-row{
        text-align: center;
    }
    button.btn.btn-danger.card-btn {
        padding: 1px 8px;
        font-size: 12px;
    }
    hr{
        margin-top: 0px;
    }
    .show-btn-row p{
        color: gray;
    }
    .on-img-data{
        position: relative;
        top: -45px;
        color: #fff;
        left: 7px;
    }
    .badge-light{
        position: absolute;
        top: -160px;
        left: 10px;
        padding: 8px 30px;
        background-color: #fff;border: 3px solid #e4e4e491;
        box-shadow: 0px 0px 14px 5px #bbbbbb;
    }
    .mysrchloc{
        padding: 0 30px;
    }
</style>

@section('content')
<section class="direc-hire" style="padding-top: 75px;">
    @include('includes.search_location_sidebar')
    <div class="direc-right" style="padding:0">
        <div id="newfileeee">
            <div class="srch-lction-wrap">
                <div class="search-result-location">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="distance-block" style="display:none">
                            <?php
                            $ZipCode = $Country = "";
                            $miles_arr = array('1'=>'1 Mile','3'=>'3 Miles','5'=>'5 Miles','10'=>'10 Miles','15'=>'15 Miles','20'=>'20 Miles');
                            ?>
                            <select name="distance" id="milesnew">
                                <option value="0">max.zoom out</option>
                                <option value="1">4.000 km</option>
                                <option value="2">2.000 km (world)</option>
                                <option value="3">1.000 km</option>
                                <option value="4">400 km (continent)</option>
                                <option value="5">200 km</option>
                                <option value="6">100 km (country)</option>
                                <option value="7">50 km</option>
                                <option value="8">30 km</option>
                                <option value="9">15 km (area)</option>
                                <option value="10">8 km</option>
                                <option value="11">4 km</option>
                                <option value="12">2 km (city)</option>
                                <option value="13">1 km</option>
                                <option value="14" selected="selected">400 m (district)</option>
                                <option value="15">200 m</option>
                                <option value="16">100 m</option>
                                <option value="17">50 m (street)</option>
                                <option value="18">20 m</option>
                                <option value="19">10 m</option>
                                <option value="20">5 m (house)</option>
                                <option value="21">2.5 m</option>
                                <option value="">Distance</option>
                                <?php /*foreach($miles_arr as $key=>$value) { ?>
                                <option value="<?= $key; ?>"><?php echo $value; ?></option>
                                <?php }*/ ?>
                            </select>

                            <select name="instantbook" id="instantbook" style="display:none">
                                <option value="">Instant Book</option>
                                <option>Instant Hire</option>
                                <option>Other</option>
                            </select>

                            <div class="mapsb">Show Maps
                                <label class="switch" for="maps">
                                    <input type="checkbox" name="maps" id="maps" checked>
                                    <span class="slider round"></span>
                                </label>
                            </div>
                            <div class="barsb"><img src="{{ url('public/img/bars1.svg') }}"><img src="{{ url('public/img/bars2.svg') }}"></div>
                        </div>
                            <div class="col-md-8 mysrchloc">
                                @if(count($resultnew) != 0)
                                @foreach($resultnew as $value)
                                @if(($loop->iteration % 2) !=  0)
                                <div class="row">
                                    @endif
                                    <div class="col-md-6 offset-md-2">
                                        <br/>
                                        <div class="card profile-card-2">
                                            <div class="card-img-block">
                                                @if($value['type'] == 'claimed')
                                                @if(count($value['company_images'])!= 0)
                                                <img class="img-fluid" src="<?php echo Config::get('constants.USER_IMAGE_THUMB') . $value['company_images'][0]; ?>" alt="Card image cap">
                                                @else
                                                <img class="img-fluid" src="{{url('/public/images/')}}/claim-bg.jpeg" alt="Card image cap">
                                                @endif
                                                @else
                                                <img class="img-fluid" src="<?php echo Config::get('constants.FRONT_IMAGE'); ?>business_large_square.png" alt="Card image cap">
                                                @endif
                                            </div>
                                            <div class="card-body">
                                                @if($value['type'] == 'claimed' && $value['max_price'] != $value['min_price'])
                                                <span class="badge badge-pill badge-light">${{$value['min_price']}} - ${{$value['max_price']}}</span>
                                                @endif
                                                @if($value['type'] == 'claimed' && $value['max_price'] == $value['min_price'])
                                                <span class="badge badge-pill badge-light">${{$value['max_price']}}</span>
                                                @endif
                                                <div class="row on-img-data">
                                                    <div class="col-md-5">
                                                        <button class="btn btn-danger card-btn" style="cursor:default;">3.7</button>
                                                    </div>
                                                    <div class="col-md-4 offset-md-3">
                                                        <p><i class="fa fa-heart-o" aria-hidden="true"></i> Save</p>
                                                    </div>
                                                </div>
                                                @if($value['type'] == 'claimed')
                                                <img  src="<?php echo Config::get('constants.USER_IMAGE_THUMB') . $value['logo']; ?>" alt="profile-image" class="profile"/>
                                                <div class="row">
                                                    <div class="col-sm-9" style="margin-left: 45px;">
                                                        @if(Auth::check() && Auth::user()->id == $value['user_id'])
                                                        <a href="{{url('/pcompany/view/'.$value['id'])}}">
                                                            @else
                                                            <a href="{{url('/blade-check/'.$value['id'])}}">
                                                                @endif 
                                                                <h5 class="card-title card-claimed-businessnew" myposition="{{($loop->iteration -1 )}}" company_id="{{$value['id']}}" business_name="{{$value['business_name']}}" logo="{{$value['logo']}}" latitude="{{$value['latitude']}}"  longitude="{{$value['longitude']}}"> {{$loop->iteration}}.  {{$value['business_name']}}</a> <br><span>{{$value['short_description']}}</span></h5>
                                                    </div>
                                                    <div class="col-sm-3 text-right" style="margin-top: -138px;float: right;margin-right: 14px;"><p class="open-option">Claimed</p></div>
                                                </div>
                                                @else
                                                <img  src="<?php echo Config::get('constants.FRONT_IMAGE'); ?>user.png" alt="profile-image" class="profile"/>
                                                <div class="row">
                                                    <div class="col-sm-9" style="margin-left: 45px;">
                                                        <a href="{{url('/get-business-detail/'.$value['id'])}}"><h5 class="card-title"> {{$value['business_name']}} <br><span></span></h5></a>
                                                    </div>
                                                    <div class="col-sm-3 text-right" style="margin-top: -124px;float: right;margin-right: 14px;"><p class="open-option">Unclaimed</p></div>
                                                </div>
                                                @endif
                                                <div class="row show-btn-row">
                                                    <div class="col-md-6">
                                                        @if($value['type'] == 'claimed')
                                                        <p><i class="fa fa-map-marker" aria-hidden="true"></i> {{$value['city']}}</p>
                                                        @else
                                                        <p><i class="fa fa-map-marker" aria-hidden="true"></i> {{$value['location']}}</p>
                                                        @endif
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p>
                                                            @if($value['type'] == 'claimed')
                                                            <i class="fa fa-phone" aria-hidden="true"></i> {{$value['contact_number']}}
                                                            @else
                                                            <i class="fa fa-phone" aria-hidden="true"></i> {{$value['phone']}}
                                                            @endif
                                                        </p>             
                                                    </div>
                                                </div>
                                                <hr/>
                                                <div class="row">
                                                    @if($value['type'] == 'claimed')
                                                    <div class="col-md-9 card-footer-left">
                                                        <p class="card_para">{{$value['service_name']}}</p>
                                                    </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @if(($loop->iteration % 2) ==  0 || (($loop->iteration) == count($resultnew)))
                                </div>
                                @endif
                                @endforeach
                                @else
                                <p>No Result Found</p>
                                @endif
                                <div>{!! $resultnew->links() !!}</div>
                            </div>
                            <div class="col-md-2 mysrchmap" style="display:none;position:relative;height:100vh;">
                                <div id="map_canvas" style="position: absolute; top: 0; right: 0; bottom: 0; left: 0;"></div>
                            </div>
                            <div class="col-md-4">
                                <div class="maparea">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d24176.251535935986!2d-73.96828678121815!3d40.76133318281456!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c258c4d85a0d8d%3A0x11f877ff0b8ffe27!2sRoosevelt%20Island!5e0!3m2!1sen!2sin!4v1620041765199!5m2!1sen!2sin" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('layouts.footer')
<script>
$(document).ready(function () {
    var locations = @json($locations);
    console.log(locations)
    var map = ''
    var infowindow = ''
    var marker = ''
    var markers = []
    var circle = ''
    $(".card-claimed-businessnew").mouseenter(function () {
        console.log("enter run")
        markers[parseInt($(this).attr('myposition'))].setMap(null);
        var icon = {
            url: "http://fitnessity.co/public/images/hoverin2.png", // url
            scaledSize: new google.maps.Size(50, 50), // size
            labelOrigin: {x: 25, y: 16}
        };
        marker = new google.maps.Marker({
            position: new google.maps.LatLng($(this).attr('latitude'), $(this).attr('longitude')),
            map: map,
            icon: icon,
            title: ((parseInt($(this).attr('myposition'))) + 1).toString(),
            label: {
                text: ((parseInt($(this).attr('myposition'))) + 1).toString(),
                color: '#222222',
                fontSize: '12px',
                fontWeight: 'bold'
            }
        });

        var img_path = "{{Config::get('constants.USER_IMAGE_THUMB')}}";
        var contents =
                '<div class="card-claimed-business">' +
                '<div class="img-claimed-business">' +
                '<img src=' + img_path + encodeURIComponent($(this).attr('logo')) + ' alt="">' +
                '</div>' +
                '<div class="content-claimed-business">' +
                '<div class="content-claimed-business-inner">' +
                '<div class="content-left-claimed">' +
                '<a href="/pcompany/view/' + $(this).attr('company_id') + '">' + $(this).attr('business_name') + '</a>' +
                '<ul>' +
                '<li class="fill-str"><i class="fa fa-star"></i></li>' +
                '<li class="fill-str"><i class="fa fa-star"></i></li>' +
                '<li class="fill-str"><i class="fa fa-star "></i></li>' +
                '<li><i class="fa fa-star"></i></li>' +
                '<li><i class="fa fa-star"></i></li>' +
                '<li class="count">25</li>' +
                '</ul>' +
                '</div>' +
                '<div class="content-right-claimed"></div>' +
                '</div>' +
                '</div>' +
                '</div>';

        //var infowindow = new google.maps.InfoWindow();

        google.maps.event.addListener(marker, 'mouseover', (function (marker, contents, infowindow) {
            return function () {
                infowindow.setPosition(marker.latLng);
                infowindow.setContent(contents);
                infowindow.open(map, this);
            };
        })(marker, contents, infowindow));

        markers[parseInt($(this).attr('myposition'))] = marker;
        var center = new google.maps.LatLng($(this).attr('latitude'), $(this).attr('longitude'));
        map.panTo(center);
    });

    $(".card-claimed-businessnew").mouseleave(function () {
        console.log("leave run")
        markers[parseInt($(this).attr('myposition'))].setMap(null);
        var icon = {
            url: "http://fitnessity.co/public/images/hoverout2.png", // url
            scaledSize: new google.maps.Size(50, 50), // size
            labelOrigin: {x: 25, y: 16}
        };
        marker = new google.maps.Marker({
            position: new google.maps.LatLng($(this).attr('latitude'), $(this).attr('longitude')),
            map: map,
            icon: icon,
            title: ((parseInt($(this).attr('myposition'))) + 1).toString(),
            label: {
                text: ((parseInt($(this).attr('myposition'))) + 1).toString(),
                color: '#222222',
                fontSize: '12px',
                fontWeight: 'bold'
            }
        });

        var img_path = "{{Config::get('constants.USER_IMAGE_THUMB')}}";
        var contents =
                '<div class="card-claimed-business">' +
                '<div class="img-claimed-business">' +
                '<img src=' + img_path + encodeURIComponent($(this).attr('logo')) + ' alt="">' +
                '</div>' +
                '<div class="content-claimed-business">' +
                '<div class="content-claimed-business-inner">' +
                '<div class="content-left-claimed">' +
                '<a href="/pcompany/view/' + $(this).attr('company_id') + '">' + $(this).attr('business_name') + '</a>' +
                '<ul>' +
                '<li class="fill-str"><i class="fa fa-star"></i></li>' +
                '<li class="fill-str"><i class="fa fa-star"></i></li>' +
                '<li class="fill-str"><i class="fa fa-star "></i></li>' +
                '<li><i class="fa fa-star"></i></li>' +
                '<li><i class="fa fa-star"></i></li>' +
                '<li class="count">25</li>' +
                '</ul>' +
                '</div>' +
                '<div class="content-right-claimed"></div>' +
                '</div>' +
                '</div>' +
                '</div>';
        // var infowindow = new google.maps.InfoWindow();

        google.maps.event.addListener(marker, 'mouseover', (function (marker, contents, infowindow) {
            return function () {
                infowindow.setPosition(marker.latLng);
                infowindow.setContent(contents);
                infowindow.open(map, this);
            };
        })(marker, contents, infowindow));

        markers[parseInt($(this).attr('myposition'))] = marker;
        var center = new google.maps.LatLng($(this).attr('latitude'), $(this).attr('longitude'));
        map.panTo(center);
    });


    $('#map_canvas').empty();
    if (locations.length != 0) {
        map = new google.maps.Map(document.getElementById('map_canvas'), {
            zoom: 13,
            center: new google.maps.LatLng(locations[0][1], locations[0][2]),
            mapTypeId: google.maps.MapTypeId.ROADMAP,
        });
        infowindow = new google.maps.InfoWindow();
        var bounds = new google.maps.LatLngBounds();
        var marker, i;
        var icon = {
            url: "http://fitnessity.co/public/images/hoverout2.png", // url
            scaledSize: new google.maps.Size(50, 50), // size
            labelOrigin: {x: 25, y: 16}
        };
        for (i = 0; i < locations.length; i++) {
            var labelText = i + 1
            marker = new google.maps.Marker({
                // position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                // map: map,
                // icon:icon,
                //  zIndex: .8
                position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                map: map,
                icon: icon,
                title: labelText.toString(),
                label: {
                    text: labelText.toString(),
                    color: '#222222',
                    fontSize: '12px',
                    fontWeight: 'bold'
                }
            });

            console.log(marker.position)
            // bounds.extend(marker.position);
            bounds.extend(marker.position);

            var img_path = "{{Config::get('constants.USER_IMAGE_THUMB')}}";
            var contents =
                    '<div class="card-claimed-business">' +
                    '<div class="img-claimed-business">' +
                    '<img src=' + img_path + encodeURIComponent(locations[i][4]) + ' alt="">' +
                    '</div>' +
                    '<div class="content-claimed-business">' +
                    '<div class="content-claimed-business-inner">' +
                    '<div class="content-left-claimed">' +
                    '<a href="/pcompany/view/' + locations[i][3] + '">' + locations[i][0] + '</a>' +
                    '<ul>' +
                    '<li class="fill-str"><i class="fa fa-star"></i></li>' +
                    '<li class="fill-str"><i class="fa fa-star"></i></li>' +
                    '<li class="fill-str"><i class="fa fa-star "></i></li>' +
                    '<li><i class="fa fa-star"></i></li>' +
                    '<li><i class="fa fa-star"></i></li>' +
                    '<li class="count">25</li>' +
                    '</ul>' +
                    '</div>' +
                    '<div class="content-right-claimed"></div>' +
                    '</div>' +
                    '</div>' +
                    '</div>';

            //var labelText = i+1
            //  var myOptionsnew = {
            //     content: labelText
            //     ,boxStyle: {
            //       textAlign: "center"
            //     ,color: "#000000"
            //     ,fontSize: "9pt",
            //     fontWeight:'bold',
            //     marginTop:'-10.5%',
            //     marginLeft:'-.8%',
            //     zIndex:9999999
            //     }
            //     ,disableAutoPan: true
            //     ,position: new google.maps.LatLng(locations[i][1], locations[i][2])
            //     ,closeBoxURL: ""
            //     ,isHidden: false
            //     ,pane: "mapPane"
            //     ,enableEventPropagation: true
            // };
            // var ibLabel = new InfoBox(myOptionsnew);
            // ibLabel.open(map);

            google.maps.event.addListener(marker, 'mouseover', (function (marker, contents, infowindow) {
                return function () {
                    infowindow.setPosition(marker.latLng);
                    infowindow.setContent(contents);
                    infowindow.open(map, this);
                    // ibLabel.setPosition(marker.latLng);
                    // ibLabel.setContent(contents);
                    // ibLabel.open(map,this);
                };
            })(marker, contents, infowindow));
            markers.push(marker);
        }

        // map.setCenter(bounds.getCenter());
        map.fitBounds(bounds);
        // map.setZoom(map.getZoom()-1); 
        map.panToBounds(bounds);
        $('.mysrchmap').show()
    } else {
        map = new google.maps.Map(document.getElementById('map_canvas'), {
            zoom: 13,
            center: new google.maps.LatLng(40.6976701, -74.2598688),
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });
        $('.mysrchmap').show()
    }
})
</script>
@endsection
<style>
    .mysrchmap{
        position: sticky !important;
        top: 0;
    }
    div#map_canvas{
        width: 200% !important;
    }
    .direc-right ul li{
        padding: 0 !important;
        margin: 30% 5px !important;
        width: auto !important;
    }
    .card-claimed-business .content-left-claimed {
        width: 100% !important;
    }
    .card-claimed-business .content-left-claimed ul{display: inline-flex !important;}
    /*@media (min-width: 992px){*/
    /*    .col-md-8.mysrchloc{*/
    /*        width: 77% !important;*/
    /*    }*/
    /*    .col-md-4.mysrchmap{*/
    /*        width: 20% !important;*/
    /*    }*/
    /*}*/
</style>