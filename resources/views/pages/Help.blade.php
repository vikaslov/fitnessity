@extends('layouts.app')

<style>
  .latest-know-list i {
    margin-right: 0px !important;
}
  .latest-know-list li {
    text-overflow: ellipsis !important;
  white-space: nowrap !important;
  overflow: hidden !important;
    float: left;
    width: 100%;
    font-size: 17px !important;
    color: #777;
    padding-bottom: 7px !important;
}

  .para_content {
    font-size: 12px;
    font-weight: 400;
    line-height: 16px;
    margin-top: -14px;
}
.footer-logo>p {
    padding: 15px 10px;
    display: block !important;
}
  p{
    display: none !important;
  }
.latest-knowledge {
    padding: 0 4px !important;
}
.latest-know-list h4 {
    font-size: 23px !important;}
.help-desk input {

    color: black;

}

.help-desk input {

    width: 70%;}



.ellipsis *{

    line-height: 1.5em;

    height: 3em;

    overflow: hidden;

    white-space: nowrap;

    text-overflow: ellipsis;

    width: 100%;

}

</style>

@push('header_script')

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

@endpush

@section('content')

<div class="help-desk">



          <div class="container">



              <h1>WELCOME &nbsp; &nbsp; TO &nbsp; &nbsp; HELP DESK</h1>



            <h6 style="font-size: 18px;padding: 25px 0 53px;">If you have any questions, you can find results faster with the help desk.</h6>



            <form>



            <input type="text" name="" id="help" list="qa" placeholder="How can we help you?" />

            <datalist id="qa"> </datalist>

            <button type="button" id="getan">REQUEST SUPPORT</button>



            <h6 style="float: left;padding: 10px 20px;font-size: 16px;">Trending searches: Getting started</h6>

  <div id="qaget" style="display:none">

            

            </div>

            </form>

          

            </div>

        </div>



            <div class="contact-con">



              <div class="container">



                  <div class="cont-three-block">



                      <div class="cont-one">



                          <div class="contact-three-box">



                              <span><i class="fa fa-lightbulb-o" aria-hidden="true"></i></span>



                            <h4>KNOWLEDGE BASE</h4>



                            <h6 style="font-size: 16px;color: #777;font-weight: 200;padding: 0 30px;">The fastest way to get support is finding the answer through Knowledge Base system.</h6>



                            </div>

                     </div>



                        <div class="cont-one">



                          <div class="contact-three-box">



                              <span><i class="fa fa-comment-o" aria-hidden="true"></i></span>



                            <h4>SUPPORT FORUM</h4>



                            <h6 style="font-size: 16px;color: #777;font-weight: 200;padding: 0 30px;">You can also easy to find out the answer over existing topics on the support forum.</h6>



                            </div>

                        </div>

                        <div class="cont-one">



                          <div class="contact-three-box">



                              <span><i class="fa fa-bullhorn" aria-hidden="true"></i></span>



                            <h4>NEWS 24X7</h4>



                            <h6 style="font-size: 16px;color: #777;font-weight: 200;padding: 0 30px;">Latest news are presented here in the news section area.</h6>



                            </div>

                        </div>

                        

                </div>

                 @foreach($lists as $list)

                <div class="col-md-4">

                    <div class="latest-recent">

                   

                    <div class="latest-knowledge" style="width:100%">



                      <div class="latest-know-list">



                          <h4>{{$list['name']}}</h4>

                          @foreach($list['questions'] as $question)

                            <li>

                              <i class="fa fa-file-text-o" aria-hidden="true"></i>



                              <a href="{{url('help-dask/'.$question['id'])}}">{{$question['qustion']}}</a><br/>



                            <span class="ellipsis">{!! $question['answer'] !!}</span>
                            <h6 class="para_content">This is a test for getting started This is a test for getting.</h6>

                            </li>

                            @endforeach



                            {{--  <li>



                              <i class="fa fa-file-text-o" aria-hidden="true"></i>



                              <a href="#">Seamlessly innovate pandemic leadership</a><br/>



                            <span>- Posted in :  DeskPress, Montana, Cilo, Themes, General, Aloma</span>

                            </li>



                              <li>



                              <i class="fa fa-file-text-o" aria-hidden="true"></i>



                              <a href="#">Seamlessly innovate pandemic leadership</a><br/>



                            <span>- Posted in :  DeskPress, Montana, Cilo, Themes, General, Aloma</span>



                            



                            </li>



                              <li>



                              <i class="fa fa-file-text-o" aria-hidden="true"></i>



                              <a href="#">Seamlessly innovate pandemic leadership</a><br/>



                            <span>- Posted in :  DeskPress, Montana, Cilo, Themes, General, Aloma</span>



                            



                            </li> --}}


                   </div>



                        </div>

                        </div>

                       

                </div>

                

                 @endforeach

                 <div class="latest-recent" style="margin-top:15px;">

                      <div class="latest-knowledge">



                        <div class="latest-know-list help_desk">



                          <h4>RECENT TOPICS</h4>



                            



                            <li>



                              <i class="fa fa-file-text-o" aria-hidden="true"></i>



                              <a href="#">Seamlessly innovate pandemic leadership</a><br/>



                            <span>- Posted in :  DeskPress, Montana, Cilo, Themes, General, Aloma</span>



                            



                            </li>



                              <li>



                              <i class="fa fa-file-text-o" aria-hidden="true"></i>



                              <a href="#">Seamlessly innovate pandemic leadership</a><br/>



                            <span>- Posted in :  DeskPress, Montana, Cilo, Themes, General, Aloma</span>



                            



                            </li>



                              <li>



                              <i class="fa fa-file-text-o" aria-hidden="true"></i>



                              <a href="#">Seamlessly innovate pandemic leadership</a><br/>



                            <span>- Posted in :  DeskPress, Montana, Cilo, Themes, General, Aloma</span>



                            



                            </li>



                              <li>



                              <i class="fa fa-file-text-o" aria-hidden="true"></i>



                              <a href="#">Seamlessly innovate pandemic leadership</a><br/>



                            <span>- Posted in :  DeskPress, Montana, Cilo, Themes, General, Aloma</span>



                            



                            </li>

                        </div>  

                    </div>

                 </div>

                

               {{-- <div class="latest-recent">



                  <div class="latest-knowledge">



                      <div class="latest-know-list">



                          <h4>LATEST KNOWLEDGE BASE</h4>

                            <li>



                              <i class="fa fa-file-text-o" aria-hidden="true"></i>



                              <a href="#">Seamlessly innovate pandemic leadership</a><br/>



                            <span>- Posted in :  DeskPress, Montana, Cilo, Themes, General, Aloma</span>

                            </li>



                              <li>



                              <i class="fa fa-file-text-o" aria-hidden="true"></i>



                              <a href="#">Seamlessly innovate pandemic leadership</a><br/>



                            <span>- Posted in :  DeskPress, Montana, Cilo, Themes, General, Aloma</span>

                            </li>



                              <li>



                              <i class="fa fa-file-text-o" aria-hidden="true"></i>



                              <a href="#">Seamlessly innovate pandemic leadership</a><br/>



                            <span>- Posted in :  DeskPress, Montana, Cilo, Themes, General, Aloma</span>



                            



                            </li>



                              <li>



                              <i class="fa fa-file-text-o" aria-hidden="true"></i>



                              <a href="#">Seamlessly innovate pandemic leadership</a><br/>



                            <span>- Posted in :  DeskPress, Montana, Cilo, Themes, General, Aloma</span>



                            



                            </li>

                   </div>



                        </div>



                        <div class="latest-knowledge">



                        <div class="latest-know-list">



                          <h4>RECENT TOPICS</h4>



                            



                            <li>



                              <i class="fa fa-file-text-o" aria-hidden="true"></i>



                              <a href="#">Seamlessly innovate pandemic leadership</a><br/>



                            <span>- Posted in :  DeskPress, Montana, Cilo, Themes, General, Aloma</span>



                            



                            </li>



                              <li>



                              <i class="fa fa-file-text-o" aria-hidden="true"></i>



                              <a href="#">Seamlessly innovate pandemic leadership</a><br/>



                            <span>- Posted in :  DeskPress, Montana, Cilo, Themes, General, Aloma</span>



                            



                            </li>



                              <li>



                              <i class="fa fa-file-text-o" aria-hidden="true"></i>



                              <a href="#">Seamlessly innovate pandemic leadership</a><br/>



                            <span>- Posted in :  DeskPress, Montana, Cilo, Themes, General, Aloma</span>



                            



                            </li>



                              <li>



                              <i class="fa fa-file-text-o" aria-hidden="true"></i>



                              <a href="#">Seamlessly innovate pandemic leadership</a><br/>



                            <span>- Posted in :  DeskPress, Montana, Cilo, Themes, General, Aloma</span>



                            



                            </li>

                        </div>  

                    </div>

                </div> --}}   

@push('footer-scripts')

 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>

 $("#getan").click(function(){

  q = $('#help').val();

  url = "{{route('qanw') }}"

$.ajax({

        method: "POST",

        url: url,

        data: {

          'qu':q,

          '_token': "{{ csrf_token() }}"

        },

        success: function(result) {

          $('#qaget').show();

          $('#qaget').html('</br><p>Question :'+result[0].qustion+'<br/> Answer :'+result[0].answer+'</p>');

        }

})

});



$(function(){

  var cache = {};

    $('#help').autocomplete({

      minLength: 2,

      source: function( request, response ) {

        var term = request.term;

        if ( term in cache ) {

          response( cache[ term ] );

          return;

        }

        $.getJSON( "{{ route('q') }}", request, function( data, status, xhr ) {

          cache[ term ] = data;

          response( data );

        });

      },

      select: function(event, ui) {   

                location.href="/help-dask/" + ui.item.id;

            }

    });

})



</script>

@endpush

@endsection