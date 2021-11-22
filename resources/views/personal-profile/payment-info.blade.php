@extends('layouts.header')
@section('content')

<link rel="shortcut icon" href="{{ url('public/img/favicon.png') }}">

<!--<link rel="stylesheet" type="text/css" href="{{ url('public/css/bootstrap.css') }}">-->
<link rel="stylesheet" type="text/css" href="{{ url('public/css/all.css') }}">
<link rel="stylesheet" type="text/css" href="{{ url('public/css/metismenu.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ url('public/css/fullcalendar.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ url('public/css/profile.css') }}">
<link rel="stylesheet" type="text/css" href="{{ url('public/css/creditcard.css') }}">

<div class="page-wrapper inner_top" id="wrapper">

    <div class="page-container">

        <!-- Left Sidebar Start -->
        @include('personal-profile.left_panel')
        <!-- Left Sidebar End -->

        <div class="page-content-wrapper">

            <div class="content-page">

                <div class="container-fluid">

                    <div class="page-title-box">
                        <h4 class="page-title">Payment Information</h4>
                    </div>

                    <div class="payment_info_section padding-1 white-bg border-radius1">

                        <div class="payment-info-block">

                            <div class="savecard-block">
                                
                                <?php
                                if(!empty($cardInfo)) {
                                ?>
                                <div class="sacecard-title">Your Saved Cards</div>
                                <?php
                                foreach($cardInfo as $card) {
                                ?>
                                <div class="cards-block" style="cursor: pointer" data-name="<?=$card['owner']?>" data-cvv="<?=$card['cvv']?>" data-cnumber="<?=$card['cardnumber']?>" data-month="<?=$card['month']?>" data-year="<?=$card['year']?>" data-type="<?=$card['type']?>" data-ptype="update">
                                    <div class="cards-content" style="color:#ffffff; background-image: url({{ url('public/img/visa-card-bg.jpg') }});">
                                        <img src="{{ url('/public/images/creditcard/'.$card['type'].'.jpg') }}" alt="">
                                        <span style="float:right"><?=$card['owner']?></span>
                                        <p><?=ucfirst($card['type'])?></p>
                                        <span>
                                            <span class="dots"></span><span class="dots"></span><span class="dots"></span><span class="dots"></span> <?=$card['cvv']?>
                                        </span>
                                        <span style="float:right" data-cardid="<?=$card['id']?>" title="Delete Card" class="delCard"><i class="fa fa-trash"></i></span>
                                    </div>
                                </div>
                                <?php } ?>
                                <div class="cards-block" style="cursor: pointer" data-name="" data-cvv="" data-cnumber="" data-month="" data-year="" data-type=""  data-ptype="insert">
                                    <div class="cards-content" style="height:166px; color:#ffffff; background-image: url({{ url('public/img/visa-card-bg.jpg') }});">
                                        <span style="text-align: center">Add New Card</span>
                                    </div>
                                </div>
                                <?php } else { ?>
                                <div style="padding:50px; text-align: center; font-size:14px; color:#585858">Upload a credit card safely so you can process bookings faster.</div>
                                <?php } ?>
                                
                            </div>

                            <div class="row">

                                <form method="post" id="frmpayment" action="{{Route('paymentsave')}}" class="billing-block col-lg-7">
                                    <input type="hidden" name="payment_type" id="payment_type" value="insert" />
                                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                    <input type="hidden" name="card_type" id="card_type" value="visa" />
                                    <div style="color:red" id="card-error"></div>
                                    <div class="sacecard-title">Billing Address</div>

                                    <div class="row">

                                        <div class="col-xl-9 col-lg-9 col-md-9 col-sm-8 col-12 form-group">
                                            <label for="owner">Name On Card</label>
                                            <input required type="text" name="owner" id="owner" placeholder="" class="form-control">
                                        </div>

                                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-4 col-12 form-group">
                                            <label for="cvv">CVV</label>
                                            <input required type="text" name="cvv" id="cvv" placeholder="" class="form-control">
                                        </div>

                                        <div id="card-number-field" class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-12 form-group">
                                            <label for="cardNumber">Card Number</label>
                                            <input required type="text" name="cardNumber" id="cardNumber" placeholder="" class="form-control">
                                        </div>
                                        
                                        <div id="expiration-date" class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12 form-group">
                                            
                                            <select required id="card_month" name="card_month">
                                                <option value="">Mon</option>
                                                <option value="01">Jan</option>
                                                <option value="02">Feb</option>
                                                <option value="03">Mar</option>
                                                <option value="04">Apr</option>
                                                <option value="05">May</option>
                                                <option value="06">Jun</option>
                                                <option value="07">Jul</option>
                                                <option value="08">Aug</option>
                                                <option value="09">Sep</option>
                                                <option value="10">Oct</option>
                                                <option value="11">Nov</option>
                                                <option value="12">Dec</option>
                                            </select>
                                            <select required id="card_year" name="card_year">
                                                <option value="">Year</option>
                                                <option value="2021">2021</option>
                                                <option value="2022">2022</option>
                                                <option value="2023">2023</option>
                                                <option value="2024">2024</option>
                                                <option value="2025">2025</option>
                                                <option value="2026">2026</option>
                                                <option value="2027">2027</option>
                                                <option value="2028">2028</option>
                                                <option value="2029">2029</option>
                                                <option value="2030">2030</option>
                                            </select>
                                        </div>
                                        
                                    </div>
                                    <div class="row">
                                        <div id="pay-now" class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 form-group">
                                            <input type="submit" id="confirm-purchase" value="Confirm" class="btn-style-one">
                                        </div>
                                        
                                        <div id="credit_cards" class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 form-group">
                                            <img src="/public/images/creditcard/visa.jpg" id="visa">
                                            <img src="/public/images/creditcard/mastercard.jpg" id="mastercard">
                                            <img src="/public/images/creditcard/amex.jpg" id="amex">
                                        </div>
                                   
                                        

                                    </div>

                                </form>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>


