
<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="js/addprod.js"></script>
    <title>ShopMatt</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .checked {
            color: orange;
        }
    </style>
</head>

<body>
 <?php include("./controller/addController.php"); ?>
    <div id="layout_content">
        <div id="banner">
            <a href="" id="logo">
                <img src="img/logo3.png" width="150px" height="170px">
            </a>

            <div id="slider">
                <div class='slide1'></div>
                <div class='slide2'></div>
                <div class='slide3'></div>
                <div class='slide4'></div>
                <div class='slide5'></div>
            </div>

            <!-- <li>
                <input type="text" placeholder="Search.." id="search" name="search1">
                <button type="submit">
                    <i class="fa fa-search"></i>
                </button>
            </li>
            <a href="" id="coupon">
                <img src="img/coupon.png" width="250px" height="80px">
            </a> -->
        </div>
        <div id="middle_layout">
            <div id="menu">
                <!-- <p>Menu</p> -->
                <ul id="menu_items">
                    <li id="home">
                        <a href="index.php" class="active" style="float:left;font-size:20px">Home</a>
                    </li>
                    <li id="prod">
                        <a href="pages/products.php" style="float:left;font-size:20px">Products</a>
                    </li>
                    <li id="cont">
                        <a href="pages/contactus.php" style="float:left;font-size:20px">Contact Us</a>
                    </li>
                    <li>
                        <form action="" method="post">
                        <input type="text" name="search1" placeholder="Search.." id="search">
                        <button name="search_btn" type="submit">
                        <i class="fa fa-search"></i>
                        </button>
                        </form>
                        <div id="result"></div>
                    </li>
                    <!-- <li>
                        <a href="pages/register.php" style="float:right;font-size:20px">Sign Up</a>
                    </li>
                    <li>
                        <a href="pages/login.php" style="float:right;font-size:20px">Log In</a>
                    </li>
                    <li>
                        <a href="pages/cart.php" style="float:right;font-size:20px">My Cart</a>
                    </li> -->

                    <div id="login_out">
                        <?php
                        if(isset($_SESSION["logged"])){
                            echo '
                            <li>
                        <a href="pages/register.php" style="float:right;font-size:20px">Sign Up</a>
                        </li>
                        <li>
                        <a href="pages/logout.php" style="float:right;font-size:20px">Log Out</a>
                        </li>
                        <li>
                        <a href="pages/cart.php" style="float:right;font-size:20px">My Cart</a>
                        </li>
                            ';
                        }
                         else
                             echo '
                            <li>
                        <a href="pages/register.php" style="float:right;font-size:20px">Sign Up</a>
                        </li>
                        <li>
                        <a href="pages/login.php" style="float:right;font-size:20px">Log In</a>
                        </li>
                        <li>
                        <a href="pages/cart.php" style="float:right;font-size:20px">My Cart</a>
                        </li>
                            ';
                        ?>
                    </div>


                </ul>

            </div>
            
            <div id="sidebar">
                <h2>Categories</h2>
                <ul id="categories">
                    <p>
                        <a href="#home" style="float:left;font-size:20px;margin-left:-50px">
                            <u>Home Appliances</u>
                        </a>
                    </p>

                    <p>
                        <a href="#news" style="float:left;font-size:20px;margin-left:-50px">
                            <u>Electronics</u>
                        </a>
                    </p>

                    <p>
                        <a href="#contact" style="float:left;font-size:20px;margin-left:-50px">
                            <u>Phones and Tablets</u>
                        </a>
                    </p>
                    <p>
                        <a href="#contact" style="float:left;font-size:20px;margin-left:-50px">
                            <u>Fashion Wear</u>
                        </a>
                    </p>
                </ul>

                <h2>Brands</h2>
                <ul id="brands">
                    <p>
                        <a href="#home" style="float:left;font-size:20px;margin-left:-50px">
                            <u>Samsung</u>
                        </a>
                    </p>
                    <p>
                        <a href="#news" style="float:left;font-size:20px;margin-left:-107px;margin-top:33px">
                            <u>Tecno</u>
                        </a>
                    </p>
                    <p>
                        <a href="#contact" style="float:left;font-size:20px;margin-left:-110px;margin-top:66px">
                            <u>Apple</u>
                        </a>
                    </p>

                </ul>
            </div>
            <div id="bread_crumb">
                <ul id="breadcrumb_content">
                    <div id="login_in">
                    <?php
                        if(isset($_SESSION["logged"])){
                            echo '
                        <li>
                        <a href="#" style="float:right;font-size:20px;margin-right:5px">
                        <b> Welcome <?php echo $_SESSION ["user_name"]?>  </b>
                        </a>
                        </li>
                            ';
                        }
                        else{
                           echo ' 
                        <li>
                        <a href="#" style="float:right;font-size:20px;margin-right:5px">
                            <b>Welcome Guest</b>
                        </a>
                        ';
                        }
                        if(isset($_GET["uname"])){
                            $uname=$_GET["uname"];
                            echo '<script type="text/javascript">alert("Welcome '.$uname.'");</script>';
                        }
                            
                        
                    ?>
                    </div>
                    <?php

                        $items_array=getTotalItems();
                        $totalItems=$items_array['total_items'];
                        $price_array=getTotalPrice();
                        $totalPrice=$price_array['total_price'];
                        
                        if ($totalItems==0){
                            echo "<li><a href='#' style='float:right;font-size:20px'><span><b>Total Price</b></span>: GH¢ 0</span></a></li>";
                            echo "<li><a href='#' style='float:right;font-size:20px;'><span><b>Total Items</b></span>: 0</span></a></li>";
                            
                        }
                    
                        else{
                            echo "<li><a href='#' style='float:right;font-size:20px'><span><b>Total Price</b></span>: GH¢$totalPrice</span></a></li>";
                            
                            echo "<li><a href='#' style='float:right;font-size:20px'><span><b>Total Items</b></span>: $totalItems</span></a></li>";
                            
                        }

                    ?>
                    <li>
                        <a href="#" style="float:right;font-size:20px">
                            <b>Shopping Cart:</b>
                        </a>
                    </li>
                    <li>
                        <a href="#" style="float:right;font-size:20px">
                            <b>Go to Cart</b>
                            <span id="mycart"></span>
                        </a>
                    </li>
                    <li>
                        <a href="pages/addprod.php" style="float:right;font-size:20px">
                            <b>Add Product</b>

                        </a>
                    </li>
                </ul>

            </div>
            <div id="content">

                <?php
                ob_start();
                if (isset($_POST["search_btn"])){
                     $prodFind=$_POST['search1'];
                     getProductonIndex($prodFind);
                }
                else{
                    displayProducts();
                }    

               if(isset($_GET["id"])){
        $id=$_GET["id"];
        cartAdd($id);
      }
                ?>
            
                <!-- <div id="row1">
                    <div id="item1">
                        <a href="pages/product.php">
                            <img src="img/hohnie.jpg" height="150px">
                            <br>
                        </a>
                        <div>
                            <a href="pages/product.php"> Johnie Walker</a>
                        </div>
                        <div id="stars">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                        </div>
                        <div>GH₵ 333
                            <span>
                                <strike style="font-size:20px;">Ghc 450</strike>
                            </span>
                        </div>


                        <button onclick="add()">Add to Cart</button>
                    </div>
                    <div id="item2">
                        <a href="pages/product.php">
                            <img src="img/pilsner.png" height="150px">
                            <br>
                        </a>
                        <div>
                            <a href="pages/product.php">Pilsner Can</a>
                        </div>
                        <div id="stars">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                        </div>
                        <div>GH₵ 90</div>
                        <button onclick="add()">Add to Cart</button>
                    </div>
                    <div id="item3">
                        <a href="pages/product.php">
                            <img src="img/nescafe.jpg" height="150px">
                            <br>
                        </a>
                        <div>
                            <a href="pages/product.php"> Nescafe Espresso</a>
                        </div>
                        <div id="stars">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                        </div>
                        <div>GH₵ 20</div>
                        <button onclick="add()">Add to Cart</button>
                    </div>
                    <div id="item4">
                        <a href="pages/product.php">
                            <img src="img/woofer.png" height="150px">
                            <br>
                        </a>
                        <div>
                            <a href="pages/product.php"> Classic Woofer</a>
                        </div>
                        <div id="stars">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                        </div>
                        <div>GH₵ 790</div>
                        <button onclick="add()">Add to Cart</button>
                    </div>
                </div>
                <div id="row2">
                    <div id="item5">
                        <a href="pages/product.php">
                            <img src="img/persil.jpg" height="150px">
                            <br>
                        </a>
                        <div>
                            <a href="pages/product.php"> Persil Powder</a>
                        </div>
                        <div id="stars">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                        </div>
                        <div>GH₵ 55</div>
                        <button onclick="add()">Add to Cart</button>
                    </div>


                    <div id="item6">
                        <a href="pages/product.php">
                            <img src="img/cello.jpg" height="150px">
                            <br>
                        </a>
                        <div>
                            <a href="pages/product.php"> Cello Solar 22"</a>
                        </div>
                        <div id="stars">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                        </div>
                        <div>GH₵ 2000</div>
                        <button onclick="add()">Add to Cart</button>
                    </div>
                    <div id="item7">
                        <a href="pages/product.php">
                            <img src="img/sayona.jpg" height="150px">
                            <br>
                        </a>
                        <div>
                            <a href="pages/product.php"> Sayona Subwoofer</a>
                        </div>
                        <div id="stars">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                        </div>
                        <div>GH₵ 300</div>
                        <button onclick="add()">Add to Cart</button>
                    </div>
                    <div id="item8">
                        <a href="product.html">
                            <img src="img/canon.jpg" height="150px">
                            <br>
                        </a>
                        <div>
                            <a href="pages/product.php"> Canon Camera</a>
                        </div>
                        <div id="stars">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                        </div>
                        <div>GH₵ 10</div>
                        <button onclick="add()">Add to Cart</button>
                    </div>
                </div> -->
            </div>
            <div id="footer">
                <h4>Masoko Safaricom</h4>
                <footer>&copy; Copyright 2018 @Masoko</footer>
                <div id="men">

                </div>
                <div id="social_media" align='center'>
                    <b>Follow Us:</b>
                    <br>
                    <a href="">
                        <img src="img/newtwi.png" width="50px" height="50px">
                    </a>
                    <a href="">
                        <img src="img/pint.png" width="50px" height="50px">
                    </a>
                    <a href="">
                        <img src="img/fb.png" width="50px" height="50px">
                    </a>
                    <a href="">
                        <img src="img/ig.png" width="50px" height="50px">
                    </a>
                    </p>
                </div>
                <div id="reachus" align='center'>
                    <p>Need Help?
                        <br> FAQ's
                        <br> Shipping and Delivery Policy
                    </p>
                </div>
            </div>
        </div>

</body>

</html>