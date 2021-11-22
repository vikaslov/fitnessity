<!--<script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyC45-kgXDIY_O8SZxc5d7YLdQYqSkcts7I&sensor=false"></script>-->



<!-- <script src="https://maps.googleapis.com/maps/api/place/autocomplete/json?input=Vict&types=(cities)&key=AIzaSyBiY1c85uJoEIVd7XAwvcJNz0sLBtINssI"></script> -->

<style>

    #suggestions {

    -moz-box-sizing: border-box;

    box-sizing: border-box;

    border: 0px solid black;

   

    background-color: white;

    font-size: 12px;

}

.option{

    display:none;

    color:'#000';

    cursor:pointer;

    padding:10px;

}



.slider-block{

    background: none;

    color: #000;

}

.slider-block p{font-weight: 400;}

.topmain-slider .flexslider .slides img {

    opacity: .4;

    height: 110vh;

}

.slider-block i.fa.fa-map-marker{

    font-size: 35px;

    color: #f53b49;

    position: absolute;

    z-index: 99999999;

    top: 35px;

    left: 64%;

}

.slider-block h5{

    position: relative;

    top: 80px;

    margin-bottom: 20px;

    right: 335px;

    font-size: 28px;

    font-weight: 300;

}

.slider-block .catagories_btn{

    position: relative;

    top: 80px;

    right: 318px;

}

.row.cstm-bnner ul{

    display: flex;

    position: relative;

    left: 55px;

    top: 30px;

}

input.search_input_banner {

    border-top-left-radius: 30px;

    border-bottom-left-radius: 30px;

    border-right: 1px solid #c7c7c7;

}

input#zipcode{

    border-top-right-radius: 30px;

    border-bottom-right-radius: 30px;

    border-left: 1px solid #c7c7c7;

}

.row.cstm-bnner li {

    margin: 0;

    width: 33.33%;

}

.slider-block button{

    border-radius: 50px;

    padding: 6px 13px;

    font-size: 13px;

}

.slider-block li button{

    padding: 6px 20px;

    font-size: 15px;

}

.cstm-bnner ul li:last-child{

    position: relative;

    right: 104px;

    top: 5.2px;

}

</style>

<section class="main-slider topmain-slider">



    <div class="flexslider" id="home_page_banners">



        <ul class="slides">



            <li>



                <img src="<?php echo Config::get('constants.FRONT_IMAGE'); ?>homepage-bnr.jpg" />



            </li>            <!--  <li>



                <img src="<?php echo Config::get('constants.FRONT_IMAGE'); ?>banner2.png" />



            </li>



            <li>



                <img src="<?php echo Config::get('constants.FRONT_IMAGE'); ?>banner3.jpg" />



            </li>



            <li>



                <img src="<?php echo Config::get('constants.FRONT_IMAGE'); ?>banner4.png" />



            </li>  -->



        </ul>



    </div>



    <div class="slider-block">



        <h1 style="word-spacing: 10px";>FIND SPORTS, WELLNESS & ADVENTUROUS ACTIVITIES<br/>



        </h1>



        <p style="font-size: 20px">Get connected with trainers to coaches, classes to therapists, adventures to tours.

Participate in activities at local business locations, online, or while traveling.</p>



        <form id="searchform" method="get" action="/search-result-location">

<!--<input type="hidden" name="_token" value="{{ csrf_token() }}">-->

