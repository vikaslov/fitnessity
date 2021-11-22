<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
    body{
      font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,"Noto Sans",sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
    }
    .container{
      text-align: center;
    }
    header > p{
      font-size: 12px;
      line-height: 10px;
    }
    footer > p{
      color: gray;
    }
    footer > p > span > a {
    color: gray;
  }
h2{
      font-weight: 400;
      font-size: 32px;
      margin-top: -34px;
    }
    .mini_ninja_para{
      color: #f53b49;
    }
    button{
      background-color: #f53b49;
      color: #fff;
      border: 0px;
      border-radius: 3px;
      padding: 10px 38px;
    }
    hr{
      width: 10%;
    }
    .fa {
  padding: 9px;
  font-size: 11px;
  width: 9px;
  height: 9px;
  text-align: center;
  text-decoration: none;
  margin: 5px 2px;
  border-radius: 50%;
}

.fa:hover {
    opacity: 0.7;
}

.fa-facebook {
  background: #3B5998;
  color: white;
}

.fa-twitter {
  background: #55ACEE;
  color: white;
}

.fa-google {
  background: #dd4b39;
  color: white;
}

.fa-linkedin {
  background: #007bb5;
  color: white;
}
</style>
</head>
<body>



 <div class="container">
    <img src="https://fitnessity.raursoft.org/public/images/maillogo.jpg" alt="logo" width="30%">
    <h2>YOU HAVE A BOOKING</h2>
    <p> Hello {!! $BookingDetail['businessuser']['firstname'] !!} {!! $BookingDetail['businessuser']['lastname'] !!} !!!</p>
         <h2 style="text-align: center;color: #f53b49;"><b>Lesson Details</b></h2>   
         <p>Great! you have just confirmed a booking with {!! $BookingDetail['user']['firstname'] !!}.
          We are sending your confirmation of booking request to {!! $BookingDetail['user']['firstname'] !!} to except payment </p>
            @if($BookingDetail['booking_type'] == "direct")
     <?php  $details = json_decode($BookingDetail['user_booking_detail']['booking_detail'],true); ?>
         <p>Sport : <b>{{ @$sportsList[$BookingDetail['user_booking_detail']['sport']] }}</b></p>
          
         <p> Activity type  =<b> {{ @$details['activitytype'] }}</b></p>
         <p> Number of Persons =<b> {{ @$details['numberofpersons'] }}</b></p>
         <p> Activity location =<b> {{ @$details['activitylocation'] }}</b></p>
         <p> Who is Training =<b> @foreach($details['whoistraining'] as $key=> $value) <span>{{$value}}</span>@if($key+1 != count($details['whoistraining'])) <span>, </span>@endif @endforeach </b></p>
         @else

      <p> {{ @$sportsList[$BookingDetail['user_booking_detail']['sport']] }} </p>

      
      <p>Zipcode : <b>{{ $BookingDetail['user_booking_detail']['zipcode'] }}</p>

    @endif
    
    <a  href="{!! url('/viewBoking/'.$BookingDetail['id']) !!}">MANAGE BOOKINGS</a>
    <a href="{!! url('/mybooking') !!}">Click Here</a> to see all your bookings after login.
    <a href="{!! url('/') !!}" class="send_quote_btn">Login</button>
    <br><br>
    <div class="social_media_icons">
      <a href="#" class="fa fa-facebook"></a>
      <a href="#" class="fa fa-twitter"></a>
      <a href="#" class="fa fa-linkedin"></a>
      <a href="#" class="fa fa-google"></a>
    </div>
    <br>
    <img src="https://img.favpng.com/0/16/19/app-store-apple-download-itunes-ios-png-favpng-NbmJLefs27bT5Y4fYjePbjJ4g.jpg" alt="app_store_img" width="10%">
    <p>@2019 FITNESSITY, INC.</p>
    <p>Reference site about Lorem Ipsum, giving.</p>
    <footer>
      <p>What is Lorem Ipsum Lorem Ipsum is simply dummy text of <br> the printing and typesetting industry Lorem Ipsum has<br> been the industrys.</p>
      <p><span><a href="#">Privacy Policy</a></span> | <span><a href="#">Terms Of Service</a></span></p>
    </footer>
  </div>
</body>
</html>
