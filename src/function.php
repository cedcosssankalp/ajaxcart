<?php
session_start();
include "config.php";
if ($_REQUEST["action"] == "add") {
    $id = $_POST["id"];
    addCart($id);
    echo json_encode($_SESSION["cart"]);
}
if ($_REQUEST["action"] == "delete") {
    $id = $_POST["id"];
    
    deleteCart($id);
    echo json_encode($_SESSION["cart"]);
}
function deleteCart($id)
{
    for ($i = 0; $i < count($_SESSION["cart"]); $i++) {
        if ($_SESSION["cart"][$i]["id"] == $id) {
            echo $id ;
            array_splice($_SESSION["cart"], $i, 1);
        }
    }
}
deleteCart(105);
