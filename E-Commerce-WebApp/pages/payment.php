<!DOCTYPE html>
<html lang="en">


<body>
    <?php include("../controller/addController.php");?>
    
    <?php include("../view/header.html");?>

    <div id="layout_content">

        <?php include("../view/banner.html");?>

        <div id="middle_layout">

            <?php include("../view/pay_menu.php");?>
            <!-- <li id="prod">
                        <a href="pages/products.php" style="float:left;font-size:20px">Payment</a>
            </li> -->


            <?php include("../view/sidebar.html");?>

            <div id="infoSect">
      <div id="cartTitle">
        <b>What's In My Cart?</b>
        <div id="totPrice">
          <?php
          $items_array=getTotalItems();
          $totalItems=$items_array['total_items'];
          $price_array=getTotalPrice();
          $totalPrice=$price_array['total_price'];
          if ($totalItems==0){
            echo "<span>Total Price</span>: $0</span>";
          }
          else{
            echo "<span>Total Price</span>: $$totalPrice</span>";
          }
          ?>
        </div>
      </div>

      <div id="direct_btns">
        <a href="../index.php" id="cnt_shop" style='float:right;font-size:20px;margin-right: -10px;margin-top: -30px'>Continue Shopping</a>
        <a href="login.php" id="chckout" style='float:right;font-size:20px;margin-right: 145px;margin-top: -30px'>Checkout</a>
      </div>
    </div>
            <div id="content">
                 <?php
                 if (isset($_POST["search_btn"])){
                     $prodFind=$_POST['search1'];
                     getProduct($prodFind);
                }
                else{
                    getCartItem();
                }
                ?>

            </div>
            <?php include("../view/footer.html");?>
        </div>
    </div>

</body>

</html>