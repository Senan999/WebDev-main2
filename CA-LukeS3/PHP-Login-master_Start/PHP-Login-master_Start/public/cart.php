<?php
//Setting session start
session_start();

$total=0;

//Used PDO
$conn = new PDO("mysql:host=localhost;dbname=test", 'root', 'rm1tagE');



$action = isset($_GET['action'])?$_GET['action']:"";

//Add to cart
if($action=='addcart' && $_SERVER['REQUEST_METHOD']=='POST') {

    //Finding the product by ID
    $query = "SELECT * FROM productList WHERE id=:id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam('id', $_POST['id']);
    $stmt->execute();
    $product = $stmt->fetch();

    $currentQty = $_SESSION['productName'][$_POST['id']]['qty']+1; //Incrementing the product qty in cart
    $_SESSION['productName'][$_POST['id']] =array('qty'=>$currentQty,'name'=>$product['name'],'price'=>$product['price']);
    $product='';
    header("Location:cart.php");
}

//Empty all products from cart
if($action=='emptyall') {
    $_SESSION['products'] =array();
    header("Location:shopping-cart.php");
}

//Empty one by one
if($action=='empty') {
    $id = $_GET['id'];
    $productName = $_SESSION['products'];
    unset($products[$id]);
    $_SESSION['products']= $productName;
    header("Location:cart.php");
}