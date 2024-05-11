<?php
   include '../components/connect.php';
 if (isset($_GET['productID'])) {
    $product_id = $_GET['productID'];

    // Prepare and execute the delete query
    $delete_product = $conn->prepare("DELETE FROM `cart` WHERE productID = ?");
    $delete_product->execute([$product_id]);



    // Redirect back to the previous page after deletion
    header("Location: {$_SERVER['HTTP_REFERER']}");
    exit;
}
   

?>