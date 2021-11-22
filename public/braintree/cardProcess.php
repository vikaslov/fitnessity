<?php

include 'db.php';
include 'functions.php';
//$price=$_SESSION['session_price'];
$session_user_id = 1;
$price = 22;

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['card_number']) && !empty($_POST['card_name']) && !empty($_POST['expiry_month']) && !empty($_POST['expiry_year']) && !empty($_POST['cvv'])) {
    $card_number = str_replace("+", "", $_POST['card_number']);
    $card_name = $_POST['card_number'];
    $expiry_month = $_POST['expiry_month'];
    $expiry_year = $_POST['expiry_year'];
    $cvv = $_POST['cvv'];
    $expirationDate = $expiry_month . '/' . $expiry_year;

    require_once 'braintree/Braintree.php';
    Braintree_Configuration::environment('sandbox');
    Braintree_Configuration::merchantId('yhbkg3hm4b2dpvrh');
    Braintree_Configuration::publicKey('nyjsfb3vvn49ytnm');
    Braintree_Configuration::privateKey('58c770b3178978bf49873c383f693c0b');

    $result = Braintree_Transaction::sale(array(
        'amount' => $price,
        'creditCard' => array(
        'number' => $card_number,
        'cardholderName' => $card_name,
        'expirationDate' => $expirationDate,
        'cvv' => $cvv
        )
    ));

    print_r($result);

    if ($result->success) {
    //print_r("success!: " . $result->transaction->id);
        if ($result->transaction->id) {
            $braintreeCode = $result->transaction->id;
            $amount = $result->transaction->amount;
            updateUserOrder($braintreeCode, $session_user_id, $amount);
        }
        //echo json_encode($result->transaction);
    } else if ($result->transaction) {
        echo '{"OrderStatus": [{"status":"2"}]}';
    } else {
        echo '{"OrderStatus": [{"status":"0"}]}';
    }
}
?>
