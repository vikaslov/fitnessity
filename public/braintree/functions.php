<?php

function getUserCartDetails($session_user_id) {
    
    $db = getDB();
    $sql = "SELECT P.product_name,P.price FROM braintree_users U, braintree_cart C, braintree_products P WHERE U.user_id=C.user_id_fk AND P.product_id = C.product_id_fk AND C.user_id_fk=:user_id AND C.cart_status='0'";
    $stmt = $db->prepare($sql);
    $stmt->bindParam("user_id", $session_user_id);
    $stmt->execute();
    $getUserCartDetails = $stmt->fetchAll(PDO::FETCH_OBJ);
    $db = null;
    //echo '{"getUserCartDetails": ' . json_encode($getUserCartDetails) . '}';
    return $getUserCartDetails;
}

function updateUserOrder($braintreeCode, $session_user_id, $amount) {
    $db = getDB();
    $sql = "INSERT INTO braintree_orders(user_id_fk,created,braintreeCode,price)VALUES(:user_id,:created,:braintreeCode,:price)";
    $stmt = $db->prepare($sql);
    $stmt->bindParam("user_id", $session_user_id);
    $time = time();
    $stmt->bindParam("created", $time);
    $stmt->bindParam("braintreeCode", $braintreeCode);
    $stmt->bindParam("price", $amount);
    $stmt->execute();

    $sql1 = "SELECT order_id FROM braintree_orders WHERE user_id_fk=:user_id ORDER BY order_id DESC LIMIT 1";
    $stmt1 = $db->prepare($sql1);
    $stmt1->bindParam("user_id", $session_user_id);
    $stmt1->execute();
    $OrderDetails = $stmt1->fetchAll(PDO::FETCH_OBJ);
    $order_id = $OrderDetails[0]->order_id;

    $sql2 = "UPDATE braintree_cart SET order_id_fk=:order_id,cart_status='1' WHERE cart_status='0' AND user_id_fk=:user_id";
    $stmt2 = $db->prepare($sql2);
    $stmt2->bindParam("user_id", $session_user_id);
    $stmt2->bindParam("order_id", $order_id);
    $stmt2->execute();
    $db = null;

    echo '{"OrderStatus": [{"status":"1", "orderID":"' . $order_id . '"}]}';
}

?>