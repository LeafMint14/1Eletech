<?php 
include '../components/connect.php';
session_start();

if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
} else {
    $user_id = '';
}

if(isset($_POST['addToCart'])){
    $productID = $_POST['productID']; 
    
    $select_product = $conn->prepare("SELECT * FROM `products` WHERE productID = ?");
    $select_product->execute([$productID]);
    
    if($select_product->rowCount() > 0){
        $fetch_product = $select_product->fetch(PDO::FETCH_ASSOC);
        $name = $fetch_product['name'];
        $price = $fetch_product['price'];
        $image_01 = $fetch_product['image_01'];
        
        $quantity = $_POST['quantity'];
        $totPrice = $quantity * $price;
        
        $insert_products = $conn->prepare("INSERT INTO `cart`(user_id, productID, name, image_01, price, totPrice, quantity) VALUES(?,?,?,?,?,?,?)");
        $insert_products->execute([$user_id, $productID, $name, $image_01, $price, $totPrice, $quantity]);

        // Update product quantity
        $update_product_quantity = $conn->prepare("UPDATE `products` SET quantity = quantity - ? WHERE productID = ?");
        $update_product_quantity->execute([$quantity, $productID]);
    }
}
?>




<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Untree.co">
    <link rel="shortcut icon" href="images/logo.png">

    <meta name="description" content="" />
    <meta name="keywords" content="" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,300;0,400;0,700;1,700&family=Playfair+Display:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/style.css">
    <link href='https://unpkg.com/css.gg@2.0.0/icons/css/log-out.css' rel='stylesheet'>

    <title>Smartphones</title>
</head>

