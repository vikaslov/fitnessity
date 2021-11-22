@inject('request', 'Illuminate\Http\Request')
@extends('layouts.header')

@section('content')
<style>
.avatar {
  vertical-align: middle;
  width: 70px;
  height: 70px;
  border-radius: 50%;
}
.texttr{
  text-transform:capitalize;
}
input,select {
  margin: 2.2% 0.5%;
  border: 1px solid #828282;
  padding: 16px 10px;
  width: 100%;
}
 </style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<link href="https://cdn.rawgit.com/dubrox/Multiple-Dates-Picker-for-jQuery-UI/master/jquery-ui.multidatespicker.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Zebra_datepicker/1.9.15/zebra_datepicker.src.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

<div class="business-offer-main" style="margin-top:50px; padding:50px; min-height:500px;">
    <section class="row">
    <?php
    $loggedinUser = Auth::user();
    $customerName = $loggedinUser->firstname . ' ' . $loggedinUser->lastname;
    $profilePicture = $loggedinUser->profile_pic;
    ?>
    <div class="col-md-12 text-center">
        <h2>Manage Company</h2>
    </div>
    @if(isset($company) && !empty($company[0]))
    @foreach($company as $cp => $comp)
    <form id="frmCompany<?=$cp?>" name="frmCompany<?=$cp?>" method="post" action="{{route('editBusinessProfile')}}">
    <div class="col-md-12">
        @csrf
        <input type="hidden" name="cid" value="{{ $comp->id }}" />
        <input type="hidden" name="serviceid" value="{{ $comp->serviceid }}" />
        <div class="network_block nw-profile_block">
            <div class="row">
                <div class="nw-user-detail-block">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nw-user-detail">
                        <div class="row">
                            <div class="col-lg-2 col-md-2 col-sm-2">
                                <img src="{{url('/').'/public/uploads/profile_pic/thumb/'.$comp->logo}}" alt="Avatar" class="avatar">
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <p class="texttr">{{$comp->company_name}}</p>
                                <p class="texttr">{{$comp->first_name}} {{$comp->last_name}}</p>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2">
                                <input type="submit" class="btn btn-info" name="btnedit" id="btnedit" value="Edit" />
                                <input type="submit" class="btn btn-primary" name="btncreateservice" id="btncreateservice" value="Create Service" />
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2">
                                <input type="submit" class="btn btn-info" name="btnview" id="btnview" value="View" />
                                <input type="submit" class="btn btn-primary" name="btnmanageservice" id="btnmanageservice" value="Manage Service" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
    @endforeach
    @else
    <div class="col-md-12 text-center" style="padding:100px">
        No company listed
    </div>
    @endif
    </section>
</div>
@include('layouts.footer')
<script src="/public/js/jquery-ui.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/zebra_datepicker@latest/dist/css/default/zebra_datepicker.min.css"/>
<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
<script>
$(document).ready(function(){
    
    $(".deletec").click(function(){
        $.ajax({
          url:"{{url('/pcompany/delete/')}}"+"/"+$(this).attr('company_id'),
          type:'GET',
          dataType: 'json',
          processData: false,
          contentType: false,
          headers: {'X-CSRF-TOKEN': $("#_token").val()},
          beforeSend: function () {
            $('.deletec').prop('disabled', true);
            showSystemMessages('#systemMessage', 'info', 'Please wait while we delete a company with Fitnessity.');
          },
          complete: function () {
            $('#deletec').prop('disabled', false);
          },
          success: function (response) {
              showSystemMessages('#systemMessage', response.type, response.msg);
              window.location.reload()
            }
        });
    });
});    
</script>
@endsection
