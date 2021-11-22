@extends('layouts.header')
@section('content')
@include('layouts.userHeader')
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
</style>
<div class="p-0 col-md-12 inner_top padding-0">
    <div class="row">
        
        <div class="col-md-2" style="background: black;">
            <div class="navbar1">
                <a href="{{route('welcomeBusinessProfile')}}"><div class="navlink1" id="tab1">Welcome</div></a>
            </div>
        </div>
        {{-- @include('business.leftNavigation') --}}

        <div class="col-md-10">

            
                <div class="container-fluid p-0" id="comp-info">
                    <div class="tab-hed">Create Your Business Profile</div>
                    <hr style="border: 15px solid black;width: 104%;margin-left: -38px;">
                    <form id="frmWelcome" name="frmWelcome" method="post" action="{{route('addbstep')}}">
                    @csrf
                    <input type="hidden" name="userid" id="userid" value="{{Auth::user()->id}}">
                    <input type="hidden" name="bstep" id="bstep1" value="2">
                    <input type="hidden" name="cid" value="0">
                    <input type="hidden" name="serviceid" value="0">
                    <section class="row">
                        <div class="col-md-12 text-center">
                            <div class="tab-hed">Welcome To Fitnessity For Business Profile Setup</div>
                        </div>
                        <div class="col-md-12 text-center">
                            <div class="tab-para">Ready To Start Earning More ? </div>
                            <br/>
                            <p class="tab-para1">Fitnessity was designed to make the world of fitness accessible from one platform.<br/> We connect customer swith trainers to coaches, classes to therapists, adventures & tours.</p>
                            <p class="tab-para1">Offer your services online, at your place of business or on location</p>
                            <p class="tab-para1">Add your business information, images, videos, services, prices, get verified by completed a background check, start getting reviews,<br/>
                                manage your customers and accounts and much more. Start receiving bookings from customers looking for activites and services your offer.</p>
                        </div>
                        <div class="col-md-12">
                            <br/><br/><br/>
                            <div class="row">
                                <div class="col-md-6"></div>
                                <div class="col-md-6 text-right">
                                    <button type="submit" class="btn-nxt" id="next-btn">Create Business <i class="fa fa-arrow-right"></i></button>
                                </div>
                            </div>
                            <br/>
                        </div>
                    </section>
                    </form>
                    
                    <section class="row">
                        <?php
                        $loggedinUser = Auth::user();
                        $customerName = $loggedinUser->firstname . ' ' . $loggedinUser->lastname;
                        $profilePicture = $loggedinUser->profile_pic;
                        ?>
                        @if(isset($company) && !empty($company[0]))
                        <div class="col-md-12 text-center">
                            <div class="tab-hed">Manage Company</div>
                        </div>
                        @foreach($company as $cp => $comp)
                        <form id="frmCompany<?=$cp?>" name="frmCompany<?=$cp?>" method="post" action="{{route('editBusinessProfile')}}">
                        <div class="col-md-12" style="padding-bottom:50px">
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
                                                <div class="col-lg-4 col-md-4 col-sm-4">
                                                    <input type="submit" class="btn btn-info" name="btnedit" id="btnedit" value="Edit" />
                                                    <input type="submit" class="btn btn-info" name="btnview" id="btnview" value="View" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>
                        @endforeach
                        @endif
                    </section>
                </div>
          
        </div>

    </div>
</div>

@include('layouts.footer')

@endsection