<body>

    <div class="search-form" id="search-form">
        <form action="">
            <input type="search" class="form-control" placeholder="Enter keyword to search...">
            <button class="button">
        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
          <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
        </svg>
      </button>
            <button class="button">
        <div class="close-search">
          <span class="icofont-close js-close-search"></span>
        </div>
      </button>

        </form>
    </div>

    <div class="site-mobile-menu">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close">
                <span class="icofont-close js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>



    <nav class="site-nav mb-5">
        <div class="sticky-nav js-sticky-header">

            <div class="container position-relative">
                <div class="site-navigation text-center dark">
                    <a href="index.php" class="logo menu-absolute m-0">1Eletect<span class="text-primary">.</span></a>

                    <ul class="js-clone-nav pl-0 d-none d-lg-inline-block site-menu">
                        <li><a href="index.php">Home</a></li>
                        <li class="active"><a href="smartphone.php">Smart Phones</a></li>
                        <li><a href="tablet.php">Tablets and Ipads</a></li>
                        <li><a href="watches.php">Smart Watches</a></li>
                        <li><a href="camera.php">Camera</a></li>
                        <li><a href="appliances.php">Smart Appliances</a></li>
                        <style>
                            @import url('https://unpkg.com/css.gg@2.0.0/icons/css/log-out.css');
                        </style>
                    </ul>




                    <div class="menu-icons">

                        <a href="#" class="btn-custom-search" id="btn-search">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
                <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
              </svg>
                        </a>

                        <a href="user_login.php" class="user-profile">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M13 14s1 0 1-1-1-4-6-4-6 3-6 4 1 1 1 1h10zm-9.995-.944v-.002.002zM3.022 13h9.956a.274.274 0 0 0 .014-.002l.008-.002c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664a1.05 1.05 0 0 0 .022.004zm9.974.056v-.002.002zM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
              </svg>
                        </a>

                        <a href="cart.php" class="cart">
                            <?php      $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
            $select_profile->execute([$user_id]);
            if($select_profile->rowCount() > 0){
            $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);

              $select_statement = $conn->prepare("SELECT * FROM cart WHERE user_id = ?");
    $select_statement->execute([$user_id]);
    
    // Count the rows returned
    $row_count = $select_statement->rowCount();
         ?> 
                            <span class="item-in-cart"><?php echo $row_count ?></span>

                            <?php  }?>
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-cart" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
              </svg>
                        </a>



                    </div>

                    <a href="#" class="burger ml-auto float-right site-menu-toggle js-menu-toggle d-inline-block d-lg-none" data-toggle="collapse" data-target="#main-navbar">
                        <span></span>
                    </a>

                </div>
            </div>
        </div>
    </nav>


    <div class="page-heading bg-light">
        <div class="container">
            <div class="row align-items-end text-center">
                <div class="col-lg-7 mx-auto">
                    <h1>Shop</h1>
                    <p class="mb-4"><a href="index.php">Home</a> / <strong>Smart Phones</strong></p>
                </div>
            </div>
        </div>
    </div>

    <div class="untree_co-section pt-3">
        <div class="container">

            <div class="row align-items-center mb-5">
                <div class="col-lg-8">
                    <h2 class="mb-3 mb-lg-0">Brands</h2>
                </div>
                <div class="col-lg-4">

                    <div class="d-flex sort align-items-center justify-content-lg-end">
                        <strong class="mr-3">Sort by:</strong>
                        <form action="#">
                            <select class="" required>
                <option value="">Newest Items</option>
                <option value="1">Best Selling</option>
                <option value="2">Price: Ascending</option>
                <option value="2">Price: Descending</option>
                <option value="3">Rating(High to Low)</option>
              </select>
                        </form>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-md-3">
                    <ul class="list-unstyled categories">
                        <li><a href="#apple">Apple<span>11</span></a></li>
                        <li><a href="#samsung">Samsung<span>8</span></a></li>
                        <li><a href="#xiaomi">Xiaomi<span>7</span></a></li>
                        <li><a href="#oppo">OPPO<span>5</span></a></li>
                        <li><a href="#vivo">VIVO<span>6</span></a></li>
                    </ul>
                </div>
                <div class="col-md-9">
                    <!--APPLE PHONES-->
                    <h2>Apple Iphones</h2>
                    <br>
                    <div class="row">
                    <?php 
     $select_products = $conn->prepare("SELECT * FROM `products` where details_brand = 'Apple' AND details = 'Smart Phones' "); 
     $select_products->execute();
     if($select_products->rowCount() > 0){
      while($fetch_product = $select_products->fetch(PDO::FETCH_ASSOC)){
   ?>
                        <div class="col-6 col-sm-6 col-md-6 mb-4 col-lg-4">
                            
                            <div class="product-item">
                                <!-- Button trigger modal -->
                                <button type="button" class="product-img btn btn-link" data-bs-toggle="modal" data-bs-target="#modal0">
                  
                  <img src="../uploaded_img/<?= $fetch_product['image_01']; ?>" alt="Image" class="img-fluid">
                </button>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span>(5.0)</span>
                                <h3 class="title"><a href="#"><?= $fetch_product['name'] ?></a></h3>
                                <div class="price">
                                    <span>₱ <?= $fetch_product['price'] ?>  </span>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" <?= $fetch_product['productID'] ?> id="modal0" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Specifications</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <ul>
                                            <li>
                                                <h3 class="title"><a href="#">Iphone 15 Pro Max</a></h3>
                                            </li>
                                            <li>
                                  
                                                <span><img src="images/smartphone/apple1.png" alt="Image" class="img-fluid"></span>
                                           <form action=""  method="post">
                                           <div class="price">
                                                    <span id="price">₱ <?php echo   $fetch_product['price']?>  </span>
                                                    <input type="number" value="<?=  $fetch_product['price']?>" id="currentprice">
                                                </div>
                                                <span>
                          <span>Quantity</span>
                                                <span>
                          <div class="d-flex">
                          <div class="buttons" onclick="reducequantity(0)"><center>-</center></div>
                            <span style="margin-top: 10px;" id="quantity">1</span>
                                                <input type="number" name="quantity" value="1" id="currentvalue">
                                                <div class="buttons" onclick="addquantity(0)"><center>+</center></div>
                          </div>
                                                </span>
                                                </span>
                                            </li>
                                            <li>  
                                              
                                            </li>
                                            <li style="position: relative; top: 350px">
                                                <span><h3>Colorway:</h3></span>
                                                <span><button type="button" class="btn btn-outline-dark">Black Titanium</button><button type="button" class="btn btn-outline-dark">White Titanium</button></span>
                                                <span><button type="button" class="btn btn-outline-dark">Blue Titanium</button><button type="button" class="btn btn-outline-dark">Natural Titanium</button></span>
                                            </li>
                                            <li>
                                                <span><h3>Capacity:</h3></span>
                                                <span><button type="button" class="btn btn-outline-dark">256GB 8GB</button><button type="button" class="btn btn-outline-dark">512GB 8GB</button></span>
                                                <span><button type="button" class="btn btn-outline-dark">1TB 8GB</button></span>
                                            </li>
                                        </ul>
                                        <input type="hidden" name="productID">
                                    </div>
                                    <div class="modal-footer">
                                        <a href="cart.php"><button type="submit" name="addToCart" class="btn btn-outline-dark">Add To Cart</button></a>
                                        <a href="checkout.php"><button type="submit" class="btn btn-dark">Buy Now</button></a>
                                           </form>
                                    </div>
                                </div>
                            </div>
                        </div>
<?php 
      }
    }else{
     echo '<h5 class="empty">no products added yet!</h5>';
     }
