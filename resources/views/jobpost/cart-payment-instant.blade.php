@extends('layouts.app1')
@section('content')
<link rel="stylesheet" href="<?php echo Config::get('constants.FRONT_CSS'); ?>compare/style.css">
<link rel="stylesheet" href="<?php echo Config::get('constants.FRONT_CSS'); ?>compare/w3.css">
<style>.payment-section{margin-top:-70px}</style>
<script src="<?php echo Config::get('constants.FRONT_JS'); ?>compare/Compare.js"></script>
<script src="{{ url('public/js/owl.carousel.js') }}"></script>
<script src="<?php echo Config::get('constants.FRONT_JS'); ?>compare/jquery-1.9.1.min.js"></script>
<div class="payment-section">
    <div class="payment-toptabs">
        <ul>
            <li> <span>1</span> Shopping Cart </li>
            <li> <span>2</span> Confirmation </li>
        </ul>
    </div>
    <?php
    $companyid = $companylogo = $companyname = $companyaddress = "";
    $pay_session = $pay_price = $pay_setduration = $pay_discount = $languages = "";
    if (isset($serviceData)) {
        foreach ($serviceData as $service) {
            $company = $price = $businessSp = [];
            $sport_activity = $service['sport_activity'];
            $profilePic = $service['profile_pic'];
            $area = !empty($service['area']) ? $service['area'] : 'Location';
            if (isset($companyData)) {
                if (isset($companyData[$service['cid']]) && !empty($companyData[$service['cid']])) {
                    $company = $companyData[$service['cid']];
                    $company = isset($company[0]) ? $company[0] : [];
                    if(!empty($company)) {
                        $companyid = $company['id'];
                        $companylogo = $company['logo'];
                        $companyname = $company['company_name'];
                        $companyaddress = $company['address'];
                    }
                    $price = $servicePrice[$service['cid']];
                    $price = isset($price[0]) ? $price[0] : [];
                    if(!empty($price)) {
                        $pay_session = $price['pay_session'];
                        $pay_price = $price['pay_price'];
                        $pay_setduration = $price['pay_setduration'];
                        $pay_discount = $price['pay_discount'];
                    }
                    $businessSp = $businessSpec[$service['cid']];
                    $businessSp = isset($businessSp[0]) ? $businessSp[0] : [];
                    if(!empty($businessSp)) {
                        $languages = $businessSp['languages'];
                    }
                }
            }
        }
    }
    ?>
    <div class="col-md-7 orderdetails-block">
        <h4>Order Details</h4>
        <div class="details-section">
            <div class="imgorder">
                <?php
                if (File::exists(public_path("/uploads/profile_pic/thumb/" . $service['profile_pic']))) {
                    $profilePic = url('/public/uploads/profile_pic/thumb/' . $service['profile_pic']);
                } else {
                    $profilePic = '/public/images/default-avatar.png';
                }
                ?>
                <img src="{{ $profilePic }}">
            </div>
            <div class="contentder">
                <div class="iconset">
                    <img src="{{ url('public/img/download.png') }}">
                    <img src="{{ url('public/img/edit.png') }}">
                    <img src="{{ url('public/img/delete.png') }}">
                </div>
                <div class="paritcipate-150">
                    <select name="paritcipate_150[]" multiple id="paritcipate_150">
                        <option>Who is participating?</option>
                        <option></option>
                    </select>
                </div>
                <div class="giftactivity">
                    <img src="{{ url('public/img/gift.png') }}"> Gift This Activity
                </div>
                <h5> <span><?= $service['program_name'] ?></span> <span>$<?=$pay_price?></span> </h5>
                <p>Payment Type: Day Tour</p>
                <p>Date Reserved: <?=date('l jS \of F Y')?></p>
                <p>Reserved for Time: <?= $service['mon_shift_start'] ?> - <?= $service['mon_shift_end'] ?></p>
                <p>Service: <?= $service['service_type'] ?></p>
                <p>Duration: <?= $service['mon_duration'] ?></p>
                <p>Activity Location: <?= $service['activity_location'] ?></p>
                <p>Group Size: <?= $service['group_size'] ?></p>
                <p><span>Great For: <?= $service['activity_for'] ?></span><span>Participant #1: Darryl Phipps (34)</span></p>
                <p><span>Age: <?= $service['age_range'] ?></span><span>Participant #2: Lisa Santana (29)</span></p>
                <p>Language: <?=$languages?></p>
                <p>Skill Level: <?= $service['difficult_level'] ?></p>
                <p>Company: <?=$companyname?></p>
                <p>Instant Booking</p>
                <a href="#" class="viewlink">View Itinerary</a>
                <h6>Activities are much more fun with friends</h6>
                <p>Invite or recommend a friend to participate or <br> join you.</p>
                <select name="serachfor[]" multiple id="serachfor">
                    <option>Search for friends on Fitnessity</option>
                    <option></option>
                </select>
                <p>Don’t see your friends on Fitnessity? <br> Invite them to join.</p>
                <div class="emailblock">
                    <input type="email" name="" id="" placeholder="Send an Email" class="form-control">
                    <input type="submit" value="SEND" class="">
                </div>
                <p>This provider requires that you agree to some terms and conditions before booking this activity.</p>
                <label for="waiver">
                    <input type="radio" name="radio1" id="waiver"> Liability Waiver
                </label>
                <label for="covid">
                    <input type="radio" name="radio1" id="covid"> Covid-19 Protocols
                </label>
                <label for="terms">
                    <input type="radio" name="radio1" id="terms"> Terms,Conditions, FAQ
                </label>
            </div>
        </div>
        <div class="col-md-12 buttonblock" style="text-align:center">
            <a href="/instant-hire" class="btn btn-web-btn"> Add Another Activity + </a>
        </div>
    </div>
    <div class="col-md-5 order-summaryblock">
        <h4>Order Summary</h4>
        <div class="totalsummary">
            <p> <span>Bookings</span> <span><?=$pay_session?></span> </p>
            <p> <span>Subtotal</span> <span>$<?=$pay_price?></span> </p>
            <p> <span><a href="#" class="inquirylink" style="color:red;"><i class="fa fa-question-circle" aria-hidden="true"></i></a> Service Fee</span> <span>$0</span> </p>
            <p> <span>Tax <?=$pay_discount?>%</span> <span>$0</span> </p>
            <h6> <span><b>Grand Total:</b></span> <span>$<?=$pay_price?></span> </h6>
        </div>
        <div class="payment-item" style="">
            <h4>PAYMENT SELECTION</h4>
            <h5>SAVED CARDS <a href="#" class="edit_links">Edit</a></h5>
            <div class="selection" id="card_1">
                <div class="card_shapes1"><img src="/public/images/card-shapes.png" alt=""></div>
                <input type="radio" name="subscription" id="subscription">
                <label for="subscription">
                    <span id="numbercard">XXXX 4023</span>
                    <span class="cardimg"><img src="/public/images/visa-white.png" alt=""></span>
                </label>
                <div class="check"></div>
            </div>
            <div class="selection" id="card_2">
                <div class="card_shapes2"><img src="/public/images/card-shapes1.png" alt=""></div>
                <input type="radio" name="subscription" id="subscription-2">
                <label for="subscription-2">
                    <span class="numbercard">XXXX 5987</span>
                    <span class="cardimg"><img src="/public/images/master-card.png" alt=""></span>
                </label>
                <div class="check"></div>
            </div>
        </div>
        <div class="othepayment-block">
            <h5>OTHER PAYMENT METHODS</h5>
            <div class="links">
                <a href="#" class="active">Credit / Debit Card</a>
                <a href="#">Paypal</a>
                <a href="#">Venmo</a>
            </div>
        </div>
        <div class="col-md-12 padding-0 card_details_block">
            <div class="form-group col-md-6 card_number_block">
                <label for="">Card Number</label>
                <input type="text" name="cardnumber" id="card_number" placeholder="0000 0000 0000 0000" class="form-control" autocomplete="off" maxlength="16">
                <div class="cardpayment-logo">
                    <img src="/public/images/visa-black.png" alt="" class="visa_card">
                    <img src="/public/images/master-card.png" alt="" class="master_card">
                </div>
            </div>
            <div class="form-group col-md-6">
                <label for="">Name on Card</label>
                <input type="text" name="namecard" id="name_card" placeholder="Enter Your Name Here" class="form-control" autocomplete="off">
            </div>
            <div class="form-group col-md-3">
                <label for="">Expiry Date</label>
                <input type="text" name="exirydate" id="expiry_date" placeholder="MM / YY" class="form-control" autocomplete="off">
            </div>
            <div class="form-group col-md-3">
                <label for="">CVV</label>
                <input type="number" name="cvv" id="cvv" placeholder="- - -" class="form-control" autocomplete="off" onkeypress="if (this.value.length == 3)
        return false;">
                <a href="#" class="cvv_code" data-toggle="popover" data-trigger="hover" data-content="Lorem Ipsum is simply dummy text" data-original-title="" title="">?</a>
            </div>
            <div class="form-group col-md-12">
                <label class="switch" id="cards_check">
                    <input type="checkbox">
                    <span class="slider round"></span>
                </label>
                <span>Save This Card</span>
            </div>
        </div>
        <div class="col-md-12" style="text-align:center">
            <a href="{{ Config::get('constants.SITE_URL') }}/instant-hire/confirm-payment" class="btn btn-web-btn"> Check Out </a>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        var categ = new SlimSelect({
            select: '#serachfor'
        });
        var categ = new SlimSelect({
            select: '#paritcipate_150'
        });
    })
</script>
@endsection
