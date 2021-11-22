<div id="successAddCart" class="successAddCart modal successaddcart-block" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h3 class="modal-title" id="exampleModalLabel">SUCCESSFULLY ADD TO YOUR CART</h3>
            </div>
            
            <div class="modal-body">
                <?php /*
                <div class="col-md-4">
                    <div class="connect-boxsuccadd">
                        <h5>Connect With <?=$companyname?></h5>
                        <div class="d-flex align-items-center">
                            <img src="{{ $companyLogo }}">
                            <h5><?=$companyname?></h5>
                        </div>
                        <div class="iconsuccadd">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            <i class="fa fa-comment" aria-hidden="true"></i>
                        </div>
                        <p>Just Added: (1 item) $<?=$pay_price?> <br/> Previously Added: (5 items) $,1000</p>
                        <p><b>Cart Subtotal</b>: (6 items) $2,500</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="imgsuccadd">
                        <img src="{{ $profilePic }}">
                        <a href="/instant-hire">Continue Shopping</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="connect-boxsuccadd1">
                        <h5><?= $service['program_name'] ?></h5>
                        <p>Price: $<?=$pay_price?></p>
                        <p>Payment Type: <?=$pay_session?> Sessions</p>
                        <p>Date Reserved: <?=date('l jS \of F Y')?></p>
                        <p>Reserved for Time: <?= $service['mon_shift_start'] ?> - <?= $service['mon_shift_end'] ?></p>
                        <p>Service: <?= $service['service_type'] ?></p>
                        <p>Duration: <?= $service['mon_duration'] ?></p>
                        <p>Activity Location: <?= $service['activity_location'] ?></p>
                        <p>Group Size: <?= $service['group_size'] ?></p>
                        <p>Great For: <?= $service['activity_for'] ?></p>
                        <p>Age: <?= $service['age_range'] ?></p>
                        <p>language: <?=$languages?></p>
                        <p>Skill Level: <?= $service['difficult_level'] ?></p>
                        <a href="{{ Config::get('constants.SITE_URL') }}/instant-hire/cart-payment?cid=<?=$companyid?>" class="btn btn-web-btn">View Cart & Checkout</a>
                    </div>
                </div>
                */ ?>
                
                <div class="col-md-12">
                    <div id="shopping-cart">
                    <div class="txt-heading">Shopping Cart</div>
                    <a id="btnEmpty" href="/instant-hire?action=empty">Empty Cart</a>
                    <?php
                    //unset($_SESSION["cart_item"]);
                    if(isset($_SESSION["cart_item"])){
                        $total_quantity = 0;
                        $total_price = 0;
                    ?>	
                    <table class="tbl-cart" cellpadding="10" cellspacing="1">
                    <tbody>
                    <tr>
                    <th style="text-align:left;">Name</th>
                    <th style="text-align:left;">Type</th>
                    <th style="text-align:right;" width="5%">Quantity</th>
                    <th style="text-align:right;" width="10%">Unit Price</th>
                    <th style="text-align:right;" width="10%">Price</th>
                    <th style="text-align:center;" width="5%">Remove</th>
                    </tr>	
                    <?php
                        foreach ($_SESSION["cart_item"] as $item){
                            $item_price = (int)$item["quantity"]*(float)$item["price"];
                            if (File::exists(public_path("/uploads/profile_pic/thumb/" . $item['image']))) {
                                $profilePic = url('/public/uploads/profile_pic/thumb/' . $item['image']);
                            } else {
                                $profilePic = '/public/images/default-avatar.png';
                            }
                            ?>
                            <tr>
                            <td><img src="<?= $profilePic ?>" class="cart-item-image" /><?= $item["name"]; ?></td>
                            <td><?= $item["type"]; ?></td>
                            <td style="text-align:right;"><?= $item["quantity"]; ?></td>
                            <td  style="text-align:right;"><?= "$ ".$item["price"]; ?></td>
                            <td  style="text-align:right;"><?= "$ ". number_format($item_price,2); ?></td>
                            <td style="text-align:center;"><a href="/instant-hire?action=remove&code=<?= $item["code"]; ?>" class="btnRemoveAction"><i class="fa fa-trash" title="Remove Item"></i></a></td>
                            </tr>
                            <?php
                            $total_quantity += (int)$item["quantity"];
                            $total_price += ((int)$item["quantity"]*(float)$item["price"]);
                         
                        }
                        ?>
                    <tr>
                    <td colspan="2" align="right">Total:</td>
                    <td align="right"><?php echo $total_quantity; ?></td>
                    <td align="right" colspan="2"><strong><?php echo "$ ".number_format($total_price, 2); ?></strong></td>
                    <td></td>
                    </tr>
                    </tbody>
                    </table>		
                      <?php
                    } else {
                    ?>
                    <div class="no-records">Your Cart is Empty</div>
                    <?php 
                    }
                    ?>
                    </div>
                </div>
                <div class="col-md-12 text-right">
                    <a href="{{ Config::get('constants.SITE_URL') }}/instant-hire/cart-payment?cid=<?=$companyid?>" class="btn btn-addtocart" style="margin-right:30px">View Cart & Checkout</a>
                </div>
                
                <div class="discover-block">
                    <h3 class="distitle">DISCOVER MORE BELOW</h3>
                    <h5 class="sldertitle">View Other Activities <a href="/instant-hire">View All</a> </h5>
                    <div id="carousel-reviews" class="carousel kickboxing-slider slide" data-ride="carousel">
                        <div class="carousel-inner">
                        <?php
                        $companyid = $companylogo = $companyname = $companyaddress = "";
                        $pay_session = $pay_price = $pay_setduration = $pay_discount = $languages = "";
                        if(isset($serviceData)) {
                        $divId=1;
                        foreach($serviceData as $key => $service) {
                        $company = $price = $businessSp = [];
                        if(isset($companyData)) {
                            if(isset($companyData[$service['cid']]) && !empty($companyData[$service['cid']])) {
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
                        
                        if($divId==1) {
                            echo ($divId%3 == 1)?'<div class="item active">':'';
                        } else {
                            echo ($divId%3 == 1)?'<div class="item">':'';
                        }
                        ?>
  
                            <div class="col-md-4 col-sm-6">
                                <div class="kickboxing-slider-block item">
                                    <div class="kickboxing-block1">
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
                                            <h6><?= $companyname ?></h6>
                                            <p><?= $companyaddress ?></p>
                                            <h5><?= $service['sport_activity'] ?> <img src="{{ url('public/img/arrow-down.png') }}"></h5>
                                            <hr>
                                            <a href="#" class="moredetails-btn" data-toggle="modal" data-target="#mykickboxing<?= $companyid ?>">More Details</a>
                                            <p>COMPARE SIMILAR OPTION +</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?=($divId%3 == 0)?'</div>':''?>
                        <?php $divId++;} ?>
                        <?=($divId%3 != 1)?'</div>':''?>
                        <?php } ?>
                        
                        </div>
                        <a class="left carousel-control" href="#carousel-reviews" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                        </a>
                        <a class="right carousel-control" href="#carousel-reviews" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right"></span>
                        </a>
                    </div>

                    <h5 class="sldertitle">Explore Products <a href="/instant-hire">View All</a> </h5>
                    <div id="carousel-reviews" class="carousel kickboxing-slider slide" data-ride="carousel">
                        <div class="carousel-inner">
                        <?php
                        $companyid = $companylogo = $companyname = $companyaddress = "";
                        $pay_session = $pay_price = $pay_setduration = $pay_discount = $languages = "";
                        if(isset($serviceData)) {
                        foreach($serviceData as $key => $service) {
                        $company = $price = $businessSp = [];
                        if(isset($companyData)) {
                            if(isset($companyData[$service['cid']]) && !empty($companyData[$service['cid']])) {
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
                        ?>
                        <div class="item <?= ($key==0)?'active':'' ?>">
                            <div class="col-md-4 col-sm-6">
                                <div class="kickboxing-slider-block item">
                                    <div class="kickboxing-block1">
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
                                            <h6><?= $companyname ?></h6>
                                            <p><?= $companyaddress ?></p>
                                            <h5><?= $service['sport_activity'] ?> <img src="{{ url('public/img/arrow-down.png') }}"></h5>
                                            <hr>
                                            <a href="#" class="moredetails-btn">More Details</a>
                                            <p>COMPARE SIMILAR OPTION +</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php }} ?>
                        </div>
                        <a class="left carousel-control" href="#carousel-reviews" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                        </a>
                        <a class="right carousel-control" href="#carousel-reviews" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right"></span>
                        </a>
                    </div>

                    <h5 class="sldertitle">Booking History: Book item again <a href="#">View All</a> </h5>
                    <div class="kickboxing-slider kickboxing-slider1">
                        <h4>No History</h4>
                    </div>
                    <h5 class="sldertitle">Your Save For Later Items <a href="#">View All</a> </h5>
                    <div class="kickboxing-slider kickboxing-slider1">
                        <h4>No History</h4>
                    </div>
                    <hr style="border-bottom:1px solid #000;">
                    <h5 class="sldertitle">Your Recently View Items <a href="#">View All</a> </h5>
                    <div class="kickboxing-slider kickboxing-slider1">
                        <h4>No History</h4>
                    </div>
                    <h5 class="sldertitle">View Similar Items from other providers <a href="#">View All</a> </h5>
                    <div class="kickboxing-slider kickboxing-slider1">
                        <h4>No History</h4>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div> 