?>

                       
                        <!--apple1-->

                        <!--apple2-->
                        <div class="col-6 col-sm-6 col-md-6 mb-4 col-lg-4">
                            
                          


                    </div>
                </div>
            </div>
            <br>
            <div id="samsung"></div>
            <br>
            <br>

            <div class="mb-3 mb-lg-0">
                <h2>Samsung Smartphones</h2>
                <br>
                <div class="row">
                <?php 
     $select_products = $conn->prepare("SELECT * FROM `products` where details_brand = 'Samsung' AND details = 'Smart Phones' LIMIT 6 "); 
     $select_products->execute();
     if($select_products->rowCount() > 0){
      while($fetch_product = $select_products->fetch(PDO::FETCH_ASSOC)){
   ?>
                        <div class="col-6 col-sm-6 col-md-6 mb-4 col-lg-4">
                            
                            <div class="product-item">
                                <!-- Button trigger modal -->
                                <button type="button" class="product-img btn btn-link" data-bs-toggle="modal" data-bs-target="#modal0">
                  
                  <img src="../uploaded_img/<?= $fetch_product['image_01']; ?>" alt="Image" class="img-fluid">
                </button>
                          <div style="margin-left: -110px">
                          <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span>(5.0)</span>
                                <h3 class="title"><a href="#"><?= $fetch_product['name'] ?></a></h3>
                                <div class="price">
                                    <span>₱ <?= $fetch_product['price'] ?>  </span>
                                </div>
                          </div>
                            </div>
                        </div>
                        <div class="modal fade" id="modal0" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Specifications</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <ul>
                                            <li>
                                                <h3 class="title"><a href="#">Iphone 15 Pro Max</a></h3>
                                            </li>
                                            <li>
                                                <span><img src="images/smartphone/apple1.png" alt="Image" class="img-fluid"></span>
                                           <form action=""  method="post">
                                           <div class="price">
                                                    <span id="price">₱ <?=  $fetch_product['price']?>  </span>
                                                    <input type="number" value="<?=  $fetch_product['price']?>" id="currentprice">
                                                </div>
                                                <span>
                          <span>Quantity</span>
                                                <span>
                          <div class="d-flex">
                          <div class="buttons" onclick="reducequantity(0)"><center>-</center></div>
                            <span style="margin-top: 10px;" id="quantity">1</span>
                                                <input type="number" name="quantity" value="1" id="currentvalue">
                                                <div class="buttons" onclick="addquantity(0)"><center>+</center></div>
                          </div>
                                                </span>
                                                </span>
                                            </li>
                                            <li>  
                                              
                                            </li>
                                            <li style="position: relative; top: 350px">
                                                <span><h3>Colorway:</h3></span>
                                                <span><button type="button" class="btn btn-outline-dark">Black Titanium</button><button type="button" class="btn btn-outline-dark">White Titanium</button></span>
                                                <span><button type="button" class="btn btn-outline-dark">Blue Titanium</button><button type="button" class="btn btn-outline-dark">Natural Titanium</button></span>
                                            </li>
                                            <li>
                                                <span><h3>Capacity:</h3></span>
                                                <span><button type="button" class="btn btn-outline-dark">256GB 8GB</button><button type="button" class="btn btn-outline-dark">512GB 8GB</button></span>
                                                <span><button type="button" class="btn btn-outline-dark">1TB 8GB</button></span>
                                            </li>
                                        </ul>

                                    </div>
                                    <div class="modal-footer">
                                        <a href="cart.php"><button type="submit" name="addToCart" class="btn btn-outline-dark">Add To Cart</button></a>
                                        <a href="checkout.php"><button type="submit" class="btn btn-dark">Buy Now</button></a>
                                           </form>
                                    </div>
                                </div>
                            </div>
                        </div>
<?php 
      }
    }else{
    echo '<h5 class="empty">no products added yet!</h5>';
     }
