<?php

include '../components/connect.php';
session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};



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




    <title>1Eletect</title>
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
                        <li class="active"><a href="index.php">Home</a></li>
                        <li><a href="smartphone.php">Smart Phones</a></li>
                        <li><a href="tablet.php">Tablets and Ipads</a></li>
                        <li><a href="watches.php">Smart Watches</a></li>
                        <li><a href="camera.php">Camera</a></li>
                        <li><a href="appliances.php">Smart Appliances</a></li>
                        <li><a href="../components/user_logout.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
							<path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z"/>
							<path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z"/>
						  </svg></a></li>

                    </ul>

                    <div class="menu-icons">
   <?php
            $count_wishlist_items = $conn->prepare("SELECT * FROM `wishlist` WHERE user_id = ?");
            $count_wishlist_items->execute([$user_id]);
            $total_wishlist_counts = $count_wishlist_items->rowCount();

            $count_cart_items = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
            $count_cart_items->execute([$user_id]);
            $total_cart_counts = $count_cart_items->rowCount();
         ?>
                        <a href="#" class="btn-custom-search" id="btn-search">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
								<path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
							</svg>
                        </a>
                        <?php          
            $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
            $select_profile->execute([$user_id]);
            if($select_profile->rowCount() > 0){
            $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);

              $select_statement = $conn->prepare("SELECT * FROM cart WHERE user_id = ?");
    $select_statement->execute([$user_id]);
    
    // Count the rows returned
    $row_count = $select_statement->rowCount();
         ?> 
            <a href="#" class="user-profile">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd" d="M13 14s1 0 1-1-1-4-6-4-6 3-6 4 1 1 1 1h10zm-9.995-.944v-.002.002zM3.022 13h9.956a.274.274 0 0 0 .014-.002l.008-.002c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664a1.05 1.05 0 0 0 .022.004zm9.974.056v-.002.002zM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
							</svg>
                        </a>
                     <span style="color:black; font-weight:bold; margin-left: -20px; margin-right:10px">  <?php echo $fetch_profile['name'] ?></span>
                        <a href="cart.php" class="cart">
                            
                            <span class="item-in-cart"><?php echo $row_count ?></span>
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-cart" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd" d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
							</svg>
                        </a>
         <?php 
           }else{
         ?>
      


                        <a href="user_login.php" class="user-profile">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd" d="M13 14s1 0 1-1-1-4-6-4-6 3-6 4 1 1 1 1h10zm-9.995-.944v-.002.002zM3.022 13h9.956a.274.274 0 0 0 .014-.002l.008-.002c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664a1.05 1.05 0 0 0 .022.004zm9.974.056v-.002.002zM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
							</svg>
                        </a>
                        <a href="cart.php" class="cart">
                            <span class="item-in-cart">0</span>
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-cart" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd" d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
							</svg>
                        </a>
                        <a href="/PHP/logout.php" class="cart">
                   
                        <?php
            }
         ?>    
                       

                        </a>


              




                    </div>

                    <a href="#" class="burger ml-auto float-right site-menu-toggle js-menu-toggle d-inline-block d-lg-none" data-toggle="collapse" data-target="#main-navbar">
                        <span></span>
                    </a>

                </div>
            </div>
        </div>
    </nav>


    <div class="owl-carousel owl-single home-slider">
        <div class="item">
            <div class="untree_co-hero" style="background-image: url('images/carousel1.avif');">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6">

                            <h1 class="mb-4 heading" data-aos="fade-up" data-aos-delay="100">Your pocket-sized powerhouse, the smartest tool you'll ever own. <br><a href="about.php">1Eletect</a></h1>
                            <div class="mb-5 text-white desc mx-auto" data-aos="fade-up" data-aos-delay="200">
                            </div>

                            <p class="mb-0" data-aos="fade-up" data-aos-delay="300"><a href="smartphone.php" class="btn btn-outline-black">Buy now</a></p>

                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="item">
            <div class="untree_co-hero" style="background-image: url('images/carousel2.avif');">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6">

                            <h1 class="mb-4 heading" data-aos="fade-up" data-aos-delay="100">Efficiency meets innovation in every appliances. <br> <a href="about.php">1Eletect</a></h1>
                            <div class="mb-5 text-white desc mx-auto" data-aos="fade-up" data-aos-delay="200">
                            </div>

                            <p class="mb-0" data-aos="fade-up" data-aos-delay="300"><a href="appliances.php" class="btn btn-outline-black">Buy now</a></p>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="item">
            <div class="untree_co-hero" style="background-image: url('images/carousel3.avif');">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6">

                            <h1 class="mb-4 heading" data-aos="fade-up" data-aos-delay="100">Capture life's moments with clarity and precision-your story, beautifully framed. <br><a href="about.php">1Eletect</a></h1>
                            <div class="mb-5 text-white desc mx-auto" data-aos="fade-up" data-aos-delay="200">
                            </div>

                            <p class="mb-0" data-aos="fade-up" data-aos-delay="300"><a href="camera.php" class="btn btn-outline-black">Buy now</a></p>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>





    <div class="untree_co-section">
        <div class="container">


            <div class="deal-hero overlay" style="background-image: url('images/imgsec1.avif')">
                <div class="deal-contents">
                    <span class="subtitle">Limited Offers 20% OFF</span>
                    <h2 class="title mb-4"><a href="appliances.php">Smart Appliances</a></h2>
                    <p class="mb-5">Smart appliances blend advanced technology with everyday convenience, offering intuitive controls and remote access for seamless integration into modern lifestyles. From optimizing energy usage to simplifying daily tasks, these appliances
                        redefine efficiency and elevate the way we interact with our homes.
                    </p>
                    <a href="appliances.php" class="btn btn-black">Shop Now</a>
                </div>
            </div>


        </div>
    </div>

    <div class="untree_co-section">
        <div class="container">
            <h6>Best Sellers</h6>
            <bold>
                <h2>Explore our Producs</h2>
            </bold>
            <br>
            <div class="row">
                <!-- pic1 -->
                <div class="col-6 col-sm-6 col-md-6 mb-4 col-lg-4">
                    <div class="product-item">
                        <!-- Button trigger modal -->
                        <button type="button" class="product-img btn btn-link" data-bs-toggle="modal" data-bs-target="#modal0">
							
							<img src="images/smartphone/apple1.png" alt="Image" class="img-fluid">
						</button>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span>(5.0)</span>
                        <h3 class="title"><a href="#">Iphone 15 Pro Max</a></h3>
                        <div class="price">
                            <span>₱84,990.00  </span>
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
                                        <div class="price">
                                            <span id="price">₱84,990.00  </span>
                                            <input type="number" value="84990" id="currentprice">
                                        </div>
                                        <span>
											<span>Quantity</span>
                                        <span>
												<button class="buttons" onclick="reducequantity(0)">-</button>
												<span id="quantity">1</span>
                                        <input type="number" value="1" id="currentvalue">
                                        <button class="buttons" onclick="addquantity(0)">+</button>
                                        </span>
                                        </span>
                                    </li>
                                    <li>
                                        <span><b>Technology:</b>&nbsp; GSM / CDMA / HSPA / EVDO / LTE / 5G</span>
                                        <span><b>Dimensions:</b>&nbsp;	159.9 x 76.7 x 8.3 mm (6.30 x 3.02 x 0.33 in)</span>
                                        <span><b>Weight:</b>&nbsp;	221 g (7.80 oz)</span>
                                        <span><b>Build:</b>&nbsp; Glass front (Corning-made glass), glass back (Corning-made glass), titanium frame (grade 5)</span>
                                        <span><b>SIM:</b>&nbsp;	Nano-SIM and eSIM - International</span>
                                        <span><b>Type:</b>&nbsp;	LTPO Super Retina XDR OLED, 120Hz, HDR10, Dolby Vision, 1000 nits (typ), 2000 nits (HBM)</span>
                                        <span><b>Size:</b>&nbsp;	6.7 inches, 110.2 cm2 (~89.8% screen-to-body ratio)</span>
                                        <span><b>Resolution:</b>&nbsp;	1290 x 2796 pixels, 19.5:9 ratio (~460 ppi density)</span>
                                        <span><b>Protection:</b>&nbsp;	Ceramic Shield glass</span>
                                        <span><b>OS:</b>&nbsp;&nbsp;	iOS 17, upgradable to iOS 17.4</span>
                                        <span><b>Chipset:</b>&nbsp;&nbsp;	Apple A17 Pro (3 nm)</span>
                                        <span><b>CPU:</b>&nbsp;&nbsp;	Hexa-core (2x3.78 GHz + 4x2.11 GHz)</span>
                                        <span><b>GPU:</b>&nbsp;&nbsp;	Apple GPU (6-core graphics)</span>
                                        <span><b>Triple:</b>&nbsp;&nbsp;	48 MP, f/1.8, 24mm (wide), 1/1.28", 1.22µm, dual pixel PDAF, sensor-shift OIS, 12 MP, f/2.8, 120mm (periscope telephoto), 1/3.06", 1.12µm, dual pixel PDAF, 3D sensor‑shift OIS, 5x optical zoom, 12 MP, f/2.2, 13mm, 120˚ (ultrawide), 1/2.55", 1.4µm, dual pixel PDAF</span>
                                        <span><b>Single:</b>&nbsp;&nbsp;	12 MP, f/1.9, 23mm (wide), 1/3.6", PDAF, OIS SL 3D, (depth/biometrics sensor)</span>
                                        <span><b>Sensors:</b>&nbsp;&nbsp;	Face ID, accelerometer, gyro, proximity, compass, barometer, Ultra Wideband 2 (UWB) support</span>
                                        <span><b>Type:</b>&nbsp;&nbsp;	Li-Ion 4441 mAh, non-removable</span>
                                    </li>
                                    <li>
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
                                <a href="cart.php"><button type="button" class="btn btn-outline-dark">Add To Cart</button></a>
                                <a href="checkout.php"><button type="button" class="btn btn-dark">Buy Now</button></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- pic1 -->

                <!-- pic2 -->
                <div class="col-6 col-sm-6 col-md-6 mb-4 col-lg-4">
                    <div class="product-item">
                        <!-- Button trigger modal -->
                        <button type="button" class="product-img btn btn-link" data-bs-toggle="modal" data-bs-target="#modal2">
							
							<img src="images/tablet/apple1.png" alt="Image" class="img-fluid">
						</button>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span>(5.0)</span>
                        <h3 class="title"><a href="#">iPad Pro 11-inch</a></h3>
                        <div class="price">
                            <span>₱55,990.00 </span>
                        </div>
                    </div>
                </div>


                <div class="modal fade" id="modal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Specifications</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <ul>
                                    <li>
                                        <h3 class="title"><a href="#">iPad Pro 11-inch</a></h3>
                                    </li>
                                    <li>
                                        <span><img src="images/tablet/apple1.png" alt="Image" class="img-fluid"></span>
                                        <div class="price">
                                            <span id="price">₱55,990.00 </span>
                                            <input type="number" value="55990" id="currentprice">
                                        </div>
                                        <span>
											<span>Quantity</span>
                                        <span>
												<button class="buttons" onclick="reducequantity(1)">-</button>
												<span id="quantity">1</span>
                                        <input type="number" value="1" id="currentvalue">
                                        <button class="buttons" onclick="addquantity(1)">+</button>
                                        </span>
                                        </span>
                                    </li>
                                    <li>
                                        <span><b>Technology:</b>&nbsp;GSM / CDMA / HSPA / EVDO / LTE / 5G</span>
                                        <span><b>Dimensions:</b>&nbsp;	247.6 x 178.5 x 5.9 mm (9.75 x 7.03 x 0.23 in)</span>
                                        <span><b>Weight:</b>&nbsp;		466 g (Wi-Fi), 470 g (5G) (1.03 lb)</span>
                                        <span><b>Build:</b>&nbsp;Glass front, aluminum back, aluminum frame</span>
                                        <span><b>SIM:</b>&nbsp;		Nano-SIM and eSIM</span>
                                        <span><b>Type:</b>&nbsp;	Liquid Retina IPS LCD, 120Hz, HDR10, Dolby Vision, 600 nits (typ)</span>
                                        <span><b>Size:</b>&nbsp;	11.0 inches, 366.5 cm2 (~82.9% screen-to-body ratio)</span>
                                        <span><b>Resolution:</b>&nbsp;	1668 x 2388 pixels (~265 ppi density)</span>
                                        <span><b>Protection:</b>&nbsp;	Scratch-resistant glass, oleophobic coating</span>
                                        <span><b>OS:</b>&nbsp;&nbsp;	iPadOS 14.5.1, upgradable to iPadOS 17.4</span>
                                        <span><b>Chipset:</b>&nbsp;&nbsp;	Apple M1</span>
                                        <span><b>CPU:</b>&nbsp;&nbsp;	Octa-core (4x3.2 GHz & 4xX.X GHz)</span>
                                        <span><b>GPU:</b>&nbsp;&nbsp;	Apple GPU (8-core graphics)</span>
                                        <span><b>Dual:</b>&nbsp;&nbsp;	12 MP, f/1.8, (wide), 1/3.0", 1.22µm, dual pixel PDAF</span>
                                        <span><b>Single:</b>&nbsp;&nbsp;	12 MP, f/2.4, 122˚ (ultrawide)</span>
                                        <span><b>Sensors:</b>&nbsp;&nbsp;	Face ID, accelerometer, gyro, barometer</span>
                                        <span><b>Type:</b>&nbsp;&nbsp;	Li-Po 7538 mAh (28.65 Wh), non-removable</span>
                                    </li>
                                    <li>
                                        <span><h3>Colorway:</h3></span>
                                        <span><button type="button" class="btn btn-outline-dark">Silver</button><button type="button" class="btn btn-outline-dark">Space Gray</button></span>

                                    </li>
                                    <li>
                                        <span><h3>Capacity:</h3></span>
                                        <span><button type="button" class="btn btn-outline-dark">128GB 8GB </button><button type="button" class="btn btn-outline-dark"> 256GB 8GB</button></span>
                                        <span><button type="button" class="btn btn-outline-dark">512GB 8GB</button><button type="button" class="btn btn-outline-dark"> 1TB 16GB</span>
                                        <span><button type="button" class="btn btn-outline-dark">2TB 16GB</button></span>
                                    </li>
                                </ul>

                            </div>
                            <div class="modal-footer">
                                <a href="cart.php"><button type="button" class="btn btn-outline-dark">Add To Cart</button></a>
                                <a href="checkout.php"><button type="button" class="btn btn-dark">Buy Now</button></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- pic2-->

                <!--pic 3-->
                <div class="col-6 col-sm-6 col-md-6 mb-4 col-lg-4">
                    <div class="product-item">
                        <!-- Button trigger modal -->
                        <button type="button" class="product-img btn btn-link" data-bs-toggle="modal" data-bs-target="#modal3">
							
							<img src="images/watch/Apple/Apple_Watch_SE.png" alt="Image" class="img-fluid">
						</button>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span>(5.0)</span>
                        <h3 class="title"><a href="#">Apple Watch SE</a></h3>
                        <div class="price">
                            <span>₱15,990.00 </span>
                        </div>
                    </div>
                </div>


                <div class="modal fade" id="modal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Specifications</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <ul>
                                    <li>
                                        <h3 class="title"><a href="#">Apple Watch SE</a></h3>
                                    </li>
                                    <li>
                                        <span><img src="images/watch/Apple/Apple_Watch_SE.png" alt="Image" class="img-fluid"></span>
                                        <div class="price">
                                            <span id="price">₱15,990.00 </span>
                                            <input type="number" value="15990" id="currentprice">
                                        </div>
                                        <span>
											<span>Quantity</span>
                                        <span>
												<button class="buttons" onclick="reducequantity(2)">-</button>
												<span id="quantity">1</span>
                                        <input type="number" value="1" id="currentvalue">
                                        <button class="buttons" onclick="addquantity(2)">+</button>
                                        </span>
                                        </span>
                                    </li>
                                    <li>
                                        <span><b>Technology:</b>&nbsp; GSM / HSPA / LTE</span>
                                        <span><b>Dimensions:</b>&nbsp;	44 x 38 x 10.4 mm (1.73 x 1.50 x 0.41 in)</span>
                                        <span><b>Weight:</b>&nbsp;	36.4 g (1.27 oz)</span>
                                        <span><b>Build:</b>&nbsp; Glass front, ceramic/sapphire crystal back, aluminum frame</span>
                                        <span><b>SIM:</b>&nbsp;	eSIM</span>
                                        <span><b>Type:</b>&nbsp;	Retina LTPO OLED, 1000 nits (peak)</span>
                                        <span><b>Size:</b>&nbsp;	1.78 inches</span>
                                        <span><b>Resolution:</b>&nbsp;	448 x 368 pixels (~326 ppi density)</span>
                                        <span><b>Protection:</b>&nbsp;		Ion-X strengthened glass</span>
                                        <span><b>OS:</b>&nbsp;&nbsp;	watchOS 7.0, upgradable to watchOS 10.4</span>
                                        <span><b>Chipset:</b>&nbsp;&nbsp;	Apple S5</span>
                                        <span><b>CPU:</b>&nbsp;&nbsp;	Dual-core</span>
                                        <span><b>GPU:</b>&nbsp;&nbsp;	PowerVR</span>
                                        <span><b>WLAN:</b>&nbsp;&nbsp;		Wi-Fi 802.11 b/g/n</span>
                                        <span><b>Single:</b>&nbsp;&nbsp;	12 MP, f/2.4, 122˚ (ultrawide)</span>
                                        <span><b>Bluetooth:</b>&nbsp;&nbsp;	5.0, A2DP, LE</span>
                                        <span><b>Sensors:</b>&nbsp;&nbsp;Accelerometer, gyro, heart rate (2nd gen), barometer, always-on altimeter, compass</span>
                                        <span><b>Type:</b>&nbsp;&nbsp;	Li-Ion, non-removable</span>
                                        <span><b>Charging:</b>&nbsp;&nbsp;	Wireless</span>
                                    </li>
                                    <li>
                                        <span><h3>Colorway:</h3></span>
                                        <span><button type="button" class="btn btn-outline-dark">Silver</button><button type="button" class="btn btn-outline-dark">Gold</button></span>
                                        <span><button type="button" class="btn btn-outline-dark">Space Gray</button></span>
                                    </li>
                                    <li>
                                        <span><h3>Capacity:</h3></span>
                                        <span><button type="button" class="btn btn-outline-dark">32GB 1GB</button></span>
                                    </li>
                                </ul>

                            </div>
                            <div class="modal-footer">
                                <a href="cart.php"><button type="button" class="btn btn-outline-dark">Add To Cart</button></a>
                                <a href="checkout.php"><button type="button" class="btn btn-dark">Buy Now</button></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--pic3-->

                <!--pic 4-->
                <div class="col-6 col-sm-6 col-md-6 mb-4 col-lg-4">
                    <div class="product-item">
                        <!-- Button trigger modal -->
                        <button type="button" class="product-img btn btn-link" data-bs-toggle="modal" data-bs-target="#modal4">
							
							<img src="images/camera/FujiFilm/FUJIFILM GFX100 II.png" alt="Image" class="img-fluid">
						</button>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span>(5.0)</span>
                        <h3 class="title"><a href="#">FUJIFILM GFX100 II</a></h3>
                        <div class="price">
                            <span>₱439,990.00 </span>
                        </div>
                    </div>
                </div>


                <div class="modal fade" id="modal4" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Specifications</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <ul>
                                    <li>
                                        <h3 class="title"><a href="#">FUJIFILM GFX100 II</a></h3>
                                    </li>
                                    <li>
                                        <span><img src="images/camera/FujiFilm/FUJIFILM GFX100 II.png" alt="Image" class="img-fluid"></span>
                                        <div class="price">
                                            <span id="price">₱439,990.00</span>
                                            <input type="number" value="439990" id="currentprice">
                                        </div>
                                        <span>
											<span>Quantity</span>
                                        <span>
												<button class="buttons" onclick="reducequantity(3)">-</button>
												<span id="quantity">1</span>
                                        <input type="number" value="1" id="currentvalue">
                                        <button class="buttons" onclick="addquantity(3)">+</button>
                                        </span>
                                        </span>
                                    </li>
                                    <li>
                                        <span><b>Dimensions:</b>&nbsp;&nbsp;	152 x 117 x 99 mm (5.98 x 4.61 x 3.9″)</span>
                                        <span><b>Weight (inc. batteries):</b>&nbsp;&nbsp;	1030 g (2.27 lb / 36.33 oz)</span>
                                        <span><b>Battery Life (CIPA):</b>&nbsp;&nbsp;	540</span>
                                        <span><b>USB:</b>&nbsp;&nbsp;USB 3.2 Gen 2 (10 GBit/sec)</span>
                                        <span><b>Format:</b>&nbsp;&nbsp;	MPEG-4, H.264, H.265</span>
                                        <span><b>Speaker:</b>&nbsp;&nbsp;	Mono</span>
                                        <span><b>Format:</b>&nbsp;&nbsp;	MPEG-4, H.264, H.265</span>
                                        <span><b>Effective pixels:</b>&nbsp;&nbsp;	102 megapixels</span>
                                        <span><b>Max resolution:</b>&nbsp;&nbsp;	11648 x 8736</span>
                                        <span><b>Image ratio w:h:</b>&nbsp;&nbsp;	1:1, 5:4, 4:3, 3:2, 16:9</span>
                                    </li>
                                </ul>

                            </div>
                            <div class="modal-footer">
                                <a href="cart.php"><button type="button" class="btn btn-outline-dark">Add To Cart</button></a>
                                <a href="checkout.php"><button type="button" class="btn btn-dark">Buy Now</button></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--pic4-->

                <!--pic 5-->
                <div class="col-6 col-sm-6 col-md-6 mb-4 col-lg-4">
                    <div class="product-item">
                        <!-- Button trigger modal -->
                        <button type="button" class="product-img btn btn-link" data-bs-toggle="modal" data-bs-target="#modal5">
							
							<img src="images/appliances/Samsung/55 OLED S90C 4K Smart TV (2023) (1).png" alt="Image" class="img-fluid">
						</button>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span>(5.0)</span>
                        <h3 class="title"><a href="#">55" OLED S90C 4K Smart TV (2023)</a></h3>
                        <div class="price">
                            <span>₱78,749.00 </span>
                        </div>
                    </div>
                </div>


                <div class="modal fade" id="modal5" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Specifications</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <ul>
                                    <li>
                                        <h3 class="title"><a href="#">55" OLED S90C 4K Smart TV (2023)</a></h3>
                                    </li>
                                    <li>
                                        <span><img src="images/appliances/Samsung/55 OLED S90C 4K Smart TV (2023) (1).png" alt="Image" class="img-fluid"></span>
                                        <div class="price">
                                            <span id="price">₱78,749.00</span>
                                            <input type="number" value="78749" id="currentprice">
                                        </div>
                                        <span>
											<span>Quantity</span>
                                        <span>
												<button class="buttons" onclick="reducequantity(4)">-</button>
												<span id="quantity">1</span>
                                        <input type="number" value="1" id="currentvalue">
                                        <button class="buttons" onclick="addquantity(4)">+</button>
                                        </span>
                                        </span>
                                    </li>
                                    <li>
                                        <span><b>Display Type:</b>&nbsp;&nbsp; OLED (Organic Light Emitting Diode)</span>
                                        <span><b>Screen Size:</b>&nbsp;&nbsp;	 55 inches</span>
                                        <span><b>Weight:</b>&nbsp;&nbsp;	36.4 g (1.27 oz)</span>
                                        <span><b>Resolution:</b>&nbsp;&nbsp;  4K Ultra High Definition (3840 x 2160 pixels)</span>
                                        <span><b>HDR (High Dynamic Range) Support:</b>&nbsp;&nbsp;	 Yes (HDR10, Dolby Vision, HLG)</span>
                                        <span><b>Refresh Rate:</b>&nbsp;&nbsp; 120Hz</span>
                                        <span><b>Processor:</b>&nbsp;&nbsp;	 Advanced Image Processor for Enhanced Picture Quality</span>
                                        <span><b>Operating System:</b>&nbsp;&nbsp; Smart TV Platform (e.g., Android TV, webOS, Tizen)</span>
                                        <span><b>Connectivity:</b>&nbsp;&nbsp; Wi-Fi: Yes (802.11ac),Bluetooth: Yes (Version X.X), Ethernet: Yes (Gigabit)</span>
                                        <span><b>Voice Control:</b>&nbsp;&nbsp; Built-in Voice Assistant (e.g., Google Assistant, Amazon Alexa)</span>
                                        <span><b>Dimensions:</b>&nbsp;&nbsp;	 Approximately 122.7 cm x 70.8 cm x 4.7 cm (without stand)</span>
                                        <span><b>Weight:</b>&nbsp;&nbsp; Approximately 17 kg (without stand)</span>
                                    </li>
                                    <li>
                                        <span><h3>Colorway:</h3></span>
                                        <span><button type="button" class="btn btn-outline-dark">Black</button><button type="button" class="btn btn-outline-dark">Silver</button></span>
                                        <span><button type="button" class="btn btn-outline-dark">White</button></span>
                                    </li>
                                    <li>
                                        <span><h3>Size:</h3></span>
                                        <span><button type="button" class="btn btn-outline-dark">55"</button><button type="button" class="btn btn-outline-dark">65"</button></span>
                                        <span><button type="button" class="btn btn-outline-dark">77"</button></span>
                                    </li>

                                </ul>

                            </div>
                            <div class="modal-footer">
                                <a href="cart.php"><button type="button" class="btn btn-outline-dark">Add To Cart</button></a>
                                <a href="checkout.php"><button type="button" class="btn btn-dark">Buy Now</button></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--pic5-->

                <!--pic 6-->
                <div class="col-6 col-sm-6 col-md-6 mb-4 col-lg-4">
                    <div class="product-item">
                        <!-- Button trigger modal -->
                        <button type="button" class="product-img btn btn-link" data-bs-toggle="modal" data-bs-target="#modal23">
							
							<img src="images/appliances/LG/LG Front Load Combo  Washing Machine.png" alt="Image" class="img-fluid">
						</button>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span>(5.0)</span>
                        <h3 class="title"><a href="#">LG Front Load Washing Machine Direct Drive Inverter</a></h3>
                        <div class="price">
                            <span>₱12,893.00 </span>
                        </div>
                    </div>
                </div>


                <div class="modal fade" id="modal23" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Specifications</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <ul>
                                    <li>
                                        <h3 class="title"><a href="#">LG Front Load Washing Machine Direct Drive Inverter</a></h3>
                                    </li>
                                    <li>
                                        <span><img src="images/appliances/LG/LG Front Load Combo  Washing Machine.png" alt="Image" class="img-fluid"></span>
                                        <div class="price">
                                            <span id="price">₱12,893.00</span>
                                            <input type="number" value="12893" id="currentprice">
                                        </div>
                                        <span>
											<span>Quantity</span>
                                        <span>
												<button class="buttons" onclick="reducequantity(5)">-</button>
												<span id="quantity">1</span>
                                        <input type="number" value="1" id="currentvalue">
                                        <button class="buttons" onclick="addquantity(5)">+</button>
                                        </span>
                                        </span>
                                    </li>
                                    <li>
                                        <span><b>Type:</b>&nbsp;&nbsp; 	Front Load Combo</span>
                                        <span><b>Dimension:</b>&nbsp;&nbsp; 600 x 850 x 560</span>
                                        <span><b>Depth from back cover to door (D"):</b>&nbsp;&nbsp;	1100</span>
                                        <span><b>Smart Function:</b>&nbsp;&nbsp; STEAM+ LG THINQ, TWIN WASH COMPATIBLE  AI DD (6 MOTION TECHNOLOGY)</span>
                                        <span><b>DRYING WATTAGE:</b>&nbsp;&nbsp;	1600W</span>
                                        <span><b>PROGRAMS:</b>&nbsp;&nbsp; 	Cotton/Cotton +/Mix/Easy Care/Alergy Care</span>
                                        <span><b>Capacity:</b>&nbsp;&nbsp;	10.5kg/7kg</span>
                                        <span><b>Depth with Door Open (D'):</b>&nbsp;&nbsp; 	620</span>
                                        <span><b>WASHING WATTAGE:</b>&nbsp;&nbsp;	2100W</span>
                                        <span><b>RATED INPUT:</b>&nbsp;&nbsp; 	230-60hz</span>
                                    </li>
                                </ul>

                            </div>
                            <div class="modal-footer">
                                <a href="cart.php"><button type="button" class="btn btn-outline-dark">Add To Cart</button></a>
                                <a href="checkout.php"><button type="button" class="btn btn-dark">Buy Now</button></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--pic6-->

            </div>
        </div>
    </div>

    <div class="container">


        <div class="deal-hero overlay" style="background-image: url('images/imgsec2.avif')">
            <div class="deal-contents">
                <span class="subtitle">Limited Offers 20% OFF</span>
                <h2 class="title mb-4"><a href="#">Camera</a></h2>
                <p class="mb-5">A camera is a device that captures still images or videos, enabling the preservation and sharing of memories, experiences, and creative visions.</p>
                <a href="camera.php" class="btn btn-black">Shop Now</a>
            </div>
        </div>

    </div>

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
                        <a href="camera.php" class="product-img">

                            <img src="images/appliances/Samsung/55 OLED S90C 4K Smart TV (2023) (1).png" alt="Image" class="img-fluid">
                        </a>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span>(5.0)</span>
                        <h3 class="title"><a href="#">55" OLED S90C 4K Smart TV (2023)</a></h3>
                        <div class="price">
                            <span>₱78,749.00</span>
                        </div>
                    </div>
                </div>
                <!-- /.item -->


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
                            <span>₱84,990.00 </span>
                        </div>
                    </div>
                </div>
                <!-- /.item -->


                <div class="item">
                    <div class="product-item">
                        <a href="tablet.php" class="product-img">

                            <img src="images/tablet/lenovo3.png" alt="Image" class="img-fluid">
                        </a>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star half checked"></span>
                        <span>(4.9)</span>
                        <h3 class="title"><a href="#">Lenovo Tab P11</a></h3>
                        <div class="price">
                            <span>₱13,695.00 </span>
                        </div>
                    </div>
                </div>
                <!-- /.item -->

                <div class="item">
                    <div class="product-item">
                        <a href="shop-single.php" class="product-img">
                            <img src="images/watch/samsungwatches/GalaxyWatch6.png" alt="Image" class="img-fluid">
                        </a>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span>(4.9)</span>
                        <h3 class="title"><a href="#">Galaxy Watch 5</a></h3>
                        <div class="price">
                            <span>₱11,893.00  </span>
                        </div>
                    </div>
                </div>
                <!-- /.item -->

                <div class="item">
                    <div class="product-item">
                        <a href="shop-single.php" class="product-img">
                            <img src="images/smartphone/oppo5.png" alt="Image" class="img-fluid">
                        </a>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span>(4.9)</span>
                        <h3 class="title"><a href="#">Oppo Find Flip N2</a></h3>
                        <div class="price">
                            <span>₱30,950.00   </span>
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


    <div class="custom-block" data-aos="fade-up" data-aos-delay="100">
        <h2 class="section-title text-center">Developers</h2>
        <div class="owl-single owl-carousel no-nav">
            <div class="testimonial mx-auto">
                <figure class="img-wrap">
                    <img src="images/Team/baysic.jpg" alt="Image" class="img-fluid">
                </figure>
                <h3 class="name text-black">Shahirah Baysic</h3>
                <blockquote>
                    <p>&ldquo;At the end of the day, Gabi na.&rdquo;</p>
                </blockquote>
            </div>

            <div class="testimonial mx-auto">
                <figure class="img-wrap">
                    <img src="images/Team/chan.jpg" alt="Image" class="img-fluid">
                </figure>
                <h3 class="name text-black">Christian Ryan D. Bolima</h3>
                <blockquote>
                    <p>&ldquo;Hindi ka tamad, masipag ka lang magpahinga.&rdquo;</p>
                </blockquote>
            </div>


            <div class="testimonial mx-auto">
                <figure class="img-wrap">
                    <img src="images/Team/bacas.jpg" alt="Image" class="img-fluid">
                </figure>
                <h3 class="name text-black">Rovi Love Bacas</h3>
                <blockquote>
                    <p>&ldquo;I was born at the very young age.&rdquo;</p>
                </blockquote>
            </div>

            <div class="testimonial mx-auto">
                <figure class="img-wrap">
                    <img src="images/Team/balde.jpg" alt="Image" class="img-fluid">
                </figure>
                <h3 class="name text-black">Balde</h3>
                <blockquote>
                    <p>&ldquo;Kung may problema ka, it's your problem.&rdquo;</p>
                </blockquote>
            </div>

            <div class="testimonial mx-auto">
                <figure class="img-wrap">
                    <img src="images/Team/bron.jpg" alt="Image" class="img-fluid">
                </figure>
                <h3 class="name text-black">Bron</h3>
                <blockquote>
                    <p>&ldquo;Minsan kung sino pa nag eemel, sila pa ung nag momobile legends.&rdquo;</p>
                </blockquote>
            </div>

            <div class="testimonial mx-auto">
                <figure class="img-wrap">
                    <img src="images/Team/Kervin.jpg" alt="Image" class="img-fluid">
                </figure>
                <h3 class="name text-black">Kervin</h3>
                <blockquote>
                    <p>&ldquo;Hindi kumpleto ang childhood mo kung hindi ka naging bata.&rdquo;</p>
                </blockquote>
            </div>

        </div>
    </div>



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
        <a href="index.php">
            <h5>Back to top</h5>
        </a>
    </div>

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
                        <!-- License information: https://untree.co/license/ -->
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