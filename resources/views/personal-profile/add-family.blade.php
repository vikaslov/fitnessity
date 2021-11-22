@extends('layouts.header')
@section('content')

<link rel="shortcut icon" href="{{ url('public/img/favicon.png') }}">

<!--<link rel="stylesheet" type="text/css" href="{{ url('public/css/bootstrap.css') }}">-->
<link rel="stylesheet" type="text/css" href="{{ url('public/css/all.css') }}">
<link rel="stylesheet" type="text/css" href="{{ url('public/css/metismenu.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ url('public/css/fullcalendar.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ url('public/css/profile.css') }}">
<style type="text/css">
   .dob label {
        background-color: lightblue;
        padding: 8px;
        color: white;
        margin-right: -3px;
        z-index: 999999;
        position: relative;
        float:left;
        border-top:solid 1px #000;
        border-bottom:solid 1px #000;
        border-left:solid 1px #000;
    }
    .dob input {
        padding: 10px 10px 10px 10px !important;
        width: 240px;
        border: solid 1px lightgray;
        border-radius: 20px;
    }
</style>
<div class="page-wrapper inner_top" id="wrapper">

    <div class="page-container">

        <!-- Left Sidebar Start -->
        @include('personal-profile.left_panel')
        <!-- Left Sidebar End -->

        <div class="page-content-wrapper">

            <div class="content-page">

                <div class="container-fluid">

                    <div class="page-title-box">
                        <h4 class="page-title">Add Family</h4>
                    </div>

                    <div class="add_family_section padding-1 white-bg border-radius1">

                        <form name="frm_family" id="frm_family" action="{{Route('addFamilyMember')}}" method="post"  autocomplete="off" >
                            @csrf
                            <div class="addfmaily_block">

                                <div class="addfmaily_content">

                                    <div class="row">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="padding-bottom:10px">
                                            @if(session()->has('success'))
                                            <div class="alert alert-success fade in alert-dismissible show">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="line-height:23px">
                                                    <span aria-hidden="true" style="font-size:20px">×</span>
                                                </button> {{ session()->get('success') }}
                                            </div>
                                            @elseif(session()->has('error'))
                                            <div class="alert alert-danger fade in alert-dismissible show">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="line-height:23px">
                                                    <span aria-hidden="true" style="font-size:20px">×</span>
                                                </button> {{ session()->get('error') }}
                                            </div>
                                            @endif
                                        </div>
                                    </div>

                                    @php
                                    $fam_cnt=0;
                                    @endphp
                                    @if(count($UserFamilyDetails)>0)

                                    @foreach($UserFamilyDetails as $family)

                                    <div class="row" id="familydiv{{$fam_cnt}}">	
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">

                                            <div class="form-group">
                                                <input type="hidden" name="fid[{{$fam_cnt}}]" id="fid[{{$fam_cnt}}]"  value="{{$family->id}}">
                                                <input type="text" name="fname[{{$fam_cnt}}]" id="fname[{{$fam_cnt}}]" placeholder="First Name" class="form-control" required="required" value="{{$family->first_name}}" onkeypress="return event.charCode >= 65 && event.charCode <= 120">
                                            </div>

                                        </div>

                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">

                                            <div class="form-group">
                                                <input type="text" name="lname[{{$fam_cnt}}]" id="lname[{{$fam_cnt}}]" placeholder="Last Name" class="form-control" required="required" value="{{$family->first_name}}" onkeypress="return event.charCode >= 65 && event.charCode <= 120">
                                            </div>

                                        </div>

                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                                            <div class="form-group">
                                                <select name="gender[{{$fam_cnt}}]" id="gender[{{$fam_cnt}}]" class="form-control" required="required">
                                                    <option value="" hidden>Select Gender</option>
                                                    <option @if(strtolower($family->gender)=='male') selected @endif value="Male">Male</option>
                                                    <option @if(strtolower($family->gender)=='female') selected @endif value="Female">Female</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">

                                            <div class="form-group">
                                                <input type="email" name="email[{{$fam_cnt}}]" id="email[{{$fam_cnt}}]" placeholder="Email" class="form-control" required="required" value="{{$family->email}}">
                                            </div>

                                        </div>

                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">

                                            <div class="form-group">
                                                <select name="relationship[{{$fam_cnt}}]" id="relationship[{{$fam_cnt}}]" class="form-control" required="required">
                                                    <option value="" hidden>Select Relationship</option>
                                                    <option @if($family->relationship=='Brother') selected @endif  value="Brother">Brother</option>
                                                    <option @if($family->relationship=='Sister') selected @endif  value="Sister">Sister</option>
                                                    <option @if($family->relationship=='Father') selected @endif  value="Father">Father</option>
                                                    <option @if($family->relationship=='Mother') selected @endif  value="Mother">Mother</option>
                                                    <option @if($family->relationship=='Wife') selected @endif  value="Wife">Wife</option>
                                                    <option @if($family->relationship=='Husband') selected @endif  value="Husband">Husband</option>
                                                    <option @if($family->relationship=='Son') selected @endif  value="Son">Son</option>
                                                    <option @if($family->relationship=='Daughter') selected @endif  value="Daughter">Daughter</option>
                                                </select>
                                            </div>

                                        </div>

                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">

                                            <div class="form-group dob">
                                                <label>dd-mm-yyyy</label>
                                                <input type="text" name="birthdate[{{$fam_cnt}}]" id="birthdate[{{$fam_cnt}}]" placeholder="dd-mm-yyyy" class="bdate form-control" value="{{date('d-m-Y',strtotime($family->birthday))}}">
                                            </div>

                                        </div>

                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">

                                            <div class="form-group">
                                                <input type="number" name="mobile[{{$fam_cnt}}]" id="mobile[{{$fam_cnt}}]" placeholder="Mobile" class="form-control" required="required" value="{{$family->mobile}}" maxlength="10" onkeypress="return event.charCode >= 48 && event.charCode <= 57" >
                                            </div>


                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">

                                            <div class="form-group">
                                                <input type="text" name="emergency_name[{{$fam_cnt}}]" id="emergency_name[{{$fam_cnt}}]" placeholder="Emergency Contact Name" class="form-control" required="required" value="{{$family->emergency_contact_name}}" onkeypress="return event.charCode >= 65 && event.charCode <= 120">
                                            </div>

                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">

                                            <div class="form-group">
                                                <input type="text" name="emergency_contact[{{$fam_cnt}}]" id="emergency_contact[{{$fam_cnt}}]" placeholder="Emergency Contact Number" class="form-control" maxlength="10" value="{{$family->emergency_contact}}" required="required" onkeypress="return event.charCode >= 48 && event.charCode <= 57"><input type="text" name="removed_family[{{$fam_cnt}}]" id="removed_family{{$fam_cnt}}" value="" >
                                            </div>

                                        </div>
                                        <div style="border-bottom:1px #999999 solid;margin-bottom:10px" class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                            <i class="fas fa-trash delete-icon" data-del="{{$family->id}}" id="fmldlt"></i></div>
                                    </div>
                                    @php
                                    $fam_cnt++;
                                    @endphp
                                    @endforeach
                                    @else
                                    <div class="row" id="familydiv{{$fam_cnt}}" >
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">

                                            <div class="form-group">
                                                <input type="text" name="fname[{{$fam_cnt}}]" id="fname[{{$fam_cnt}}]" placeholder="First Name" class="form-control" required="required" onkeypress='return event.charCode >= 65 && event.charCode <= 120'>
                                            </div>

                                        </div>

                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">

                                            <div class="form-group">
                                                <input type="text" name="lname[{{$fam_cnt}}]" id="lname[{{$fam_cnt}}]" placeholder="Last Name" class="form-control" required="required" onkeypress='return event.charCode >= 65 && event.charCode <= 120'>
                                            </div>

                                        </div>

                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                                            <div class="form-group">
                                                <select name="gender[{{$fam_cnt}}]" id="gender[{{$fam_cnt}}]" class="form-control" required="required">
                                                    <option value="" hidden>Select Gender</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">

                                            <div class="form-group">
                                                <input type="email" name="email[{{$fam_cnt}}]" id="email[{{$fam_cnt}}]" placeholder="Email" class="form-control" required="required">
                                            </div>

                                        </div>

                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">

                                            <div class="form-group">
                                                <select name="relationship[{{$fam_cnt}}]" id="relationship[{{$fam_cnt}}]" class="form-control" required="required">
                                                    <option value="" hidden>Select Relationship</option>
                                                    <option>Brother</option>
                                                    <option>Sister</option>
                                                    <option>Father</option>
                                                    <option>Mother</option>
                                                    <option>Wife</option>
                                                    <option>Husband</option>
                                                    <option>Son</option>
                                                    <option>Daughter</option>
                                                </select>
                                            </div>

                                        </div>

                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">

                                            <div class="form-group dob">
                                                <label>dd-mm-yyyy</label>
                                                <input type="text" name="birthdate[{{$fam_cnt}}]" id="birthdate[{{$fam_cnt}}]" placeholder="Birthday" class="form-control">
                                            </div>

                                        </div>

                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">

                                            <div class="form-group">
                                                <input type="number" name="mobile[{{$fam_cnt}}]" id="mobile[{{$fam_cnt}}]" placeholder="Mobile" maxlength="10" class="form-control" required="required" onkeypress='return event.charCode >= 48 && event.charCode <= 57' >
                                            </div>


                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">

                                            <div class="form-group">
                                                <input type="text" name="emergency_name[{{$fam_cnt}}]" id="emergency_name[{{$fam_cnt}}]" placeholder="Emergency Contact Name" class="form-control" required="required">
                                            </div>

                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">

                                            <div class="form-group">
                                                <input type="text" name="emergency_contact[{{$fam_cnt}}]" id="emergency_contact[{{$fam_cnt}}]" maxlength="10" placeholder="Emergency Contact Number" class="form-control" required="required" onkeypress='return event.charCode >= 48 && event.charCode <= 57' >													<input type="text" name="removed_family[{{$fam_cnt}}]" id="removed_family{{$fam_cnt}}" value="" />
                                            </div>

                                        </div>
                                    </div> 
                                    @endif







                                </div>

                            </div>

                            <div class="form-group">
                                <a class="addmore_addfamily">+ Add More</a>
                            </div>

                            <div class="col-md-12 text-center p-0">
                                <input type="hidden" name="previous_family_count" id="previous_family_count" value="{{count($UserFamilyDetails)}}" />
                                <input type="hidden" name="family_count" id="family_count" value="{{$fam_cnt}}" />
                                <input type="submit" name="btn_family" id="btn_family" value="Submit" class="submit-btn">
                            </div>

                        </form>

                    </div>


                </div>

            </div>

        </div>

    </div>