?>

                 

                 

                </div>
            </div>
            <br>
            <div id="xiaomi"></div>
            <br>
            <br>
            <!--XIAOMI PHONES-->
            <div class="mb-3 mb-lg-0">
                <h2>Xiaomi Smartphones</h2>
                <br>
                <div class="row">
                <?php 
     $select_products = $conn->prepare("SELECT * FROM `products` where details_brand = 'Xiaomi' AND details = 'Smart Phones' LIMIT 6 "); 
     $select_products->execute();
     if($select_products->rowCount() > 0){
      while($fetch_product = $select_products->fetch(PDO::FETCH_ASSOC)){
   ?>
                        <div class="col-6 col-sm-6 col-md-6 mb-4 col-lg-4">
                            
                            <div class="product-item">
                                <!-- Button trigger modal -->
                                <button type="button" class="product-img btn btn-link" data-bs-toggle="modal" data-bs-target="#modal0">
                  
                  <img src="../uploaded_img/<?= $fetch_product['image_01']; ?>" alt="Image" class="img-fluid">
                </button>
                <div style="margin-left: -110px">
                          <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span>(5.0)</span>
                                <h3 class="title"><a href="#"><?= $fetch_product['name'] ?></a></h3>
                                <div class="price">
                                    <span>₱ <?= $fetch_product['price'] ?>  </span>
                                </div>
                          </div>
                            </div>
                        </div>
                        <div class="modal fade" id="modal0" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Specifications</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <ul>
                                            <li>
                                                <h3 class="title"><a href="#">Iphone 15 Pro Max</a></h3>
                                            </li>
                                            <li>
                                                <span><img src="images/smartphone/apple1.png" alt="Image" class="img-fluid"></span>
                                           <form action=""  method="post">
                                           <div class="price">
                                                    <span id="price">₱ <?=  $fetch_product['price']?>  </span>
                                                    <input type="number" value="<?=  $fetch_product['price']?>" id="currentprice">
                                                </div>
                                                <span>
                          <span>Quantity</span>
                                                <span>
                          <div class="d-flex">
                          <div class="buttons" onclick="reducequantity(0)"><center>-</center></div>
                            <span style="margin-top: 10px;" id="quantity">1</span>
                                                <input type="number" name="quantity" value="1" id="currentvalue">
                                                <div class="buttons" onclick="addquantity(0)"><center>+</center></div>
                          </div>
                                                </span>
                                                </span>
                                            </li>
                                            <li>  
                                              
                                            </li>
                                            <li style="position: relative; top: 350px">
                                                <span><h3>Colorway:</h3></span>
                                                <span><button type="button" class="btn btn-outline-dark">Black Titanium</button><button type="button" class="btn btn-outline-dark">White Titanium</button></span>
                                                <span><button type="button" class="btn btn-outline-dark">Blue Titanium</button><button type="button" class="btn btn-outline-dark">Natural Titanium</button></span>
                                            </li>
                                            <li>
                                                <span><h3>Capacity:</h3></span>
                                                <span><button type="button" class="btn btn-outline-dark">256GB 8GB</button><button type="button" class="btn btn-outline-dark">512GB 8GB</button></span>
                                                <span><button type="button" class="btn btn-outline-dark">1TB 8GB</button></span>
                                            </li>
                                        </ul>

                                    </div>
                                    <div class="modal-footer">
                                        <a href="cart.php"><button type="submit" name="addToCart" class="btn btn-outline-dark">Add To Cart</button></a>
                                        <a href="checkout.php"><button type="submit" class="btn btn-dark">Buy Now</button></a>
                                           </form>
                                    </div>
                                </div>
                            </div>
                        </div>
<?php 
      }
    }else{
      echo '<h5 class="empty">no products added yet!</h5>';
     }