<div class="row cstm-bnner">

    <div class="col-sm-12">

            <i class="fa fa-map-marker" aria-hidden="true"></i>

            <ul><li>

            <input autocomplete="off" type="text" name="label" id="activity_label" placeholder="Search by activity or business" value="@if(isset($selected_label) && $selected_label != NULL){{$selected_label }}@endif"  class="search_input_banner" />

            <div id="suggesstion-box-search-activity"></div>

            <!--<input id="pac-input" type="text" placeholder="Search by Location" value="@if(isset($selected_location) && $selected_location != NULL){{$selected_location }}@endif"/>-->

            </li>

            <li>

            <div id="suggestions">

                <input autocomplete="off" id="pac-input1" name="location" type="text" placeholder="Location" value="@if(isset($selected_location) && $selected_location != NULL){{$selected_location }}@endif"/>

                

                <!--<div id="option-box">-->

                    

                <!--</div>-->

            </div>

             <div id="suggesstion-box-search-location"></div>

            </li>

            

            <!--<input type="hidden" name="location" id="location" value="@if(isset($selected_location) && $selected_location != NULL){{$selected_location }}@endif">-->

            <script>

            google.maps.event.addDomListener(window, 'load', initialize);

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

            <li>

            <input type="text" autocomplete="off" placeholder="Search by Zip Code" name="zipcode" id="zipcode" value="@if(isset($selected_zipcode) && $selected_zipcode != NULL){{$selected_zipcode }}@endif"/>

           	<div id="suggesstion-box-search-zipcode"></div>

           </li>

           <li>

            <button type="submit">SEARCH</button>

            </li>

            </ul>

            </div>

</div>

        </form>

<h5>or browse featured catagories:</h5>