</div>
@include('layouts.footer')

<!--<script src="{{ url('public/js/jquery-3.3.1.slim.min.js') }}"></script>-->

<script src="{{ url('public/js/bootstrap.min.js') }}"></script>

<script src="{{ url('public/js/metisMenu.min.js') }}"></script>

<script src="{{ url('public/js/jquery.slimscroll.js') }}"></script>

<script src="{{ url('public/js/moment.min.js') }}"></script>

<script src="{{ url('public/js/fullcalendar.min.js') }}"></script>

<script src="{{ url('public/js/jquery.fullcalendar.js') }}"></script>

<script src="{{ url('public/js/custom.js') }}"></script>

<script>
    $(document).ready(function () {

        $(".addmore_addfamily").click(function () {
            var cnt = $('#family_count').val();
            var str = '<div class="addfmaily_content mt-3">' +
                    '<div class="row" id="familydiv' + cnt + '"><div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12"><div class="form-group"><input type="text" name="fname[' + cnt + ']" id="fname[' + cnt + ']" placeholder="First Name" class="form-control" required="required"></div></div><div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12"><div class="form-group"><input type="text" name="lname[' + cnt + ']" id="lname[' + cnt + ']" placeholder="Last Name" class="form-control" required="required"></div></div><div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12"><div class="form-group"><select required="required" name="gender[' + cnt + ']" id="gender[' + cnt + ']" class="form-control"><option value="" hidden>Select Gender</option><option value="Male">Male</option><option value="Female">Female</option></select></div></div><div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12"><div class="form-group"><input required="required" type="email" name="email[' + cnt + ']" id="email[' + cnt + ']" placeholder="Email" class="form-control"></div></div><div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12"><div class="form-group"><select required="required" name="relationship[' + cnt + ']" id="relationship[' + cnt + ']" class="form-control"><option value="" hidden>Select Relationship</option><option>Brother</option><option>Sister</option><option>Father</option><option>Mother</option><option>Wife</option><option>Husband</option><option>Son</option><option>Daughter</option></select></div></div><div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12"><div class="form-group dob"><label>dd-mm-yyyy</label><input type="text" name="birthdate[' + cnt + ']" id="birthdate[' + cnt + ']"  placeholder="dd-mm-yyyy" class="form-control"></div></div><div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12"><div class="form-group"><input type="text" required="required" name="mobile[' + cnt + ']" id="mobile[' + cnt + ']" placeholder="Mobile" class="form-control" maxlength="10" onkeypress="return event.charCode >= 48 && event.charCode <= 57"></div></div><div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12"><div class="form-group"><input required="required" type="text" name="emergency_name[' + cnt + ']" id="emergency_name[' + cnt + ']" placeholder="Emergency Contact Name" class="form-control" onkeypress="return event.charCode >= 65 && event.charCode <= 120"></div></div><div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12"><div class="form-group"><input required="required" type="text" name="emergency_contact[' + cnt + ']" id="emergency_contact[' + cnt + ']" placeholder="Emergency Contact Number" class="form-control" maxlength="10" onkeypress="return event.charCode >= 48 && event.charCode <= 57"><input type="text" name="removed_family[' + cnt + ']" id="removed_family' + cnt + '" value="" /></div></div><div style="border-bottom:1px #999999 solid;margin-bottom:10px" class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12"><i class="fas fa-trash delete-icon deleterem" data-del="' + cnt + '"></i></div></div></div>';
            cnt = parseInt(cnt) + parseInt(1);
            $('#family_count').val(cnt);
            $(".addfmaily_block").append(str);

        });
    });
    $(document).on("click", '.delete-icon', function (event) {
        var rm = $(this).attr("data-del");
        //alert(rm);
        /*var fld='removed_family'+rm;
         document.getElementById(fld).value='delete';
         var did="#familydiv"+rm;
         $(did).hide();*/

        var _token = $("input[name='_token']").val();
        $.ajax({
            type: 'POST',
            url: '{{route("removefamily")}}',
            data: {
                _token: _token,
                rm: rm
            },
            success: function (data) {
                alert("Delete Family Member");
                window.location.reload();
                //$(".edit_profile_section").load(location.href + " .edit_profile_section");
            }
        });
    });
</script>

@endsection