@extends('layouts.app1')
@section('content')
<?php
session_start();
//code for Cart
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	//code for adding product in cart
	case "add":
        if(!empty($_POST["quantity"])) {
            $pid = $_GET["pid"];
            $price = isset($_POST["price"]) ? $_POST["price"] : 0;
            $result = DB::select('select * from business_services where id = "'.$pid.'"');
            if (count($result) > 0) {
                foreach ($result as $item) {
                    $itemArray = array($item->serviceid=>array('type'=>$item->service_type, 'name'=>$item->program_name, 'code'=>$item->serviceid, 'quantity'=>$_POST["quantity"], 'price'=>$price, 'image'=>$item->profile_pic));
                    if(!empty($_SESSION["cart_item"])) {
                        if(in_array($item->serviceid, array_keys($_SESSION["cart_item"]))) {
                            foreach($_SESSION["cart_item"] as $k => $v) {
                                if($item->serviceid == $k) {
                                    if(empty($_SESSION["cart_item"][$k]["quantity"])) {
                                        $_SESSION["cart_item"][$k]["quantity"] = 0;
                                    }
                                    $_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
                                }
                            }
                        } else {
                            $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"], $itemArray);
                        }
                    }  else {
                        $_SESSION["cart_item"] = $itemArray;
                    }
                }
            }
	}
	break;

	// code for removing product from cart
	case "remove":
            if(!empty($_SESSION["cart_item"])) {
                foreach($_SESSION["cart_item"] as $k => $v) {
                    if($_GET["code"] == $k)
                    unset($_SESSION["cart_item"][$k]);				
                    if(empty($_SESSION["cart_item"]))
                    unset($_SESSION["cart_item"]);
                }
            }
	break;
	// code for if cart is empty
	case "empty":
		unset($_SESSION["cart_item"]);
	break;	
}
?>
<script type="text/javascript">
    $(window).on('load', function() {
        $('#successAddCart').modal('show');
    });