?>


                  

                  

                </div>
            </div>
            <br>
            <div id="oppo"></div>
            <!--OPPO PHONES-->
            <br>
            <br>

            <div class="mb-3 mb-lg-0">
                <h2>OPPO Smartphones</h2>
                <br>
                <div class="row">
                    <!--Oppo1-->
                    <?php 
     $select_products = $conn->prepare("SELECT * FROM `products` where details_brand = 'Oppo' AND details = 'Smart Phones' LIMIT 6 "); 
     $select_products->execute();
     if($select_products->rowCount() > 0){
      while($fetch_product = $select_products->fetch(PDO::FETCH_ASSOC)){
   ?>
                        <div class="col-6 col-sm-6 col-md-6 mb-4 col-lg-4">
                            
                            <div class="product-item">
                                <!-- Button trigger modal -->
                                <button type="button" class="product-img btn btn-link" data-bs-toggle="modal" data-bs-target="#modal0">
                  
                  <img src="../uploaded_img/<?= $fetch_product['image_01']; ?>" alt="Image" class="img-fluid">
                </button>
                <div style="margin-left: -110px">
                          <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span>(5.0)</span>
                                <h3 class="title"><a href="#"><?= $fetch_product['name'] ?></a></h3>
                                <div class="price">
                                    <span>₱ <?= $fetch_product['price'] ?>  </span>
                                </div>
                          </div>
                            </div>
                        </div>
                        <div class="modal fade" id="modal0" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Specifications</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <ul>
                                            <li>
                                                <h3 class="title"><a href="#">Iphone 15 Pro Max</a></h3>
                                            </li>
                                            <li>
                                                <span><img src="images/smartphone/apple1.png" alt="Image" class="img-fluid"></span>
                                           <form action=""  method="post">
                                           <div class="price">
                                                    <span id="price">₱ <?=  $fetch_product['price']?>  </span>
                                                    <input type="number" value="<?=  $fetch_product['price']?>" id="currentprice">
                                                </div>
                                                <span>
                          <span>Quantity</span>
                                                <span>
                          <div class="d-flex">
                          <div class="buttons" onclick="reducequantity(0)"><center>-</center></div>
                            <span style="margin-top: 10px;" id="quantity">1</span>
                                                <input type="number" name="quantity" value="1" id="currentvalue">
                                                <div class="buttons" onclick="addquantity(0)"><center>+</center></div>
                          </div>
                                                </span>
                                                </span>
                                            </li>
                                            <li>  
                                              
                                            </li>
                                            <li style="position: relative; top: 350px">
                                                <span><h3>Colorway:</h3></span>
                                                <span><button type="button" class="btn btn-outline-dark">Black Titanium</button><button type="button" class="btn btn-outline-dark">White Titanium</button></span>
                                                <span><button type="button" class="btn btn-outline-dark">Blue Titanium</button><button type="button" class="btn btn-outline-dark">Natural Titanium</button></span>
                                            </li>
                                            <li>
                                                <span><h3>Capacity:</h3></span>
                                                <span><button type="button" class="btn btn-outline-dark">256GB 8GB</button><button type="button" class="btn btn-outline-dark">512GB 8GB</button></span>
                                                <span><button type="button" class="btn btn-outline-dark">1TB 8GB</button></span>
                                            </li>
                                        </ul>

                                    </div>
                                    <div class="modal-footer">
                                        <a href="cart.php"><button type="submit" name="addToCart" class="btn btn-outline-dark">Add To Cart</button></a>
                                        <a href="checkout.php"><button type="submit" class="btn btn-dark">Buy Now</button></a>
                                           </form>
                                    </div>
                                </div>
                            </div>
                        </div>
<?php 
      }
    }else{
        echo '<h5 class="empty">no products added yet!</h5>';
     }