</div>
@include('layouts.footer')



<script src="{{ url('public/js/bootstrap.min.js') }}"></script>

<script src="{{ url('public/js/metisMenu.min.js') }}"></script>

<script src="{{ url('public/js/jquery.payform.min.js') }}" charset="utf-8"></script>

<script src="{{ url('public/js/creditcard.js') }}"></script>

<script type="text/javascript">
    
    var query_error = '<?=isset($_GET['error'])?$_GET['error']:0;?>';
    if(query_error == 1) {
        $("#card-error").html("Requested card number is already exists.");
    }
    
    $(".delCard").on("click", function(){
        $("#owner").val("");
        $("#cvv").val("");
        $("#cardNumber").val("");
        $("#card-error").html("");
        $("#card_month option:selected").text("Mon");
        $("#card_year option:selected").text("Year");
        $("#card_month").val("");
        $("#card_year").val("");
        if (confirm('You are sure to delete card?')) {
            var _token = $("input[name='_token']").val();
            var cardid = $(this).data("cardid");
            $.ajax({
                type: 'POST',
                url: '{{route("paymentdelete")}}',
                data: {
                    _token: _token,
                    cardid: cardid
                },
                success: function(data) {
                    alert("Card removed successfully.");
                    window.location.reload();
                }
            });
        } else {
            //alert('Why did you press cancel? You should have confirmed');
        }
    });
    
    $(".cards-block").on("click", function(){
        $("#payment_type").val($(this).data('ptype'));
        $("#owner").val($(this).data('name'));
        $("#cvv").val($(this).data('cvv'));
        $("#cardNumber").val($(this).data('cnumber'));
        if($(this).data('month') != "") {
        $("#card_month option:selected").text(chkmonth($(this).data('month')));
        } else {
        $("#card_month option:selected").text("Mon");
        $("#card_year option:selected").text("Year");
        }
        $("#card_month option:selected").val($(this).data('month'));
        $("#card_year").val($(this).data('year'));
        $("#card_type").val($(this).data('type'));
        $("#credit_cards img").addClass('transparent');
        $("#"+$(this).data('type')).removeClass('transparent');
    });
    
    function chkmonth(id) {
        if(id==1)return "Jan";
        if(id==2)return "Feb";
        if(id==3)return "Mar";
        if(id==4)return "Apr";
        if(id==5)return "May";
        if(id==6)return "Jun";
        if(id==7)return "Jul";
        if(id==8)return "Aug";
        if(id==9)return "Sep";
        if(id==10)return "Oct";
        if(id==11)return "Nov";
        if(id==11)return "Dec";
    }
</script>
@endsection