</script>
<?php
}
?>
<style>
    #shopping-cart {margin: 40px;}
    #product-grid {margin: 40px;}
    #shopping-cart table {width: 100%;background-color: #F0F0F0;}
    #shopping-cart table td {background-color: #FFFFFF;}
    .txt-heading {color: #211a1a;border-bottom: 1px solid #E0E0E0;overflow: auto;}
    #btnEmpty {background-color: #ffffff;border: #d00000 1px solid;padding: 5px 10px;color: #d00000;float: right;text-decoration: none;border-radius: 3px;margin: 10px 0px;}
    .btnAddAction {padding: 5px 10px;margin-left: 5px;background-color: #efefef;border: #E0E0E0 1px solid;color: #211a1a;float: right;text-decoration: none;border-radius: 3px;cursor: pointer;}
    #product-grid .txt-heading {margin-bottom: 18px;}
    .product-item {float: left;background: #ffffff;margin: 30px 30px 0px 0px;border: #E0E0E0 1px solid;}
    .product-image {height: 155px;width: 250px;background-color: #FFF;}
    .clear-float {clear: both;}
    .demo-input-box {border-radius: 2px;border: #CCC 1px solid;padding: 2px 1px;}
    .tbl-cart {font-size: 0.9em;}
    .tbl-cart th {font-weight: normal;}
    .product-title {margin-bottom: 20px;}
    .product-price {float:left;}
    .cart-action {float: right;}
    .product-quantity {padding: 5px 10px;border-radius: 3px;border: #E0E0E0 1px solid;}
    .product-tile-footer {padding: 15px 15px 0px 15px;overflow: auto;}
    .cart-item-image {width: 30px;height: 30px;border-radius: 50%;border: #E0E0E0 1px solid;padding: 5px;vertical-align: middle;margin-right: 15px;}
    .no-records {text-align: center;clear: both;margin: 38px 0px;}

    .direc-list-detail p span {
        font-size: 14px !important;
    }
    .direc-right ul li i {
        padding-right: 0px;
    }
    .book-professional-link,
    .book-professional-link:hover {
        color: #ffffff !important;
        background: #f53b49 !important;
        padding: 6px;
    }
    /* td.booking_btn{
        background:  !important;
    }*/
    .modal-header .close {
        margin-top: -2px !important;
    }
    @media (min-width: 992px) {
        .modal-lg {
            width: 980px;
        }
    }
    .contentPop {
        width: 100% !important;
        margin-left: 0 !important;
        height: auto !important;
        padding: 0px 10px !important;
    }
    tr.d_none {
        display: none;
    }
    td.bg_color {
        background: #f53b49;
        color: #fff;
        font-weight: bold;
        border: 1px dotted white !important;
        border-left: 1px solid #575656 !important;
    }
    div#id01 {
        padding: 0px !important;
    }
    table.compareItemParent.relPos.comparetable {
        margin: 0 !important;
    }
    a.whiteFont.w3-padding.w3-closebtn.closeBtn {
        color: #fff !important;
        padding: 8px 16px !important;
        background: #f53b49 !important;
        position: initial !important;
        margin-right: 14.2% !important;
        float: right !important;
    }
    .w3-row.contentPop.w3-margin-top {
        margin-top: 0px !important;
    }
    .compareThumb {
        height: 150px;
        width: 150px;
        border: 3px solid #f53b49;
        border-radius: 50%;
        box-shadow: 3px 3px 7px 0px #808080ab;
    }
    .volarimg img{
        width: 60px;
        height: 60px;
        border-radius: 50%;
        max-width: 100%;
    }
    .kickboxing-block1 .topimg-content {
        height: 190px;
        overflow: hidden;
    }
    .btn-addtocart {
        background-color: #ed1b24;
        color: #fff !important;
        text-transform: uppercase;
        border-radius: 10px;
        border: 1px solid #ed1b24;
        text-align: center;
        font-size:10px;
        font-weight: bold;
    }
    #milesnew {
        -webkit-appearance: none;
        -moz-appearance: none;
        background: transparent;
        background-image: url("data:image/svg+xml;utf8,<svg fill='black' height='24' viewBox='0 0 24 24' width='24' xmlns='http://www.w3.org/2000/svg'><path d='M7 10l5 5 5-5z'/><path d='M0 0h24v24H0z' fill='none'/></svg>");
        background-repeat: no-repeat;
        background-position-x: 100%;
        background-position-y: 13px;
        border: 1px solid #dfdfdf;
        border-radius: 2px;
        margin-right: 2rem;
        padding: 1rem;
        padding-right: 2rem;
        border:0;
    }
    #instantbook {
        -webkit-appearance: none;
        -moz-appearance: none;
        background: transparent;
        background-image: url("data:image/svg+xml;utf8,<svg fill='black' height='24' viewBox='0 0 24 24' width='24' xmlns='http://www.w3.org/2000/svg'><path d='M7 10l5 5 5-5z'/><path d='M0 0h24v24H0z' fill='none'/></svg>");
        background-repeat: no-repeat;
        background-position-x: 100%;
        background-position-y: 13px;
        border: 1px solid #dfdfdf;
        border-radius: 2px;
        margin-right: 2rem;
        padding: 1rem;
        padding-right: 2rem;
        border:0;
    }
</style>
<link rel="stylesheet" href="<?php echo Config::get('constants.FRONT_CSS'); ?>compare/style.css">
<link rel="stylesheet" href="<?php echo Config::get('constants.FRONT_CSS'); ?>compare/w3.css">
<link href="https://code.jquery.com/ui/1.12.1/themes/pepper-grinder/jquery-ui.css" type="text/css" rel="stylesheet" />
<script src="<?php echo Config::get('constants.FRONT_JS'); ?>compare/Compare.js"></script>
<script src="<?php echo Config::get('constants.FRONT_JS'); ?>compare/jquery-1.9.1.min.js"></script>
<script src="{{ url('public/js/jquery-ui.min.js') }}"></script>
<script src="{{ url('public/js/jquery-ui.multidatespicker.js') }}"></script>
<section class="direc-hire" style="margin-top:50px">
    @include('includes.search_category_sidebar')
    <div class="direc-right direc-right-new">
        <div class="distance-block">
            
            <?php
            $ZipCode = $Country = "";
            $miles_arr = array('1'=>'1 Mile','3'=>'3 Miles','5'=>'5 Miles','10'=>'10 Miles','15'=>'15 Miles','20'=>'20 Miles');
            ?>
            <select name="distance" id="milesnew">
                <option value="0">max.zoom out</option>
                <option value="1">4.000 km</option>
                <option value="2">2.000 km (world)</option>
                <option value="3">1.000 km</option>
                <option value="4">400 km (continent)</option>
                <option value="5">200 km</option>
                <option value="6">100 km (country)</option>
                <option value="7">50 km</option>
                <option value="8">30 km</option>
                <option value="9">15 km (area)</option>
                <option value="10">8 km</option>
                <option value="11">4 km</option>
                <option value="12">2 km (city)</option>
                <option value="13">1 km</option>
                <option value="14" selected="selected">400 m (district)</option>
                <option value="15">200 m</option>
                <option value="16">100 m</option>
                <option value="17">50 m (street)</option>
                <option value="18">20 m</option>
                <option value="19">10 m</option>
                <option value="20">5 m (house)</option>
                <option value="21">2.5 m</option>
                <option value="">Distance</option>
                <?php /*foreach($miles_arr as $key=>$value) { ?>
                <option value="<?= $key; ?>"><?php echo $value; ?></option>
                <?php }*/ ?>
            </select>
            
            <select name="instantbook" id="instantbook" style="display:none">
                <option value="">Instant Book</option>
                <option>Instant Hire</option>
                <option>Other</option>
            </select>
            
            <div class="mapsb">Show Maps
                <label class="switch" for="maps">
                    <input type="checkbox" name="maps" id="maps" checked>
                    <span class="slider round"></span>
                </label>
            </div>
            <div class="barsb"><img src="{{ url('public/img/bars1.svg') }}"><img src="{{ url('public/img/bars2.svg') }}"></div>
        </div>
        <div class="col-md-8 leftside-kickboxing">
            <div class="col-md-12">
                <?php
                $companyid = $companylogo = $companyname = $companyaddress = "";
                $pay_session = $pay_price = $pay_setduration = $pay_discount = $languages = "";
                if (isset($serviceData)) {
                    $servicetype = [];
                    foreach ($serviceData as $service) {
                        $company = $price = $businessSp = [];
                        $sport_activity = $service['sport_activity'];
                        $servicetype[$service['service_type']] = $service['service_type'];
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
                                    $pay_price = !empty($price['pay_price']) ? $price['pay_price'] : '100';
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
                        ?>
                        <div class="col-md-6 kickboxing-block1">
                            <div class="topimg-content">
                                <?php
                                if (File::exists(public_path("/uploads/profile_pic/thumb/" . $service['profile_pic']))) {
                                    $profilePic = url('/public/uploads/profile_pic/thumb/' . $service['profile_pic']);
                                } else {
                                    $profilePic = '/public/images/default-avatar.png';
                                }
                                ?>
                                <img src="{{ $profilePic }}">
                                <div class="sorttext">
                                    <div class="fromtxt">From #25 - #3000</div>
                                    <div class="claimedtxt">CLAIMED</div>
                                    <div class="favoritetxt"><i class="fa fa-heart-o"></i>FAVORITE</div>
                                </div>
                            </div>
                            <?php
                            if (File::exists(public_path("/uploads/profile_pic/thumb/" . $companylogo))) {
                                $companyLogo = url('/public/uploads/profile_pic/thumb/' . $companylogo);
                            } else {
                                $companyLogo = '/public/images/default-avatar.png';
                            }
                            ?>
                            <div class="bottom-content">
                                <div class="ratset-img">
                                    <div class="rattxt"><i class="fa fa-star" aria-hidden="true"></i> 4.6 (146)</div>
                                    <div class="volarimg"><img src="{{ $companyLogo }}"></div>
                                    <div class="verifiedimg"><img src="/public/images/verified-logo.png"></div>
                                </div>
                                <h3><?= $service['program_name'] ?></h3>
                                <h6><a href="/blade-check/<?=$companyid?>" target="_blank" style="font-size:15px; font-weight:bold; color:red"><?= $companyname ?></a></h6>
                                <p><?= $companyaddress ?></p>
                                <h5><?= $service['sport_activity'] ?> <img src="{{ url('public/img/arrow-down.png') }}"></h5>
                                <hr>
                                <a href="#" class="moredetails-btn" data-toggle="modal" data-target="#mykickboxing<?= $companyid ?>">More Details</a>
                                <p>COMPARE SIMILAR OPTION +</p>
                            </div>
                        </div>
                        @include('jobpost.instanthire_detail')
                        <?php
                    }
                }
                ?>
                @include('jobpost.instanthire_checkout')
                <div class="pagenation" style="display:none">
                    <a href="#" class="active">1</a>
                    <a href="#">2</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 kickboxing_map">
            <div class="maparea">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d24176.251535935986!2d-73.96828678121815!3d40.76133318281456!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c258c4d85a0d8d%3A0x11f877ff0b8ffe27!2sRoosevelt%20Island!5e0!3m2!1sen!2sin!4v1620041765199!5m2!1sen!2sin" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>

<script>
$(document).ready(function () {
    
    $("#milesnew").on("change", function() {
        
        var distance = $(this).val();
        var zipcode = '<?=$ZipCode?>';
        var country = '<?=$Country?>';
        var searchString = "new delhi";
        
        if(zipcode != '' || country != '') {
        searchString = zipcode + '&amp;' + country;
        } else {
        searchString = ($("#exp_city").val() != "") ? $("#exp_city").val() : "new delhi";
        }
    
        var mapURL = "https://maps.google.com/maps?width=400&amp;height=300&amp;hl=en&amp;t=&amp;ie=UTF8&amp;iwloc=B&amp;output=embed";
        mapURL += "&amp;q=" + searchString;
        mapURL += "&amp;z=" + distance;

        var frame = '<iframe id="gmap_iframe" src="' + mapURL + '" style="border:0;" allowfullscreen="" loading="lazy"></iframe>';
        $(".maparea").html(frame);
    });
    
    $(".mapsb .switch .slider").click(function () {
        $(".kickboxing_map").toggleClass("mapskick");
        $(".leftside-kickboxing").toggleClass("kicks");
    });
});

$(document).ready(function () {
    // Close modal on button click
    $(".btn-addtocart").click(function () {
        $(".mykickboxing").modal('hide');
    });
});

$(document).ready(function () {
    // Close modal on button click
    $(".conti").click(function () {
        $(".successAddCart").modal('hide');
    });
});

$(document).on("click", "i.del", function () {
    // to remove card
    $(this).parent().remove();
    // to clear image
    // $(this).parent().find('.imagePreview').css("background-image","url('')");
});

$(function () {
    $(document).on("change", ".uploadFile", function () {
        var uploadFile = $(this);
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader)
            return; // no file selected, or no FileReader support

        if (/^image/.test(files[0].type)) { // only image file
            var reader = new FileReader(); // instance of the FileReader
            reader.readAsDataURL(files[0]); // read the local file

            reader.onloadend = function () { // set image data as background of div
                //alert(uploadFile.closest(".upimage").find('.imagePreview').length);
                uploadFile.closest(".imgUp").find('.imagePreview').css("background-image", "url(" + this.result + ")");
            }
        }

    });
});

$("#viewmore1").click(function () {
    $("#kickboxing1").addClass("intro");
    $("#viewless1").show();
    $("#viewmore1").hide();
});
$("#viewless1").click(function () {
    $("#kickboxing1").removeClass("intro");
    $("#viewless1").hide();
    $("#viewmore1").show();
});
$("#viewmore2").click(function () {
    $("#kickboxing2").addClass("intro1");
    $("#viewless2").show();
    $("#viewmore2").hide();
});
$("#viewless2").click(function () {
    $("#kickboxing2").removeClass("intro1");
    $("#viewless2").hide();
    $("#viewmore2").show();
});
$("#viewmore3").click(function () {
    $("#kickboxing3").addClass("intro2");
    $("#viewless3").show();
    $("#viewmore3").hide();
});
$("#viewless3").click(function () {
    $("#kickboxing3").removeClass("intro2");
    $("#viewless3").hide();
    $("#viewmore3").show();
});

        </script>

        @endsection
        <style>
            a.page-link:focus {
                background-color: #f53b49 !important;
                color: #fff !important;
            }

            li.page-item {
                width: auto !important;
                margin: 0px !important;
                padding: 0px !important;
            }

        </style>
