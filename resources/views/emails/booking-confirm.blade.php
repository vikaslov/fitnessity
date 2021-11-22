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
     <p>Greetings from Fitnessity!! </p>
    <h2>Your booking request is confirmed by professional.</h2>
    <p>	Hello {!! $BookingDetail['user']['firstname'] !!} {!! $BookingDetail['user']['lastname'] !!} !!!</p>
  	@if($BookingDetail['booking_type'] == "direct")
      <h1><b style="color:red">Lesson Detail</b></h1>
      <p><a href="#"> {{ @$sportsList[$BookingDetail['user_booking_detail']['sport']] }} </a> </p>
      <?php  $details = json_decode($BookingDetail['user_booking_detail']['booking_detail'],true); ?>
      <p>Activity type  = {{ @$details['activitytype'] }}</p>
      <p>Number of Persons = {{ @$details['numberofpersons'] }}</p>
      <p>Activity location = {{ @$details['activitylocation'] }}</p>
      <p>Who is Training = @foreach($details['whoistraining'] as $key=> $value) <span>{{$value}}</span>@if($key+1 != count($details['whoistraining'])) <span>, </span>@endif @endforeach </p>


      <h1><b style="color:red">Trainer Detail</b></h1>
      <p>
      <a href="{!! url('/') !!}">{{ $BookingDetail['businessuser']['firstname'] }} {{ $BookingDetail['businessuser']['lastname'] }}</a> has confirmed this booking request.
      </p>

    @else

    <h1><b style="color:red">Lesson Detail</b></h1>
      <a href="#"> {{ @$sportsList[$BookingDetail['user_booking_detail']['sport']] }} </a> <br>

      Zipcode: {{ $BookingDetail['user_booking_detail']['zipcode'] }}<br>

      @if(count($BookingDetail['jobpostquestions']) > 0)

        <?php $Jobpostquestions = $BookingDetail['jobpostquestions']; $i=0;?>

        @foreach($Jobpostquestions as $question)

          @if(@question['question_id'] == 'qoutes')

              Quotes you requested are: 

          @elseif(@question['question_id'] == 'train_wants')

              Training request for: 

          @endif

          {{ $question['answer'] }}

          <?php $i++; ?>

          @if($i == 1) break; @endif

        @endforeach

      @endif


    @endif
    <p><a href="{!! url('/viewBoking/'.$BookingDetail['id']) !!}">Click here</a> to know more about this request after <a href="{!! url('/') !!}">login</a> to Fitnessity.</p>

	<p><a href="{!! url('/mypostedjobs') !!}">Click here</a> to see all your bookings after login.</p>
    
    <img src="https://img.favpng.com/0/16/19/app-store-apple-download-itunes-ios-png-favpng-NbmJLefs27bT5Y4fYjePbjJ4g.jpg" alt="app_store_img" width="10%">
    <p>@2019 FITNESSITY, INC.</p>
    <p>Reference site about Lorem Ipsum, giving.</p>
    <footer>
     
      <p><span><a href="#">Privacy Policy</a></span> | <span><a href="#">Terms Of Service</a></span></p>
    </footer>
  </div>
</body>
</html>