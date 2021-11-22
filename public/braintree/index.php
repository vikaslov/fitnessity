<?php
include 'db.php';
include 'functions.php';
$session_user_id = 1;
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Credit Card</title>
        <link href="style.css" rel="stylesheet">
        <link rel="icon" type="image/png" href="braintree-icon.png">
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script type="text/javascript" src="js/jquery.creditCardValidator.js"></script>
        <script type="text/javascript" src="js/card.js"></script>
    </head>
    <body>
        <div id="container">
            <h1>BrainTree PayPal Payment Integration with PHP. </h1> 
            <div id="paymentGrid">
                <div style="margin-top:20px">
                <?php
                $cartData=getUserCartDetails($session_user_id);
                foreach ($cartData as $data) {
                    $product_name = $data->product_name;
                    $price = $data->price;
                }

                ?>
                    <table class="items">
                        <thead>
                            <tr>
                                <th class="desc" data-property="CAT_ITEMDESCRIPTION">Item Description</th>
                                <th class="color" data-property="CAT_COLOR">Duration</th>
                                <th class="price" data-property="CAT_PRICE">Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="item in-stock">
                                <td class="item-desc">
                                    <ul>
                                        <li class="img" >
                                            <a href="#">
                                                <img class="prod-img" src="https://www.vikaslov.com/public/images/email/logo_new.png" alt="Fitnessity">
                                            </a><br/>
                                            <b><?=$product_name?></b>
                                        </li>
                                    </ul>
                                </td>
                                <td class="size">1 Year</td>
                                <td class="price">
                                    <span class="offer-price" style="font-weight:bold">$<?=$price?></span>  
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div style="float:left;widht:450px">
                    <form method="post" id="paymentForm">
                        <h4>Payment details</h4>
                        <ul>
                            <li>
                                <label for="card_number">Card Number </label>
                                <input type="text" name="card_number" id="card_number"  maxlength="20" placeholder="1234 5678 9012 3456">
                            </li>
                            <li>
                                <label for="card_name">Name on Card</label>
                                <input type="text" name="card_name" id="card_name" placeholder="Manoj Aswal">
                            </li>
                            <li class="vertical">
                                <ul>
                                    <li>
                                        <label for="expiry_date">Expires</label>
                                        <input type="text" name="expiry_month" id="expiry_month" maxlength="2" placeholder="MM" class="inputLeft marginRight">
                                        <input type="text" name="expiry_year" id="expiry_year" maxlength="2" placeholder="YY" class="inputLeft "><br/>
                                        <span>Month</span> <span style="margin-left:35px">Year</span>
                                    </li>
                                    <li style="text-align:right">
                                        <label for="cvv">CVV</label>
                                        <input type="text" name="cvv" id="cvv" maxlength="3" placeholder="123" class="inputRight">
                                    </li>
                                </ul>
                            </li>
                            <li style="clear:both;">
                                <input type="submit" id="paymentButton" value="Proceed" disabled="disabled" class="disable">
                            </li>
                        </ul>
                    </form>
                </div>
                <div style="float:right;width:340px;margin-top:40px">
                    <div style="margin-bottom:20px">Try these demo numbers</div>
                    <ul id="cards">
                        <li>5105105105105100</li>
                        <li>4111 1111 1111 1210</li>
                        <li>4111 1111 1113 1010</li>
                        <li>4000 0000 0000 0002</li>
                        <li>4026 0000 0000 0002</li>
                        <li>5018 0000 0009</li>
                        <li>5100 0000 0000 0008</li>
                        <li>6011 0000 0000 0004</li>
                    </ul>
                </div>
            </div>
            <div id="orderInfo"></div>
        </div>
    </body>
</html>