<div class="catagories_btn">

                  <a href="/search-result-location?activity-type=online"  class="btn btn-web-btn">ONLINE ACTIVITIES</a>

                  <a href="/search-result-location?activity-type=classes" class="btn btn-web-btn">IN-PERSON ACTIVITIES</a>

                  <a href="/search-result-location?activity-type=kids" class="btn btn-web-btn">KIDS ACTIVITIES</a>

                  <a href="/search-result-location?activity-type=fitness" class="btn btn-web-btn">FITNESS & WELLNESS</a>

                  <a href="/search-result-location?activity-type=active" class="btn btn-web-btn">ACTIVE EXPERIENCES</a>

               </div>

               <br><br><br>

    </div>

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

					$(document).on('click', '.searchclickactivity', function(){

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



    <!-- <div class="how-it-works"> -->



       <!-- <a href="#" class="slvj-link-lightbox 1" data-videoid="r0BXJYQ9JRs" data-videosite="youtube">



        <img src="<?php //echo Config::get('constants.FRONT_IMAGE'); ?>video.png" height="74" width="74"/>



        <span> How it works</span>



        </a> -->



    <!-- </div> -->

    <div class="banner-bottom banner-bottoncstm" style="background-color: #000;">



        <?php

        use Illuminate\Support\Facades\Route;

        $currentPath = Route::getFacadeRoot()->current()->uri();

        ?>



        @if($currentPath == "direct-hire")



            <h1 style="font-size: 32px;word-spacing: 5px">FIND ACTIVITIES <span>FOR KIDS, TEENS, AND ADULTS</span> OF ALL AGES</h1>

            <!--<h1 style="font-size: 32px;word-spacing: 5px">A MULTI-SPORTS & WELLNESS, BOOKING, SCHEDULING, ONLINE PAYMENTS AND NETWORKING PLATFORM</h1>-->

            <!--<p>Local Services In Your Area That Focus On: <span class="banner-bottom-span">SPORTS NAME</span> </p>-->



        @else



            <h1 style="font-size: 32px;word-spacing: 5px">FIND ACTIVITIES <span>FOR KIDS, TEENS, AND ADULTS</span> OF ALL AGES</h1>

            <!--<p>Local Services In Your Area That Focus On: <span class="banner-bottom-span">SPORTS NAME</span> </p>-->



            <!-- <h1>A more convenient way to</h1> -->



            <!-- <p>Fitnessity Makes It Convenient To Find and Book A Personal Trainers</p> -->



        @endif



    </div>

    

    <script>

         function setValueInput(setValueInput1,valueid,type)

            {

                

                if(type == 'unclaimed'){

                     if("{{Auth::check()}}"){

                     document.getElementById('pac-input1').value=setValueInput1

                     window.location.href='/get-business-detail/'+valueid

                     }

                     else{

                          console.log("1")  

                        localStorage.setItem('custom_url', '/get-business-detail/'+valueid);

                        

                        document.getElementById('login_modal').modal();

                        return;

                    }

                }

                else{

                    if("{{Auth::check()}}"){

                        window.location.href='/pcompany/view/'+valueid;

                    }

                    else{

                        localStorage.setItem('custom_url', '/pcompany/view/'+valueid);

                        document.getElementById('login_modal').modal();

                        return;

                    }

                }

            }

    </script>

    <script>

        $(document).ready(function(){

           $.fn.myfunction = function(locations) {

               console.log(locations)

            $('#map_canvas').empty();

            

            var map = new google.maps.Map(document.getElementById('map_canvas'), {

                zoom: 13,

                center: new google.maps.LatLng(locations[0][1], locations[0][2]),

                mapTypeId: google.maps.MapTypeId.ROADMAP

            });

            var infowindow = new google.maps.InfoWindow();

            var marker, i;

            for (i = 0; i < locations.length; i++) {

                marker = new google.maps.Marker({

                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),

                    map: map

                });

                google.maps.event.addListener(marker, 'click', (function (marker, i) {

                    return function () {

                        infowindow.setContent(locations[i][0]);

                        infowindow.open(map, marker);

                    }

                })(marker, i));

            }   

               

               

               

            //   var zoom = 8;

            // $('#map_canvas').empty();

            // var map = new google.maps.Map(document.getElementById("map_canvas"), {

            //     zoom: zoom,

            //     center: new google.maps.LatLng(lat, long),

            //     mapTypeId: google.maps.MapTypeId.ROADMAP

            // });

      

            // var circle = new google.maps.Circle({

            //     center: new google.maps.LatLng(lat, long),

            //     radius: 2 * 1609.344,

            //     fillColor: "#ff69b4",

            //     fillOpacity: 0.5,

            //     strokeOpacity: 0.0,

            //     strokeWeight: 0,

            //     map:  

            // });

           }; 

  

  //});

            console.log('fffffffgghhhh')

            $("document").on("click","#makeloginpopup",function(){

                console.log("gggggg")

                $("#loginbtn").click();

            })

            

            $('#pac-input2').keyup(function(){

                $.ajax({

                      url:'/get-my-location/'+$('#pac-input1').val(),

                      type:'GET',

                      beforeSend: function () {

                        $('.loader').show();

                        //showSystemMessages('#systemMessage', 'info', 'Please wait while we create a company with Fitnessity.');

                      },

                      complete: function () {

                     // $('.loader').hide();ccccccc

                       // $('.s_form').prop('disabled', false);

                      },

                      success: function (response) {

                          $('.loader').hide();

                          showSystemMessages('#systemMessage', response.type, response.msg);

                          if(response.status == 200){

                              var str = '';

                              var check = "{{Auth::check()}}";

                              if(check == false){

                                  str = str + '<div class="option" style="padding-left:10px;"><div class="col-sm-12 text-left"><span>My Business isn\'t here</span> <a  type="button" data-toggle="modal" data-target="#login_modal" href="/auth/jsModallogin" id="makeloginpopup">Add New</button></div></div><br/>';

                              }

                              

                           if(response.search_data2.length != 0 )

                              {

                                 var locations = [];

                                  response.search_data2.forEach(function(value,key){

                                      str = str +

                                        '<div class="card-claimed-business" onclick="setValueInput(\''+value.business_name +' '+ value.location+'\','+value.id+',\'claimed\');">'+

                                        '<div class="img-claimed-business">'+

                                            '<img src="<?php echo Config::get('constants.USER_IMAGE_THUMB'); ?>'+value.logo+'" alt="">'+

                                        '</div>'+

                                        '<div class="content-claimed-business">'+

                                            '<div class="content-claimed-business-inner">'+

                                                '<div class="content-left-claimed">'+

                                                    '<a href="#">'+value.business_name +'</a>'+

                                                    '<ul>'+

                                                        '<li class="fill-str"><i class="fa fa-star"></i></li>'+

                                                        '<li class="fill-str"><i class="fa fa-star"></i></li>'+

                                                        '<li class="fill-str"><i class="fa fa-star "></i></li>'+

                                                        '<li><i class="fa fa-star"></i></li>'+

                                                        '<li><i class="fa fa-star"></i></li>'+

                                                        '<li class="count">25</li>'+

                                                    '</ul>'+

                                                    '<p class="business-dtl">Trainers</p>'+

                                                '</div>'+

                                                '<div class="content-right-claimed">'+

                                                    '<p>'+value.contact_number +'</p>'+

                                                    '<p>'+value.city+'</p>'+

                                                '</div>'+

                                            '</div>'+

                                            '<p>'+value.about_company+'</p>'+

                                        '</div>'+

                                    '</div>';

                                    locations.push([value.business_name,value.latitude,value.longitude])

                                        if(key+1 ==  response.search_data2.length){

                                            response.search_data.forEach(function(value,key){

                                             str = str + '<div onclick="setValueInput(\''+value.business_name +' '+ value.location+'\','+value.id+',\'unclaimed\');" class="card-claimed-business">'+

                                            '<div class="img-claimed-business">'+

                                                '<img src="<?php echo Config::get('constants.FRONT_IMAGE'); ?>business_large_square.png" alt="">'+

                                            '</div>'+

                                            '<div class="content-claimed-business">'+

                                                '<div class="content-claimed-business-inner">'+

                                                    '<div class="content-left-claimed">'+

                                                        '<a href="#">'+value.business_name+'</a>'+

                                                        '<p class="business-dtl">'+value.activity+'</p>'+

                                                    '</div>'+

                                                    '<div class="content-right-claimed">'+

                                                        '<p>'+value.phone+'</p>'+

                                                        '<p>'+value.location+'</p>'+

                                                    '</div>'+

                                                '</div>'+

                                            '</div>'+

                                        '</div>'

                                        if(key+1 ==  response.search_data.length){

                                            $.fn.myfunction(locations)

                                            $('.mysrchmap').show()

                                            $('.mysrchloc').empty();

                                            $('.mysrchloc').append(str);

                                        }

                                    })



                                        }

                                  })

                              }

                              else{

                                    response.search_data.forEach(function(value,key){

                                             str = str + '<div onclick="setValueInput(\''+value.business_name +' '+ value.location+'\','+value.id+',\'unclaimed\');" class="card-claimed-business">'+

                                            '<div class="img-claimed-business">'+

                                                '<img src="<?php echo Config::get('constants.FRONT_IMAGE'); ?>business_large_square.png" alt="">'+

                                            '</div>'+

                                            '<div class="content-claimed-business">'+

                                                '<div class="content-claimed-business-inner">'+

                                                    '<div class="content-left-claimed">'+

                                                        '<a href="#">'+value.business_name+'</a>'+

                                                        '<p class="business-dtl">'+value.activity+'</p>'+

                                                    '</div>'+

                                                    '<div class="content-right-claimed">'+

                                                        '<p>'+value.phone+'</p>'+

                                                        '<p>'+value.location+'</p>'+

                                                    '</div>'+

                                                '</div>'+

                                            '</div>'+

                                        '</div>'

                                        if(key+1 ==  response.search_data.length){

                                            //$.fn.myfunction(locations)

                                            //$('.mysrchmap').show()

                                            $('.mysrchloc').empty();

                                            $('.mysrchloc').append(str);

                                        }

                                    })

                              }

                              

                              

                            //   response.search_data.forEach(function(value,key){

                            //       str=str+'<div class="option" style="padding-left:10px;" onclick="setValueInput(\''+value.business_name +' '+ value.location+'\','+value.id+');"><div class="col-sm-12 text-left"><i class="fa fa-building" style="color:red; aria-hidden="true"></i>&nbsp;'+value.business_name+'&nbsp;'+value.location+'</div></div>';

                            //       if(key+1 ==  response.search_data.length){

                                      

                            //           $('#option-box').empty();

                            //           $('#option-box').append(str);

                            //           $('.option').show()

                            //       }

                            //   })

                           }

                        }

            });

                

                

               // console.log("aaaaa")

               // $('.option').show()

            })

        })

    </script>

</section>

<div class="srch-lction-wrap">

    	<div class="search-result-location" style="display:none;">

    	    <div class="container">

    		<div class="row">

    			<div class="col-md-8 mysrchloc">

    				<!--<div class="card-claimed-business">-->

    				<!--	<div class="img-claimed-business">-->

    				<!--		<img src="<?php //echo Config::get('constants.FRONT_IMAGE'); ?>300s.jpg" alt="">-->

    				<!--	</div>-->

    				<!--	<div class="content-claimed-business">-->

    				<!--		<div class="content-claimed-business-inner">-->

	    			<!--			<div class="content-left-claimed">-->

	    			<!--				<a href="#">Yoga Flow SF - Union St</a>-->

	    			<!--				<ul>-->

	    			<!--					<li class="fill-str"><i class="fa fa-star"></i></li>-->

	    			<!--					<li class="fill-str"><i class="fa fa-star"></i></li>-->

	    			<!--					<li class="fill-str"><i class="fa fa-star "></i></li>-->

	    			<!--					<li><i class="fa fa-star"></i></li>-->

	    			<!--					<li><i class="fa fa-star"></i></li>-->

	    			<!--					<li class="count">25</li>-->

	    			<!--				</ul>-->

	    			<!--				<p class="business-dtl">Trainers</p>-->

	    			<!--			</div>-->

	    			<!--			<div class="content-right-claimed">-->

	    			<!--				<p>(628) 900-9804</p>-->

	    			<!--				<p>1892 Union St <br/>Marina/Cow Hollow</p>-->

	    			<!--			</div>-->

    				<!--		</div>-->

    				<!--		<p>Sebastian redefines what an awesome trainer is. He is insanely knowledgeable, keeps up to date on research so you know he's looking out for your long-term health, designs workouts…<a href="#">More</a></p>-->

    				<!--	</div>-->

    				<!--</div>-->

    				<!--<div class="card-claimed-business">-->

    				<!--	<div class="img-claimed-business">-->

    				<!--		<img src="<?php //echo Config::get('constants.FRONT_IMAGE'); ?>business_large_square.png" alt="">-->

    				<!--	</div>-->

    				<!--	<div class="content-claimed-business">-->

    				<!--		<div class="content-claimed-business-inner">-->

	    			<!--			<div class="content-left-claimed">-->

	    			<!--				<a href="#">Yoga Flow SF - Union St</a>-->

	    			<!--				<p class="business-dtl">Trainers</p>-->

	    			<!--			</div>-->

	    			<!--			<div class="content-right-claimed">-->

	    			<!--				<p>(628) 900-9804</p>-->

	    			<!--				<p>1892 Union St <br/>Marina/Cow Hollow</p>-->

	    			<!--			</div>-->

    				<!--		</div>-->

    				<!--	</div>-->

    				<!--</div>-->

    			</div>

    			<div class="col-md-4 mysrchmap" style="display:none">

    			   

    			     <div id="map_canvas" style="height:400px;width:100%"></div>

    			</div>

    			<!--<div class="col-md-4"><iframe aria-hidden="true" frameborder="0" tabindex="-1" style="z-index: -1; position: absolute; width: 100%; height: 100%; top: 0px; left: 0px; border: none;"></iframe></div>-->

    		</div>

    	</div>

    	</div>

    </div>