?>


                   
                 


                </div>
            </div>
            <br>
            <div id="vivo"></div>
            <!--VIVO PHONES-->
            <br>
            <br>

            <div class="mb-3 mb-lg-0">
                <h2>VIVO Smartphones</h2>
                <br>
                <div class="row">
                    <!--VIVO1-->
                    <?php 
     $select_products = $conn->prepare("SELECT * FROM `products` where details_brand = 'Vivo' AND details = 'Smart Phones' LIMIT 6 "); 
     $select_products->execute();
     if($select_products->rowCount() > 0){
      while($fetch_product = $select_products->fetch(PDO::FETCH_ASSOC)){
   ?>
                        <div class="col-6 col-sm-6 col-md-6 mb-4 col-lg-4">
                            
                            <div class="product-item">
                                <!-- Button trigger modal -->
                                <button type="button" class="product-img btn btn-link" data-bs-toggle="modal" data-bs-target="#modal0">
                  
                  <img src="../uploaded_img/<?= $fetch_product['image_01']; ?>" alt="Image" class="img-fluid">
                </button>
                              <div style="margin-left: -110px">
                          <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span>(5.0)</span>
                                <h3 class="title"><a href="#"><?= $fetch_product['name'] ?></a></h3>
                                <div class="price">
                                    <span>₱ <?= $fetch_product['price'] ?>  </span>
                                </div>
                          </div>
                            </div>
                        </div>
                        <div class="modal fade" id="modal0" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Specifications</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <ul>
                                            <li>
                                                <h3 class="title"><a href="#">Iphone 15 Pro Max</a></h3>
                                            </li>
                                            <li>
                                                <span><img src="images/smartphone/apple1.png" alt="Image" class="img-fluid"></span>
                                           <form action=""  method="post">
                                           <div class="price">
                                                    <span id="price">₱ <?=  $fetch_product['price']?>  </span>
                                                    <input type="number" value="<?=  $fetch_product['price']?>" id="currentprice">
                                                </div>
                                                <span>
                          <span>Quantity</span>
                                                <span>
                          <div class="d-flex">
                          <div class="buttons" onclick="reducequantity(0)"><center>-</center></div>
                            <span style="margin-top: 10px;" id="quantity">1</span>
                                                <input type="number" name="quantity" value="1" id="currentvalue">
                                                <div class="buttons" onclick="addquantity(0)"><center>+</center></div>
                          </div>
                                                </span>
                                                </span>
                                            </li>
                                            <li>  
                                              
                                            </li>
                                            <li style="position: relative; top: 350px">
                                                <span><h3>Colorway:</h3></span>
                                                <span><button type="button" class="btn btn-outline-dark">Black Titanium</button><button type="button" class="btn btn-outline-dark">White Titanium</button></span>
                                                <span><button type="button" class="btn btn-outline-dark">Blue Titanium</button><button type="button" class="btn btn-outline-dark">Natural Titanium</button></span>
                                            </li>
                                            <li>
                                                <span><h3>Capacity:</h3></span>
                                                <span><button type="button" class="btn btn-outline-dark">256GB 8GB</button><button type="button" class="btn btn-outline-dark">512GB 8GB</button></span>
                                                <span><button type="button" class="btn btn-outline-dark">1TB 8GB</button></span>
                                            </li>
                                        </ul>

                                    </div>
                                    <div class="modal-footer">
                                        <a href="cart.php"><button type="submit" name="addToCart" class="btn btn-outline-dark">Add To Cart</button></a>
                                        <a href="checkout.php"><button type="submit" class="btn btn-dark">Buy Now</button></a>
                                           </form>
                                    </div>
                                </div>
                            </div>
                        </div>
<?php 
      }
    }else{
       echo '<h5 class="empty">no products added yet!</h5>';
     }
