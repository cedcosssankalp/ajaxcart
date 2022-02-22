<?php
session_start();
$products = json_decode('[{"id":101,"name":"Basket Ball","image":"basketball.png","price":150},
{"id":102,"name":"Football","image":"football.png","price":120},
{"id":103,"name":"Soccer","image":"soccer.png","price":110},
{"id":104,"name":"Table Tennis","image":"table-tennis.png","price":130},
{"id":105,"name":"Tennis","image":"tennis.png","price":100}]', true);


function addCart($id)
{
  global $products;
  for ($i = 0; $i < count($products); $i++) {
    if (!alreadyPresent($id)) {
      if ($products[$i]["id"] == $id) {
        array_push($_SESSION["cart"], $products[$i]);
      }
    }
  }
}
function alreadyPresent($pId)
{
  foreach ($_SESSION["cart"] as $key) {
    if ($pId == $key["id"]) {
      return true;
    } else {
      return false;
    }
  }
}
