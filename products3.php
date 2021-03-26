<?php
// Login without user Page
    include "config.php";
    echo "login olmadin";
    $give_basket = "INSERT INTO baskets (amount) VALUES(0)";
    $res_basket = mysqli_query($db, $give_basket);
    if($res_basket)
    {
      echo "basket given\n";
    }
    echo "res_basket\n";
    $create_newb = "SELECT MAX(basket_id) as new_basket_id FROM baskets";
    $result =  mysqli_query($db, $create_newb);
    $brow = mysqli_fetch_row($result);
    $basket_id = $brow[0];
    $_SESSION["basket_id"] = $basket_id;
    $_SESSION["name"] = "";
    header('Location: table.php');

?>