?>


                  
                </div>
            </div>
            <br>
            <br>
            <br>

        </div>
    </div>
    <!-- /.untree_co-section -->

    <div class="untree_co-section">
        <div class="container">
            <div class="row mb-5 align-items-center">
                <div class="col-md-6">
                    <h2 class="h3">Popular Items</h2>
                </div>
                <div class="col-sm-6 carousel-nav text-sm-right">
                    <a href="#" class="prev js-custom-prev-v2">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-left-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                <path fill-rule="evenodd" d="M8.354 11.354a.5.5 0 0 0 0-.708L5.707 8l2.647-2.646a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708 0z"/>
                <path fill-rule="evenodd" d="M11.5 8a.5.5 0 0 0-.5-.5H6a.5.5 0 0 0 0 1h5a.5.5 0 0 0 .5-.5z"/>
              </svg>
                    </a>
                    <a href="#" class="next js-custom-next-v2">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-right-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                <path fill-rule="evenodd" d="M7.646 11.354a.5.5 0 0 1 0-.708L10.293 8 7.646 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0z"/>
                <path fill-rule="evenodd" d="M4.5 8a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5z"/>
              </svg>
                    </a>
                </div>
            </div>
            <!-- /.heading -->
            <div class="owl-3-slider owl-carousel">
                <div class="item">
                    <div class="product-item">
                        <a href="smartphone.php" class="product-img">

                            <img src="images/smartphone/apple1.png" alt="Image" class="img-fluid">
                        </a>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span>(5.0)</span>
                        <h3 class="title"><a href="#">Iphone 15 Pro Max</a></h3>
                        <div class="price">
                            <span>₱84,990.00  </span>
                        </div>
                    </div>
                </div>
                <!-- /.item -->


                <div class="item">
                    <div class="product-item">
                        <a href="smartphone.php" class="product-img">

                            <img src="images/smartphone/samsung1.png" alt="Image" class="img-fluid">
                        </a>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span>(5.0)</span>
                        <h3 class="title"><a href="#">Samsung Galaxy S24 Ultra</a></h3>
                        <div class="price">
                            <span>₱84,990.00  </span>
                        </div>
                    </div>
                </div>
                <!-- /.item -->


                <div class="item">
                    <div class="product-item">
                        <a href="smartphone.php" class="product-img">

                            <img src="images/smartphone/xiaomi1.png" alt="Image" class="img-fluid">
                        </a>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span>(5.0)</span>
                        <h3 class="title"><a href="#">Xiaomi Mi 11</a></h3>
                        <div class="price">
                            <span>₱12,999.00   </span>
                        </div>
                    </div>
                </div>
                <!-- /.item -->

                <div class="item">
                    <div class="product-item">
                        <a href="smartphone.php" class="product-img">

                            <img src="images/smartphone/oppo1.png" alt="Image" class="img-fluid">
                        </a>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span>(5.0)</span>
                        <h3 class="title"><a href="#">Oppo Reno10 5G</a></h3>
                        <div class="price">
                            <span>₱23,999.00 </span>
                        </div>
                    </div>
                </div>
                <!-- /.item -->

                <div class="item">
                    <div class="product-item">
                        <a href="smartphone.php" class="product-img">

                            <img src="images/smartphone/vivo1.png" alt="Image" class="img-fluid">
                        </a>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span>(5.0)</span>
                        <h3 class="title"><a href="#">Vivo V29e</a></h3>
                        <div class="price">
                            <span>₱18,999.00   </span>
                        </div>
                    </div>
                </div>
                <!-- /.item -->

            </div>
        </div>
        <!-- /.container -->
    </div>
    <!-- /.untree_co-section -->
    <br>
    <br>
    <br>
    <div class="untree_co-section bg-light">
        <div class="container">
            <div class="row align-items-stretch">
                <div class="col-12 col-sm-6 col-md-4 mb-3 mb-md-0">
                    <div class="feature h-100">
                        <div class="icon mb-4">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-truck" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5v7h-1v-7a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .5.5v1A1.5 1.5 0 0 1 0 10.5v-7zM4.5 11h6v1h-6v-1z"/>
                  <path fill-rule="evenodd" d="M11 5h2.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5h-1v-1h1a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4.5h-1V5zm-8 8a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 1a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/>
                  <path fill-rule="evenodd" d="M12 13a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 1a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/>
                </svg>
                        </div>
                        <h3>Worldwide Delivery</h3>
                        <p>Far far away, behind the word mountains, far from the countries.</p>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 mb-3 mb-md-0">
                    <div class="feature h-100">
                        <div class="icon mb-4">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-shield-lock" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M5.443 1.991a60.17 60.17 0 0 0-2.725.802.454.454 0 0 0-.315.366C1.87 7.056 3.1 9.9 4.567 11.773c.736.94 1.533 1.636 2.197 2.093.333.228.626.394.857.5.116.053.21.089.282.11A.73.73 0 0 0 8 14.5c.007-.001.038-.005.097-.023.072-.022.166-.058.282-.111.23-.106.525-.272.857-.5a10.197 10.197 0 0 0 2.197-2.093C12.9 9.9 14.13 7.056 13.597 3.159a.454.454 0 0 0-.315-.366c-.626-.2-1.682-.526-2.725-.802C9.491 1.71 8.51 1.5 8 1.5c-.51 0-1.49.21-2.557.491zm-.256-.966C6.23.749 7.337.5 8 .5c.662 0 1.77.249 2.813.525a61.09 61.09 0 0 1 2.772.815c.528.168.926.623 1.003 1.184.573 4.197-.756 7.307-2.367 9.365a11.191 11.191 0 0 1-2.418 2.3 6.942 6.942 0 0 1-1.007.586c-.27.124-.558.225-.796.225s-.526-.101-.796-.225a6.908 6.908 0 0 1-1.007-.586 11.192 11.192 0 0 1-2.417-2.3C2.167 10.331.839 7.221 1.412 3.024A1.454 1.454 0 0 1 2.415 1.84a61.11 61.11 0 0 1 2.772-.815z"/>
                  <path d="M9.5 6.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                  <path d="M7.411 8.034a.5.5 0 0 1 .493-.417h.156a.5.5 0 0 1 .492.414l.347 2a.5.5 0 0 1-.493.585h-.835a.5.5 0 0 1-.493-.582l.333-2z"/>
                </svg>
                        </div>
                        <h3>Secure Payments</h3>
                        <p>Far far away, behind the word mountains, far from the countries.</p>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 mb-3 mb-md-0">
                    <div class="feature h-100">
                        <div class="icon mb-4">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-counterclockwise" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M12.83 6.706a5 5 0 0 0-7.103-3.16.5.5 0 1 1-.454-.892A6 6 0 1 1 2.545 5.5a.5.5 0 1 1 .91.417 5 5 0 1 0 9.375.789z"/>
                  <path fill-rule="evenodd" d="M7.854.146a.5.5 0 0 0-.708 0l-2.5 2.5a.5.5 0 0 0 0 .708l2.5 2.5a.5.5 0 1 0 .708-.708L5.707 3 7.854.854a.5.5 0 0 0 0-.708z"/>
                </svg>
                        </div>
                        <h3>Simple Returns</h3>
                        <p>Far far away, behind the word mountains, far from the countries.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.untree_co-section -->
    <div class="back">
        <a href="smartphone.php">
            <h5>Back to top</h5>
        </a>
    </div>

    <div class="site-footer">


        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-5">
                    <div class="widget mb-4">
                        <h3 class="mb-2">About 1Eletect</h3>
                        <p>At our company, we specialize in providing cutting-edge gadgets and appliances designed to enhance modern living. From sleek smartphones to innovative kitchen appliances, we offer a diverse range of products that combine functionality
                            with style. Our commitment to quality ensures that each item is crafted with the latest technology, delivering unparalleled performance and reliability. Whether you're seeking entertainment, convenience, or efficiency, our
                            collection of gadgets and appliances is tailored to meet your needs and elevate your lifestyle.</p>
                    </div>
                    <div class="widget">
                        <h3>Join our mailing list and receive exclusives</h3>
                        <form action="#" class="subscribe">
                            <div class="d-flex">
                                <input type="email" class="form-control" placeholder="Email address">
                                <input type="submit" class="btn btn-black" value="Subscribe">
                            </div>
                        </form>


                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="widget">
                        <h3>Help</h3>
                        <ul class="list-unstyled">
                            <li><a href="contact.php">Contact us</a></li>
                            <li><a href="#">Account</a></li>
                            <li><a href="#">Shipping</a></li>
                            <li><a href="#">Returns</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="widget">
                        <h3>About</h3>
                        <ul class="list-unstyled">
                            <li><a href="about.php">About us</a></li>
                            <li><a href="about.php">Careers</a></li>
                            <li><a href="about.php">Team</a></li>
                            <li><a href="about.php">FAQ</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="widget">
                        <h3>Products</h3>
                        <ul class="list-unstyled">
                            <li><a href="smartphone.php">SmartPhones</a></li>
                            <li><a href="tablet.php">Tablets and Ipads</a></li>
                            <li><a href="watches.php">Watches</a></li>
                            <li><a href="camera.php">Camera</a></li>
                            <li><a href="appliances.php">Smart Appliances</a></li>
                        </ul>
                    </div>
                </div>

            </div>


            <div class="row mt-5">
                <div class="col-12 text-center">
                    <ul class="list-unstyled social">
                        <li><a href="#"><span class="icon-facebook"></span></a></li>
                        <li><a href="#"><span class="icon-instagram"></span></a></li>
                        <li><a href="#"><span class="icon-twitter"></span></a></li>
                    </ul>
                </div>
                <div class="col-12 text-center copyright">
                    <p>Copyright &copy;
                        <script>
                            document.write(new Date().getFullYear());
                        </script>. All Rights Reserved. &mdash; Designed with love by <a href="index.php">1Eletect</a>
                    </p>

                </div>
            </div>
        </div>
        <!-- /.container -->
    </div>
    <!-- /.site-footer -->

    <div id="overlayer"></div>
    <div class="loader">
        <div class="spinner-border" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>

    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.fancybox.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/custom.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>