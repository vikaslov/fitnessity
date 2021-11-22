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

<div class="business-offer-main" style="margin-top:50px; padding:50px; min-height:500px;">
    <section class="row">
    <?php
    $companyid = $companyname = "";
    if(isset($companyInfo)) {
        if(isset($companyInfo[0]) && !empty($companyInfo[0])) {
            $companyid = $companyInfo[0]->id;
            $companyname = $companyInfo[0]->company_name;
        }
    }
    ?>
    <div class="col-md-12 text-center">
        <h2>Manage <?=$companyname?> Services</h2>
    </div>
        
    <form id="frmservice" name="frmservice" method="post" action="{{route('editBusinessProfile')}}">
        <div class="col-md-10"></div>
        <div class="col-md-2">
        @csrf
        <input type="hidden" name="cid" value="{{ $companyid }}" style="width:50px" />
        <input type="hidden" name="serviceid" value="0" style="width:50px" />
        <input type="submit" class="btn btn-primary" name="btncreateservice" id="btncreateservice" value="Create Service" />
        </div>
    </form>
    @if(isset($companyservice) && !empty($companyservice[0]))
    @foreach($companyservice as $cs => $cservice)
    @if($cservice->serviceid != 0)
    <form id="frmCompany<?=$cs?>" name="frmCompany<?=$cs?>" method="post" action="{{route('editBusinessService')}}">
    <div class="col-md-12">
        @csrf
        <input type="hidden" name="cid" value="{{ $cservice->cid }}" style="width:50px" />
        <input type="hidden" name="serviceid" value="{{ $cservice->serviceid }}" style="width:50px" />
        <div class="network_block nw-profile_block">
            <div class="row">
                <div class="nw-user-detail-block">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nw-user-detail">
                        <div class="row">
                            <div class="col-lg-2 col-md-2 col-sm-2">
                                <img src="{{url('/').'/public/uploads/profile_pic/thumb/'.$cservice->profile_pic}}" alt="Avatar" class="avatar">
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <p class="texttr">{{$cservice->program_name}} ({{$cservice->sport_activity}})</p>
                                <p class="texttr"><b>{{$cservice->service_type}}</b></p>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2">
                                <input type="submit" class="btn btn-info" name="btnedit" id="btnedit" value="Edit" />
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2">
                                <input type="submit" class="btn btn-info" name="btnview" id="btnview" value="View" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
    @endif
    @endforeach
    @else
    <div class="col-md-12 text-center" style="padding:100px">
        No company service records found.
    </div>
    @endif
    <div class="col-md-12 text-center" style="padding-top:50px">
        <a href="/manage/company">Back to Manage Company</a>
    </div>
    </section>
</div>
@include('layouts.footer')
<script src="/public/js/jquery-ui.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/zebra_datepicker@latest/dist/css/default/zebra_datepicker.min.css"/>
<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
<script>
$(document).ready(function(){
    
    @if(isset($firstCompany))
    $('#display_user_profile_pic').attr('src',"{{url('/').'/public/uploads/profile_pic/thumb/'.$firstCompany->logo}}")
    $('.username').html("{{'@'.$firstCompany->business_user_tag}}")
    $('#intro-user').html("{{$firstCompany->about_company}}")
    $('.coemail').attr('href',"{{'mailto:'.$firstCompany->email}}")
    $('.cophone').attr('href',"{{'tel:'.$firstCompany->contact_number}}")
    @endif

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
